<?php

namespace backend\controllers\comp;

use Yii;
use backend\models\Admin;
use backend\models\PasswordReset;
use backend\models\AdminForm;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * AdminController implements the CRUD actions for Admin model.
 */
class AdminController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'user'=>'admin', // this user object defined in web.php
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



    /**
     * Lists all Admin models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = 'login';
        if (!Yii::$app->admin->isGuest) {
            return $this->goHome();
        }

        $model = new AdminForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['comp/workers/index']);
        }
        else {
            $model->password = '';

            return $this->render('index', [
                'model' => $model,
            ]);
        }
    }


    public function actionLogout()
    {
        if(!Yii::$app->admin->isGuest)
        {
            Yii::$app->admin->logout();
            return $this->redirect(['index']);
        }
    }

    /**
     * Updates an existing Admin model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($params)
    {
        $id = json_decode($params, true)['id'];

        $oldmodel = $this->findModel($id);
        $model = new PasswordReset();
        $success = false;

        if ($model->load(Yii::$app->request->post()) && $model->valid($oldmodel)) {
            $oldmodel->password = $model->password;

            if($oldmodel->save()){
                $success = true;
            }
        }

        $model->password = '';
        $model->oldpassword = '';

        return $this->render('update', [
            'model' => $model,
            'success' => $success,
        ]);
    }


    /**
     * Finds the Admin model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Admin the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Admin::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
