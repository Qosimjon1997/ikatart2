<?php
use frontend\assets\CategoryAsset;
use yii\widgets\Pjax;
use backend\models\Category;
use backend\models\Product;
use yii\helpers\Html;
use yii\helpers\Url;
CategoryAsset::register($this);
?>

<h2 class="text-blue text-center m-1"><?= Yii::t('app', 'Works by regions')?></h2>
<?php Pjax::begin(['enablePushState' => false]); ?>
<div class="row mx-sm-4">

<?php
    $parentCategory = Category::find()->where(['category_id'=>null])->all();
    foreach ($parentCategory as $value) {
      $childCategory = Category::find()->where(['category_id'=>$value->id])->all();
      foreach ($childCategory as $valueProduct) {
        $prod = Product::find()->where(['category_id'=>$valueProduct->id,'isActive'=>1])->one();
        
        ?>


<div class="col-6 col-md-4 col-lg-3 my-2">
    <div class="card-item bg-light box-shadow-blue">
      <?= Html::a(Html::img('/backend/web/upimages/' . $prod->images[0]->path, ['alt' => $name, 'class' => 'card-image']), Url::to(['/product/buy', 'id' => $prod->id]), []) ?>
      <div class="card-label p-2">
          <div class="card-name"><?php echo $prod->name?></div>
          <div class="card-price text-success">$<?php echo $prod->price?></div>
      </div>

      <div class="card-pane m-0">
          <?= Html::a('<i class="fas fa-shopping-cart"></i>', Url::to(['basket/add', 'id' => $prod->id]), ['class' => 'btn btn-block text-center btn-blue']) ?>
      </div>
    </div>
  </div>


<?php
      }

    }
    
?>
  


</div>
<?php Pjax::end()?>