<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use frontend\models\Search;
use frontend\models\ContactForm;

use backend\models\Language;
use backend\models\Saler;
use backend\models\Product;
use backend\models\Productnamelanguages;
/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */

	public function actionCraftsman($id = null)
    {
		$model;
		$one = false;
		if(strlen($id) > 0 && intval($id) > 0) {
			$one = true;
			$model = Saler::find()->with(['images', 'salarhistorylanguages', 'products', 'products.images', 'products.productnamelanguages', 'products.productlanguages'])->where(['id' => $id])->all();
		} else {
			$model = Saler::find()->with('images', 'salarhistorylanguages')->orderBy(['saler.firstname' => SORT_ASC])->all();
		}
        return $this->render('craft',[
			'model' => $model,
			'one' => $one,
		]);
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */


    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */

    public function actionSearch() {

        $search = new Search();

        $lan = Yii::$app->language;
        $language = new Language();
        $lan_id;
        $products;
        foreach ($language->languages as $lang) {
            if($lang['shortname'] == $lan) {
                $lan_id = $lang['id'];
            }
        }

        if($search->load(Yii::$app->request->post())) {
            $products = Productnamelanguages::find()
                ->joinWith('product')
                ->joinWith('product.images')
                ->where(['and', 'language_id' => $lan_id, ['and', 'isActive' => 1, ['and', 'product.images.main' => 1, ['like', 'LOWER(productnamelanguages.name)', strtolower($search->search)]]]])->all();
        }
        // print_r($products);
        return $this->render('search', ['products' => $products]);
    }

	public function actionInActiveProducts() {

        $products = Product::find()->with('images')->joinWith('saler')->where('mass < 40')->andWhere('isActive = 1')->orderBy('saler.email ASC')->all();

        return $this->render('inactiveproducts', ['products' => $products]);
    }
}
