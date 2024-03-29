<?php

namespace frontend\controllers;

use Yii;
use backend\models\Cards;
use backend\models\CardsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CardsController implements the CRUD actions for Cards model.
 */
class CardsController extends Controller
{
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

    /**
     * Lists all Cards models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CardsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Cards model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Cards model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Cards();

        if(!Yii::$app->user2->isGuest)
        {
            if ($model->load(Yii::$app->request->post())) {
                $model->user_id = Yii::$app->user2->id;
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        if(!Yii::$app->saler->isGuest)
        {
            if ($model->load(Yii::$app->request->post())) {
                $model->user_id = Yii::$app->saler->id;
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Cards model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    // public function actionUpdate($id)
    // {
    //     $model = $this->findModel($id);

    //     if ($model->load(Yii::$app->request->post()) && $model->save()) {
    //         return $this->redirect(['view', 'id' => $model->id]);
    //     }

    //     return $this->render('update', [
    //         'model' => $model,
    //     ]);
    // }

    /**
     * Deletes an existing Cards model.
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

    /**
     * Finds the Cards model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Cards the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        $modelUser = Cards::findOne($id);
        if(!Yii::$app->user2->isGuest)
        {
            if($modelUser->user_id == Yii::$app->user2->id && $modelUser !== null)
            {
                return $modelUser;
            }
        }
        if(!Yii::$app->saler->isGuest)
        {
            if($modelUser->Saler_id == Yii::$app->saler->id && $modelUser !== null)
            {
                return $modelUser;
            }
        }
        
        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
