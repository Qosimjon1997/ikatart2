<?php

namespace backend\controllers;

use Yii;
use backend\models\Language;
use backend\models\Categorylanguages;
use backend\models\Category;
use backend\models\CategorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CategoryController implements the CRUD actions for Category model.
 */
class CategoryController extends Controller
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
     * Lists all Category models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Category model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $lang = new Language();
        $category = Categorylanguages::find()->with('language')->where(['category_id' => $id])->all();
        $lang->getNameLanguages($category);
        // print_r($lang->names);
        return $this->render('view', [
            'model' => $model,
            'lang' => $lang,
        ]);
    }

    /**
     * Creates a new Category model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Category();
        $lang = new Language;
        $lang->getNameLanguages();
        $category;
        $id;
        foreach ($lang->languages as $value) {
            if($value['shortname'] == 'en') {
                $id = $value['id'];
            }
        }

        if(isset($_POST['Language'])) {
            $category = $this->encode($_POST['Language']['names'], $lang->languages);
        }

        if ($model->load(Yii::$app->request->post())) {

            foreach ($category as $cat) {
                if($cat->language_id == $id) {
                    $model->name = $cat->name;
                    $model->save();
                }
            }

            foreach ($category as $cat) {
                $cat->category_id = $model->id;
                $cat->save();
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'lang' => $lang,
        ]);
    }

    /**
     * Updates an existing Category model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $lang = new Language();
        $category = Categorylanguages::find()->with('language')->where(['category_id' => $id])->all();
        $lang->getNameLanguages($category);
        $id;
        $categories;
        foreach ($lang->languages as $value) {
            if($value['shortname'] == 'en') {
                $id = $value['id'];
            }
        }

        if(isset($_POST['Language'])) {
            $categories = $this->encode($_POST['Language']['names'], $lang->languages);
        }

        if ($model->load(Yii::$app->request->post())) {

            foreach ($categories as $cat) {
                if($cat->language_id == $id) {
                    $model->name = $cat->name;
                    $model->save();
                }
            }

            foreach ($categories as $cats) {
                foreach ($category as $cat) {
                    if($cats->language_id == $cat->language_id) {
                        $cat->name = $cats->name;
                        $cat->save();
                    }
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
     * Deletes an existing Category model.
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
     * Finds the Category model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Category the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    public function encode($json, $languages) {
        $category = [];
        foreach ($languages as $lan) {
            $cat = new Categorylanguages();
            $cat->language_id = $lan['id'];
            $cat->name = $json[$lan['shortname']];
            array_push($category, $cat);
        }
        return $category;
    }
}
