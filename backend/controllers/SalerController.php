<?php

namespace backend\controllers;

use Yii;
use backend\models\Language;
use backend\models\Salarhistorylanguages;
use backend\models\Saler;
use backend\models\SalerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SalerController implements the CRUD actions for Saler model.
 */
class SalerController extends Controller
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

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
                'layout' => 'operator',
            ],
        ];
    }

    public function beforeAction($action)
    {
        // your custom code here, if you want the code to run before action filters,
        // which are triggered on the [[EVENT_BEFORE_ACTION]] event, e.g. PageCache or AccessControl

        if (!parent::beforeAction($action)) {
            return $this->redirect(['index']);
        }

        if(Yii::$app->workers->isGuest) {
            return $this->redirect(['/workers']);
        }

        return true; // or false to not run the action
    }

    /**
     * Lists all Saler models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SalerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Saler model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $lang = new Language();
        $salerHistory = Salarhistorylanguages::find()->with('language')->where(['saler_id' => $id])->all();
        $lang->getInfoLanguages($salerHistory);

        return $this->render('view', [
            'model' => $model,
            'lang' => $lang,
        ]);
    }

    /**
     * Creates a new Saler model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    // public function actionCreate()
    // {
    //     $model = new Saler();
    //     $lang = new Language;
    //     $lang->getInfoLanguages();
    //     $salerHistory;

    //     if(isset($_POST['Language'])) {
    //         $salerHistory = $this->encode($_POST['Language']['info'], $lang->languages);
    //     }

    //     if ($model->load(Yii::$app->request->post()) && $model->save()) {
    //         foreach ($salerHistory as $history) {
    //             $history->saler_id = $model->id;
    //             $history->save();
    //         }
    //         return $this->redirect(['view', 'id' => $model->id]);
    //     }

    //     return $this->render('create', [
    //         'model' => $model,
    //         'lang' => $lang,
    //     ]);
    // }

    /**
     * Updates an existing Saler model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $lang = new Language();
        $salerHistory = Salarhistorylanguages::find()->with('language')->where(['saler_id' => $id])->all();
        $lang->getInfoLanguages($salerHistory);

        if(isset($_POST['Language'])) {
            $salerHistory = $this->encode($_POST['Language']['info'], $lang->languages);
            foreach ($salerHistory as $history) {
                $history->saler_id = $model->id;
                $history->save();
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'lang' => $lang,
        ]);
    }

    /**
     * Deletes an existing Saler model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function encode($json, $languages) {
        $salerHistory = [];
        foreach ($languages as $lan) {
            $history = new Salarhistorylanguages();
            $history->language_id = $lan['id'];
            $history->name = $json[$lan['shortname']];
            array_push($salerHistory, $history);
        }
        return $salerHistory;
    }

    /**
     * Finds the Saler model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Saler the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Saler::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
