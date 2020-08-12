<?php

namespace backend\controllers;

use Yii;
use backend\models\Language;
use backend\models\Product;
use backend\models\Productlanguages;
use backend\models\Productnamelanguages;
use backend\models\ProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
{
    public $layout = 'operator';
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
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $lang = new Language();
        $product = Productlanguages::find()->with('language')->where(['product_id' => $id])->all();
        $productName = Productnamelanguages::find()->with('language')->where(['product_id' => $id])->all();
        $lang->getInfoLanguages($product);
        $lang->getNameLanguages($productName);

        // print_r($lang->names);
        return $this->render('view', [
            'model' => $model,
            'lang' => $lang,
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
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
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
        $lang = new Language();

        $products = Productlanguages::find()->with('language')->where(['product_id' => $id])->all();
        $productNames = Productnamelanguages::find()->with('language')->where(['product_id' => $id])->all();

        $lang->getInfoLanguages($products);
        $lang->getNameLanguages($productNames);

        $id;
        $product;
        $productName;

        foreach ($lang->languages as $value) {
            if($value['shortname'] == 'en') {
                $id = $value['id'];
            }
        }

        if(isset($_POST['Language'])) {
            $product = $this->encode($_POST['Language']['info'], $lang->languages);
            $productName = $this->encodeName($_POST['Language']['names'], $lang->languages);

            foreach ($product as $prod) {
                if($prod->language_id == $id) {
                    $model->info = $prod->name;
                }
            }



            foreach ($productName as $prod) {
                if($prod->language_id == $id) {
                    $model->name = $prod->name;
                    $model->save();
                }
            }

            foreach ($product as $prod) {
                $new = true;
                foreach ($products as $prods) {
                    if($prod->language_id == $prods->language_id) {
                        $prods->name = $prod->name;
                        $prods->save();
                        $new = false;
                    }
                }
                if($new) {
                    $prod->product_id = $model->id;
                    $prod->save();
                }
            }

            foreach ($productName as $prodName) {
                $new = true;
                foreach ($productNames as $prodNames) {
                    if($prodName->language_id == $prodNames->language_id) {
                        $prodNames->name = $prodName->name;
                        $prodNames->save();
                        $new = false;
                    }
                }
                if($new == true) {
                    $prodName->product_id = $model->id;
                    $prodName->save();
                }
            }

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'lang' => $lang,
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

    public function encode($json, $languages) {
        $info = [];
        foreach ($languages as $lan) {
            $prod = new Productlanguages();
            $prod->language_id = $lan['id'];
            $prod->name = $json[$lan['shortname']];
            array_push($info, $prod);
        }
        return $info;
    }

    public function encodeName($json, $languages) {
        $name = [];
        foreach ($languages as $lan) {
            $prod = new Productnamelanguages();
            $prod->language_id = $lan['id'];
            $prod->name = $json[$lan['shortname']];
            array_push($name, $prod);
        }
        return $name;
    }
}
