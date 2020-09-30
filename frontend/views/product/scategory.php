<?php
use frontend\assets\CategoryAsset;
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\helpers\Url;
use backend\models\Language;
CategoryAsset::register($this);

$lan = Yii::$app->params['languages'];
$lan_id;
$val = strtolower(Yii::$app->language);
$languages = Language::find()->all();

foreach ($languages as $language) {
    if($language->shortname == $val) {
        $lan_id = $language->id;
    }
}
?>

<h2 class="text-blue text-center m-1"><?php Yii::t('app', 'Works by regions')?></h2>

<div class="row mx-sm-4">
    <?php 
        $product_name;        
        foreach ($model as $prod) {

            foreach($prod->productnamelanguages as $name_lan) {
              if($name_lan->language_id == $lan_id) {
                $product_name = $name_lan->name;
              }
            }?>
        <div class="col-6 col-md-4 col-lg-3 my-2">
            <div class="card-item bg-light box-shadow-blue">
            <?= Html::a(Html::img('/backend/web/upimages/' . $prod->images[0]->path, ['alt' => $product_name, 'class' => 'card-image']), Url::to(['/product/buy', 'id' => $prod->id]), []) ?>
                <div class="card-label p-2">
                    <div class="card-name"><?php echo $product_name?></div>
                    <div class="card-price text-success"><?= Yii::$app->currency->convert('dollar', $prod->price) ?></div>
                </div>
                <div class="card-pane m-0">
                    <?= Html::a('<i class="fas fa-shopping-cart"></i>', Url::to(['basket/add', 'id' => $prod->id]), ['class' => 'btn btn-block text-center btn-blue']) ?>  
                </div>
            </div>
        </div>  
    <?php } ?>
    

</div>