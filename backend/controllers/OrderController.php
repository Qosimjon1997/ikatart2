<?php

namespace backend\controllers;

use Yii;
use backend\models\Order;
use backend\models\Delivery;
use backend\models\OrderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OrderController implements the CRUD actions for Order model.
 */
class OrderController extends Controller
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
     * Lists all Order models.
     * @return mixed
     */
    public function actionIndex($params)
    {
        $isActive = json_decode($params, true)['isActive'];

        $searchModel = new OrderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $isActive);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'isActive' => $isActive,
        ]);
    }

    public function actionAccept($id)
    {
        $model = $this->findModel($id);
        $model->isActive = 1;
        $model->save();

        return $this->redirect(
            Url::to([
                'order/index',
                'params' => json_encode([
                    'isActive' => 0
                ])
            ])
        );
    }

    /**
     * Finds the Order model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Order the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Order::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
