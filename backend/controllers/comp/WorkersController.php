<?php

namespace backend\controllers\comp;

use Yii;
use backend\models\Workers;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\LoginWorkers;

/**
 * WorkersController implements the CRUD actions for Workers model.
 */
class WorkersController extends Controller
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

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Lists all Workers models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (!Yii::$app->workers->isGuest) {
            $this->redirect(['category/index']);
        }

        $model = new LoginWorkers();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $this->redirect(['category/index']);
        } else {
            $model->password = '';

            return $this->render('index', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Workers::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
