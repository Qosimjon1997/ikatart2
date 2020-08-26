<?php

namespace frontend\controllers;

use backend\models\Basket;
use yii\web\NotFoundHttpException;
use Yii;

class BasketController extends \yii\web\Controller
{
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

    protected function findModel($id)
    {
        if (($model = Basket::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
