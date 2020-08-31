<?php

namespace frontend\controllers;

use Yii;
use backend\models\Product;
use backend\models\Address;
use backend\models\Cards;
use backend\models\Category;
use backend\models\Order;
use backend\models\Productnamelanguages;
use backend\models\Productlanguages;
use backend\models\Language;
use backend\models\Images;
use backend\models\UploadImage;
use backend\models\ProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
{
    public $layout;
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
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
        // your custom code here, if you want the code to run before action filters,
        // which are triggered on the [[EVENT_BEFORE_ACTION]] event, e.g. PageCache or AccessControl

        if (!parent::beforeAction($action)) {
            return false;
        }

        $actions = ['index', 'view', 'create', 'update', 'delete'];

        if(!Yii::$app->saler->identity->inn && !Yii::$app->saler->identity->phone && !Yii::$app->saler->identity->passport && array_search($this->action->id, $actions)) {
            if(!Yii::$app->saler->isGuest) {
                return $this->redirect(['saler/settings']);
            } else {
                return $this->redirect(['saler/login']);
            }
        }

        // other custom code here

        return true; // or false to not run the action
    }

    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = 'salerlayout';
        if(!Yii::$app->saler->isGuest)
        {
            $searchModel = new ProductSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams, null ,Yii::$app->saler->id);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }

    }

    public function actionBuy($id)
    {
        $model = $this->findModel($id);
        $modelcarusel = $this->findModelForCarusel($model);

        return $this->render('buy', [
            'model' => $model,
            'modelcarusel' => $modelcarusel,
        ]);
        // var_dump($image2->path);

    }


    public function actionScategory($id)
    {
        $model = Product::find()->where(['category_id'=>$id,'isActive'=>1])->all();

        return $this->render('scategory', [
            'model' => $model,
            
        ]);
    }

    public function actionConfirm()
    {       
        if(!Yii::$app->user2->isGuest)
        {
            $address = Address :: find()->with('country')->where(['user_id'=>Yii::$app->user2->id])->all();
            $card = Cards::find()->where(['user_id'=>Yii::$app->user2->id])->all();
            $modelOrder = new Order();
            $modelCards = new Cards();
            
            $newCard = new Cards();
            $newAddress = new Address();
    
            if(Yii::$app->request->post('submit')=='btnCard')
             {
                $newCard->load(Yii::$app->request->post());
                $newCard->user_id=Yii::$app->user2->id;
                $newCard->save();
                // var_dump($newCard);
                return $this->redirect(['confirm']);
             }
             if(Yii::$app->request->post('submit')=='btnAddress')
             {
                $newAddress->load(Yii::$app->request->post());
                
                $newAddress->user_id=Yii::$app->user2->id;
                
                $newAddress->save();
    
                return $this->redirect(['confirm']);
             }
             if(Yii::$app->request->post('submit')=='btnConf')
             {
                 
                //  Confirm all
                 return '3';
             }
    
            return $this->render('confirm', [
                'address' => $address,
                'card' => $card,
                'modelOrder' => $modelOrder,
                'modelCards' => $modelCards,
                'newAddress' => $newAddress,
                'newCard' => $newCard,
            ]);
    
        }
        else
        {
            return $this->redirect(['user/login']);
        }
        
    }

    /**
     * Displays a single Product model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $image = Images::find()->where(['product_id' => $id, 'main' => 1])->all();
        $this->layout = 'salerlayout';
        return $this->render('view', [
            'model' => $this->findModel($id),
            'image' => $image,
        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout = 'salerlayout';
        $model = new Product();

        $product_name = new Productnamelanguages();
        $product_info = new Productlanguages();

        $image = new Images();
        $modelimage = new UploadImage();

        $lan = Yii::$app->language;
        $language = new Language();
        $lan_id;

        foreach ($language->languages as $lang) {
            if($lang['shortname'] == $lan) {
                $lan_id = $lang['id'];
            }
        }

        $product_info->language_id = $lan_id;
        $product_name->language_id = $lan_id;

        if ($model->load(Yii::$app->request->post())) {
            $model->Saler_id = Yii::$app->saler->id;
            $model->isActive = 0;
            $model->save();

            $product_name->name = $model->name;
            $product_info->name = $model->info;
            $product_name->product_id = $model->id;
            $product_info->product_id = $model->id;
            $product_name->save();
            $product_info->save();

            if (Yii::$app->request->isPost) {

                $modelimage->imageFile = UploadedFile::getInstance($modelimage, 'imageFile');

                $image->path = $modelimage->upload();
                $image->product_id = $model->id;
                $image->main = 1;
                $image->save();
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'modelimage' =>$modelimage,
        ]);
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $this->layout = 'salerlayout';
        $model = $this->findModel($id);
        $image = Images::find()->where(['product_id' => $id, 'main' => 1])->all();
        $modelimage = new UploadImage();

        $lan = Yii::$app->language;
        $language = new Language();
        $lan_id;
        foreach ($language->languages as $lang) {
            if($lang['shortname'] == $lan) {
                $lan_id = $lang['id'];
            }
        }
        $product_name = Productnamelanguages::find()->where(['product_id' => $model->id, 'language_id' => $lan_id])->all();
        $product_info = Productlanguages::find()->where(['product_id' => $model->id, 'language_id' => $lan_id])->all();

        if(count($image) == 0) {
            $image[0] = new Images();
        }





        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if(count($product_name) == 0) {
                $product_name[0] = new Productnamelanguages();
            }

            if(count($product_info) == 0) {
                $product_info[0] = new Productlanguages();
            }

            $product_name[0]->language_id = $lan_id;
            $product_name[0]->product_id = $model->id;
            $product_name[0]->name = $model->name;
            $product_name[0]->save();
            $product_info[0]->language_id = $lan_id;
            $product_info[0]->product_id = $model->id;
            $product_info[0]->name = $model->info;
            $product_info[0]->save();

            if (Yii::$app->request->isPost) {
                $modelimage->imageFile = UploadedFile::getInstance($modelimage, 'imageFile');
                if($modelimage->imageFile && $modelimage->delete($image[0]->path)) {
                    $image[0]->path = $modelimage->upload();
                    $image[0]->save();
                }
            }

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'modelimage' => $modelimage,
            'image' => $image,
        ]);
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->layout = 'salerlayout';
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    protected function findModelForCarusel($model)
    {
        if (($model = Product::find()
            ->with('images')
            ->where(['and', 'category_id' => $model->category_id,
                    ['and', 'isActive' => 1,
                    ['<>', 'id', $model->id]]])
            ->all()) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
