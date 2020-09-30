<?php

namespace frontend\components;

use yii\base\BootstrapInterface;
use backend\models\Currency;
use yii\base\Component;
use yii\base\Exception;
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
            $preferredCurrency = 'dollar';
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
    public function convert($shortname, $sum = 1) {

        // get given currency
        $currency = Currency::find()->where(['shortname' => $shortname])->all();
        if(count($currency) > 0){
            // convert sum to dollar according given currency
            $usd = $sum / $currency[0]->koeficent;

            // convert dollar to current currency
            $current = ceil($usd * Yii::$app->currency->koeficent);
            return '<i class="fas fa-' . Yii::$app->currency->shortname . '-sign"></i> ' . $current;

        } else {
            throw new Exception(Yii::t('app', "Given currency was not found"), 1);
        }
    }
}

?>
