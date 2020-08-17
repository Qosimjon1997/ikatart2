<?php
namespace frontend\controllers;

use frontend\models\SalerResendVerificationEmailForm;
use frontend\models\SalerPasswordResetRequestForm;
use frontend\models\SalerResetPasswordForm;
use frontend\models\SalerVerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use backend\models\Saler;

use frontend\models\SalerLoginForm;
use frontend\models\SalerSignupForm;

use frontend\models\SalerResetpassForm;

/**
 * Site controller
 */
class SalerController extends Controller
{
    /**
     * {@inheritdoc}
     */
    /*public function behaviors()
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
    */

    public function behaviors()
    {
	    return [
            'access' => [
                'class' => AccessControl::className(),
                'user'=>'saler', // this user object defined in web.php
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'allow' => true,
                        // 'actions' => ['login'],
                        'roles' => ['?'],
                    ],
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

    // public $layout='salerlayout';

    public function actionIndex()
    {
        if (!Yii::$app->saler->isGuest) {

            $salerid = Yii::$app->saler->id;
            return $this->render('index',['salerid'=>$salerid]);
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
            return $this->render('index',['salerid'=>$salerid]);
        }

        $model = new SalerLoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->render('index',['salerid'=>Yii::$app->saler->id]);
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
            return $this->goHome();
        }

    }

    public function actionChangepass()
    {
        if (!Yii::$app->saler->isGuest) {

            $model=new SalerResetpassForm();
            
            if($model->load(Yii::$app->request->post()) && $model->validate())
            {
                
                Yii::$app->session->setFlash('success', "Password reseted"); 
            }
            
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
            return $this->render('index',['salerid'=>$salerid]);
        }

        $model = new SalerSignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
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
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
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
            Yii::$app->session->setFlash('success', 'New password saved.');

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
                Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
                return $this->goHome();
            }
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
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
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }
}
