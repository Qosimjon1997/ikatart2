<?php

namespace frontend\controllers;

use Yii;
use backend\models\User;
use backend\models\UserSearch;
use frontend\models\UserSignupForm;
use frontend\models\UserLoginForm;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    /**
     * {@inheritdoc}
     */
    // public function behaviors()
    // {
    //     return [
    //         'verbs' => [
    //             'class' => VerbFilter::className(),
    //             'actions' => [
    //                 'delete' => ['POST'],
    //             ],
    //         ],
    //     ];
    // }

    	//behaviors of the school
    public function behaviors()
    {
	    return [
            'access' => [
                'class' => AccessControl::className(),
                'user'=>'user2', // this user object defined in web.php
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['login'],                    
                    'roles' => ['?'],

                    ],
                ],
            ]
        ];
    }



    public function actions()
    {
        /*
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
        */
    }

    public function actionLogin()
    {
        
        if (!Yii::$app->user2->isGuest) {

            $userid = Yii::$app->user2->id;
            return $this->render('index',['userid'=>$userid]);
        }

        $model = new UserLoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->render('index',['userid'=>Yii::$app->user2->id]);
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        
        Yii::$app->user2->logout();

        return $this->render('login');
        
    }

    public function actionSignup()
    {
        if (!Yii::$app->user2->isGuest) {

            $userid = Yii::$app->user2->id;
            return $this->render('index',['userid'=>$userid]);
        }

        $model = new UserSignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');

            return $this->render('login');
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
        
    }


    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (!Yii::$app->user2->isGuest) {

            $userid = Yii::$app->user2->id;
            
            return $this->render('index',['userid'=>$userid]);
        }
        else
        {
            return $this->render('login');
        }

        
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
