<?php

namespace frontend\components;

use yii\base\BootstrapInterface;
use Yii;

class LanguageSelector implements BootstrapInterface
{
    public $supportedLanguages = [];

    public function bootstrap($app)
    {
        $preferredLanguage = isset(Yii::$app->request->cookies['language']) ? (string)Yii::$app->request->cookies['language'] : null;

        if (empty($preferredLanguage)) {
            $preferredLanguage = 'en';//Yii::$app->request->getPreferredLanguage($this->supportedLanguages);
        }

        \Yii::$app->language = $preferredLanguage;
    }
}

?>
