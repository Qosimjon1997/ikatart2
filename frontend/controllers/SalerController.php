<?php
namespace frontend\controllers;


use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use backend\models\Saler;

use frontend\models\SalerLoginForm;
use frontend\models\SalerSignupForm;

/**
 * Site controller
 */
class SalerController extends Controller
{
    /**
     * {@inheritdoc}
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
                        'roles' => ['?'],

                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function beforeAction($action)
    {
        if (!parent::beforeAction($action)) {
            return false;
        }

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

    public $layout='salerlayout';

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
            return $this->redirect(['index']);
        }
        
    }

    public function actionChangepass()
    {
        if (!Yii::$app->saler->isGuest) {
           
            $model = new SalerResetpassForm();
            if ($model->load(Yii::$app->request->post()) && $model->check()) {
                return $this->render('index',['salerid'=>'All good']);
            } 
            else {
                $model->password = '';
                return $this->render('login', [
                'model' => $model,
                ]);
            }
        }
        else
        {
            return redirect(['login']);
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
            return $this->render('login');
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
        /*$model = new PasswordResetRequestForm();
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
        ]);*/
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
        /*try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);*/
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
        /*try {
            $model = new VerifyEmailForm($token);
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
        return $this->goHome();*/
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        /*$model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);*/
    }
}
