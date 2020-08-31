<?php

namespace frontend\controllers;

use Yii;
use backend\models\Basket;
use backend\models\Posttype;
use backend\models\Images;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\helpers\Html;

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

    		$basket = $this->findModel($id);
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
       
        if(!Yii::$app->user2->isGuest)
        {
            $model = $this->findList(Yii::$app->user2->id);
            $posttype = $this->findPostType();
            
            return $this->render('index',[
                'model' => $model,
                'posttype'=>$posttype,
            ]);
        }

    }

    protected function findPostType()
    {
        if (($model = Posttype::findOne(1)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    protected function findImage($id)
    {
        if (($model = Images::findAll(['product_id' => $id, 'main' => 1])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
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

    protected function findList($id)
    {
        if (($model = Basket::find(['user_id' => $id])->all()) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
