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
