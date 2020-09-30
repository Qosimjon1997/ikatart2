<?php

namespace frontend\controllers;
use Yii;
class CurrencyController extends \yii\web\Controller
{
    public function actionIndex()
    {
        if(isset($_POST['currency'])) {

            $currency = $_POST['currency'];
            // Yii::$app->currency->shortname = $currency;

            $currencyCookie = new \yii\web\Cookie([
                'name' => 'currency',
                'value' => $currency,
                'expire' => time() + 60 * 60 * 24 * 30, // 30 days
            ]);
            \Yii::$app->response->cookies->add($currencyCookie);
        }
        if(Yii::$app->request->referrer){
            return $this->redirect(Yii::$app->request->referrer);
        }else{
          return $this->goHome();
        }
    }

}
