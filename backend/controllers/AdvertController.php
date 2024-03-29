<?php

namespace backend\controllers;

use Yii;
use backend\models\Advert;
use backend\models\Images;
use yii\web\UploadedFile;
use backend\models\AdvertSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\UploadImage;

/**
 * AdvertController implements the CRUD actions for Advert model.
 */
class AdvertController extends Controller
{
    public $layout = 'operator';
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function beforeAction($action)
    {
        // your custom code here, if you want the code to run before action filters,
        // which are triggered on the [[EVENT_BEFORE_ACTION]] event, e.g. PageCache or AccessControl

        if (!parent::beforeAction($action)) {
            return false;
        }

        if(Yii::$app->workers->isGuest) {
            $this->redirect(['/workers']);
        }

        // other custom code here

        return true; // or false to not run the action
    }

    /**
     * Lists all Advert models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AdvertSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Advert model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Advert();

        $img = new UploadImage();
        $image = new Images();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            if (Yii::$app->request->isPost) {
                $img->imageFile = UploadedFile::getInstance($img, 'imageFile');
                $image->path = $img->upload();
                $image->main = 1;
                $image->advert_id = $model->id;
                $image->save();
            }

            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
            'img' => $img,
            'image' => $image,
        ]);
    }

    /**
     * Updates an existing Advert model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $image = Images::find()->where(['advert_id' => $model->id, 'main' => 1])->all();
        $img = new UploadImage();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            if (Yii::$app->request->isPost) {
                $img->imageFile = UploadedFile::getInstance($img, 'imageFile');
                if($img->imageFile && $img->delete($image[0]->path)) {
                    $image[0]->path = $img->upload();
                    $image[0]->save();
                }
            }

            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
            'img' => $img,
            'image' => $image,
        ]);
    }

    /**
     * Deletes an existing Advert model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $image = Images::find()->where(['advert_id' => $model->id, 'main' => 1])->all();
        $img = new UploadImage();

        if($img->delete($image[0]->path)){
            $image[0]->delete();
            $model->delete();
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the Advert model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Advert the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Advert::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
