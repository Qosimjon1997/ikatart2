<?php

namespace frontend\controllers;

use Yii;
use backend\models\Language;
use backend\models\LanguageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LanguageController implements the CRUD actions for Language model.
 */
class LanguageController extends Controller
{

    public function actionIndex()
    {
        if(isset($_POST['lan'])) {

            $language = $_POST['lan'];
            Yii::$app->language = $language;

            $languageCookie = new \yii\web\Cookie([
                'name' => 'language',
                'value' => $language,
                'expire' => time() + 60 * 60 * 24 * 30, // 30 days
            ]);
            \Yii::$app->response->cookies->add($languageCookie);
        }
        return $this->goBack();
    }
}
