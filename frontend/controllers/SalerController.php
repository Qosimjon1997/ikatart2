<?php
namespace frontend\controllers;

use frontend\models\SalerResendVerificationEmailForm;
use frontend\models\SalerPasswordResetRequestForm;
use frontend\models\SalerResetPasswordForm;
use frontend\models\SalerVerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\NotFoundHttpException;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use backend\models\Saler;
use backend\models\Salarhistorylanguages;
use backend\models\Language;
use backend\models\Images;
use backend\models\UploadImage;

use frontend\models\SalerLoginForm;
use frontend\models\SalerSignupForm;

use frontend\models\SalerResetpassForm;

/**
 * Site controller
 */
class SalerController extends Controller
{
    public $layout = "salerlayout";
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
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

        if(Yii::$app->saler->isGuest && $this->action->id != 'login') {
            return $this->redirect(['login']);
        }

        // other custom code here

        return true; // or false to not run the action
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

    // public $layout='salerlayout';

    public function actionIndex()
    {
        if (!Yii::$app->saler->isGuest) {

            $salerid = Yii::$app->saler->id;
            return $this->redirect(['history']);
        }
        else
        {
            return $this->redirect(['login']);
        }

    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {

        if (!Yii::$app->saler->isGuest) {

            $salerid = Yii::$app->saler->id;
            return $this->redirect(['history']);
        }

        $model = new SalerLoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['history']);
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
        if(!Yii::$app->saler->isGuest)
        {
            Yii::$app->saler->logout();
            return $this->redirect(['login']);
        }
    }

    public function actionHistory() {

        if (!Yii::$app->saler->isGuest) {

            $model = $this->findModel(Yii::$app->saler->id);
            $lan = Yii::$app->language;
            $language = new Language();
            $lan_id;
            $history;

            foreach ($language->languages as $lang) {
                if($lang['shortname'] == $lan) {
                    $lan_id = $lang['id'];
                }
            }

            foreach ($model->salarhistorylanguages as $saler_history) {
                if($saler_history->language_id == $lan_id) {
                    $history = $saler_history->name;
                    break;
                }
            }

            $image = $model->images[0]->path;

            return $this->render('about', ['history' => $history, 'image' => $image]);
        } else {
            return $this->redirect(['login']);
        }
    }



    public function actionSettings()
    {
        if (!Yii::$app->saler->isGuest) {
            $saler = $this->findModel(Yii::$app->saler->id);
            $model=new SalerResetpassForm();
            //$history =
            $img = new UploadImage();
            $image = Images::find()->where(['saler_id' => $saler->id, 'main' => 1])->limit(1)->all();

            $lan = Yii::$app->language;
            $language = new Language();
            $lan_id;

            foreach ($language->languages as $lang) {
                if($lang['shortname'] == $lan) {
                    $lan_id = $lang['id'];
                }
            }

            $history = Salarhistorylanguages::find()->where([
                'saler_id' => $saler->id,
                'language_id' => $lan_id
            ])->all();
            if(count($history) == 0) {
                $history[0] = new Salarhistorylanguages();
            }

            if($model->load(Yii::$app->request->post()) && $model->valid($saler)) {
                $saler->password = $model->newpassword;
                Yii::$app->session->setFlash('success', Yii::t('app', 'Password reseted'));
            }
            if ($saler->load(Yii::$app->request->post()) && $saler->save()){
                // var_dump($saler);
                if(Yii::$app->request->isPost){

                    $img->imageFile = UploadedFile::getInstance($img, 'imageFile');
                    if($img->imageFile) {
                        if($image && $img->delete($image[0]->path)) {
                            $image[0]->path = $img->upload();
                            $image[0]->save();
                        } else {
                            $image = new Images();
                            $image->path = $img->upload();
                            $image->saler_id = $saler->id;
                        }
                    }
                }
            }

            if($history[0]->load(Yii::$app->request->post())) {
                // print_r($history);
                $history[0]->saler_id = $saler->id;
                $history[0]->language_id = $lan_id;
                $history[0]->save();
            }
            $model->newpassword = null;
            $model->oldpassword = null;
            $model->newpasswordconfirm = null;
            return $this->render('settings', [
                'model' => $model,
                'saler' => $saler,
                'img' => $img,
                'image' => $image,
                'history' => $history
            ]);
        }
        else
        {
            return $this->redirect(['login']);
        }


    }


    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        if (!Yii::$app->saler->isGuest) {

            $salerid = Yii::$app->saler->id;
            return $this->redirect(['history']);
        }

        $model = new SalerSignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', Yii::t('app', 'Thank you for registration. Please check your inbox for verification email.'));
            return $this->redirect(['login']);
        }

        return $this->render('signup', [
            'model' => $model,
        ]);

    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new SalerPasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', Yii::t('app', 'Check your email for further instructions.'));

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', Yii::t('app', 'Sorry, we are unable to reset password for the provided email address.'));
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new SalerResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', Yii::t('app', 'New password saved.'));

            return $this->redirect(['login']);
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new SalerVerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($user = $model->verifyEmail()) {
            if (Yii::$app->user->login($user)) {
                Yii::$app->session->setFlash('success', Yii::t('app', 'Your email has been confirmed!'));
                return $this->goHome();
            }
        }

        Yii::$app->session->setFlash('error', Yii::t('app', 'Sorry, we are unable to verify your account with provided token.'));
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new SalerResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', Yii::t('app', 'Check your email for further instructions.'));
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', Yii::t('app', 'Sorry, we are unable to resend verification email for the provided email address.'));
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Saler::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
