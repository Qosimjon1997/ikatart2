<?php

namespace frontend\components;

use yii\base\BootstrapInterface;
use backend\models\Currency;
use yii\base\Component;
use Yii;

class CurrencySelector implements BootstrapInterface
{
    public $shortname;
    public $name;
    public $koeficent;
    public $id;

    public function bootstrap($app)
    {
        $preferredCurrency = isset(Yii::$app->request->cookies['currency']) ? (string)Yii::$app->request->cookies['currency'] : null;

        if (empty($preferredCurrency)) {
            $preferredCurrency = 'usd';
        }

        $currency = Currency::find()->where(['shortname' => $preferredCurrency])->all();

        Yii::$app->currency->shortname = $currency[0]->shortname;;
        Yii::$app->currency->name = $currency[0]->name;
        Yii::$app->currency->koeficent = $currency[0]->koeficent;
        Yii::$app->currency->id = $currency[0]->id;
    }

    /**
     * Converts sum or price from given currency to current.
     * @param integer $sum
     * @param string $shortname
     * @return integer converted sum
     */
    public function convert($shortname = 'usd', $sum = 0) {

        // get given currency
        $currency = Currency::find()->where(['shortname' => $shortname])->all();

        if(isset($currency)){
            // convert sum to usd according given currency
            $usd = $sum / $currency[0]->koeficent;

            // convert usd to current currency
            $current = ceil($usd * Yii::$app->currency->koeficent);
            return $current;

        } else {
            throw new Exception(Yii::t('app', "Given currency was not found"), 1);
        }
    }
}

?>
