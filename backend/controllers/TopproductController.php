<?php

namespace backend\controllers;

use Yii;
use backend\models\Topproduct;
use backend\models\TopproductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TopproductController implements the CRUD actions for Topproduct model.
 */
class TopproductController extends Controller
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

    /**
     * Lists all Topproduct models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TopproductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}
