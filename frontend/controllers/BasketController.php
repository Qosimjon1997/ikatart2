<?php

namespace frontend\controllers;

use Yii;
use backend\models\Basket;
use backend\models\BasketSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BasketController implements the CRUD actions for Basket model.
 */
class BasketController extends Controller
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



    public function actionAdd($id)
    {
    	if(!Yii::$app->user2->isGuest) {
    		$basket = new Basket();

    		$basket->product_id = $id;
    		$basket->user_id = Yii::$app->user2->identity->id;
    		$basket->count = 1;
    		$basket->save();
    		Yii::$app->session->remove('basket');

    	} else {

    		$session = Yii::$app->session;

			$flash = array();
			$flash = $session->get('basket');

			$flash[$id] = $id;

			Yii::$app->session->set('basket', $flash);
    	}

        return $this->goBack();
    }

    public function actionRemove($id)
    {
    	if(!Yii::$app->user2->isGuest) {

    		$basket = $this->findOne($id);
    		$basket->delete();
    		Yii::$app->session->remove('basket');
    	} else {

    		$session = Yii::$app->session;

			$flash = array();
			$flash = $session->get('basket');
            // foreach ($flash as $key => $value) {

            // }
			if(isset($flash) && count($flash) != 0) {
				if (isset($flash[$id])) {
				    unset($flash[$id]);
				    unset($_SESSION['basket'][$id]);
				}
			}

			Yii::$app->session->set('basket', $flash);
    	}
        return $this->goBack();
    }


    /**
     * Lists all Basket models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BasketSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionList()
    {
        return $this->render('list');
    }

    /**
     * Finds the Basket model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Basket the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Basket::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
