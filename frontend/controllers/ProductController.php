<?php

namespace frontend\controllers;

use Yii;
use backend\models\Product;
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

    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(!Yii::$app->saler->isGuest)
        {
            $searchModel = new ProductSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams,1,Yii::$app->saler->id);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
        
    }

    public function actionView2($id)
    {
        $model = $this->findModel($id);
        $img = new Images();
        $image2 = $img->getImage($id);
        $modelcarusel = $this->findModelForCarusel($model->category_id);

        return $this->render('view2', [
            'model' => $this->findModel($id),
            'modelimage' => $image2,
            'modelcarusel' => $modelcarusel,
        ]);
        // var_dump($image2->path);
        
    }

    public function actionViewimage($id)
    {
        $model = $this->findModel($id);
        $img = new Images();
        $image2 = $img->getImage($id);
        $modelcarusel = $this->findModelForCarusel($model->category_id);
        
        // return $this->render('viewimage', [
        //     'model' => $this->findModel($id),
        //     'modelimage' => $image2,
        //     'modelcarusel' => $modelcarusel,
        // ]);
        $amg = $modelcarusel->images;
         var_dump($amg->path);
            
        // $exp1 = Product::find(['category_id' => 7, 'isActive' => 1])->all();
        // foreach ($exp1 as $key1) {
        //     # code...
        //     echo "<h2>";
        //     echo $key1->name;
        //     echo "<ul>";
        //     foreach ($key1->images as $func) {
        //         # code...
        //         echo "<li>{$func->path}</li>";
        //     }
        //     echo "</ul>";
        //     echo "<h2>";
        // }
        // $exp2 = Images::find()->all();
        // foreach ($exp2 as $key2) {
        //     # code...
        //     echo "<h2> 
        //         path {$key2->path} |
        //         main {$key2->main} |
        //         product id {$key2->product_id}
        //     </h2>";
        // }


    }

    /**
     * Displays a single Product model.
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
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $model = new Product();
        $modelimage = new UploadImage();
        $image = new Images();
        if ($model->load(Yii::$app->request->post())) {

            if (Yii::$app->request->isPost) {
                
                $model->Saler_id = Yii::$app->saler->id;
                $model->isActive = 0;
                $model->save();

                $modelimage->imageFile = UploadedFile::getInstance($modelimage, 'imageFile');
            
                $image->path=$modelimage->upload();
                $image->product_id = $model->id;
                $image->main=1;
                $image->save();
            }
            
                // file is uploaded successfull 
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
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
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

    protected function findModelForCarusel($id)
    {


        if (($model = Product::findAll(['category_id' => $id, 'isActive' => 1])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
