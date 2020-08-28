<?php
use frontend\assets\CategoryAsset;
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\helpers\Url;
CategoryAsset::register($this);
?>

<h2 class="text-blue text-center m-5"><?= Yii::t('app', 'Works by regions')?></h2>
<?php Pjax::begin(['enablePushState' => false]); ?>
<div class="row mx-sm-4">
  <div class="col-6 col-sm-4 col-md-3 my-2">
    <div class="card-item bg-light box-shadow-blue">
      <?= Html::a(Html::img('/frontend/web/img/load/1.jpg', ['alt' => 'product name', 'class' => 'card-image']), Url::to(['product/buy', 'id' => 5]), []) ?>

      <div class="card-label p-2">
          <div class="card-name">Pillow</div>
          <div class="card-price text-success">$40.00</div>
      </div>

      <div class="card-pane m-0">
          <?= Html::a('<i class="fas fa-shopping-cart"></i>', Url::to(['basket/add', 'id' => 5]), ['class' => 'btn btn-block text-center btn-blue']) ?>
      </div>
    </div>
  </div>
  <div class="col-6 col-sm-4 col-md-3 my-2">
    <div class="card-item bg-light box-shadow-blue">
      <?= Html::a(Html::img('/frontend/web/img/load/2.jpg', ['alt' => 'product name', 'class' => 'card-image']), ['/'], []) ?>

      <div class="card-label p-2">
          <div class="card-name">Pillow</div>
          <div class="card-price text-success">$40.00</div>
      </div>

      <div class="card-pane m-0">
          <?= Html::a('<i class="fas fa-shopping-cart"></i>', Url::to(['basket/add', 'id' => 3]), ['class' => 'btn btn-block text-center btn-blue']) ?>
      </div>
    </div>
  </div>
  <div class="col-6 col-sm-4 col-md-3 my-2">
    <div class="card-item bg-light box-shadow-blue">
      <?= Html::a(Html::img('/frontend/web/img/load/3.jpg', ['alt' => 'product name', 'class' => 'card-image']), ['/'], []) ?>

      <div class="card-label p-2">
          <div class="card-name">Pillow</div>
          <div class="card-price text-success">$40.00</div>
      </div>

      <div class="card-pane m-0">
          <?= Html::a('<i class="fas fa-shopping-cart"></i>', Url::to(['basket/add', 'id' => 3]), ['class' => 'btn btn-block text-center btn-blue']) ?>
      </div>
    </div>
  </div>
  <div class="col-6 col-sm-4 col-md-3 my-2">
    <div class="card-item bg-light box-shadow-blue">
      <?= Html::a(Html::img('/frontend/web/img/load/4.jpg', ['alt' => 'product name', 'class' => 'card-image']), ['/'], []) ?>

      <div class="card-label p-2">
          <div class="card-name">Pillow</div>
          <div class="card-price text-success">$40.00</div>
      </div>

      <div class="card-pane m-0">
          <?= Html::a('<i class="fas fa-shopping-cart"></i>', Url::to(['basket/add', 'id' => 3]), ['class' => 'btn btn-block text-center btn-blue']) ?>
      </div>
    </div>
  </div>
  <div class="col-6 col-sm-4 col-md-3 my-2">
    <div class="card-item bg-light box-shadow-blue">
      <?= Html::a(Html::img('/frontend/web/img/load/5.jpg', ['alt' => 'product name', 'class' => 'card-image']), ['/'], []) ?>

      <div class="card-label p-2">
          <div class="card-name">Pillow</div>
          <div class="card-price text-success">$40.00</div>
      </div>

      <div class="card-pane m-0">
          <?= Html::a('<i class="fas fa-shopping-cart"></i>', Url::to(['basket/add', 'id' => 3]), ['class' => 'btn btn-block text-center btn-blue']) ?>
      </div>
    </div>
  </div>
  <div class="col-6 col-sm-4 col-md-3 my-2">
    <div class="card-item bg-light box-shadow-blue">
      <?= Html::a(Html::img('/frontend/web/img/load/6.jpg', ['alt' => 'product name', 'class' => 'card-image']), ['/'], []) ?>

      <div class="card-label p-2">
          <div class="card-name">Pillow</div>
          <div class="card-price text-success">$40.00</div>
      </div>

      <div class="card-pane m-0">
          <?= Html::a('<i class="fas fa-shopping-cart"></i>', Url::to(['basket/add', 'id' => 3]), ['class' => 'btn btn-block text-center btn-blue']) ?>
      </div>
    </div>
  </div>
  <div class="col-6 col-sm-4 col-md-3 my-2">
    <div class="card-item bg-light box-shadow-blue">
      <?= Html::a(Html::img('/frontend/web/img/load/7.jpg', ['alt' => 'product name', 'class' => 'card-image']), ['/'], []) ?>

      <div class="card-label p-2">
          <div class="card-name">Pillow</div>
          <div class="card-price text-success">$40.00</div>
      </div>

      <div class="card-pane m-0">
          <?= Html::a('<i class="fas fa-shopping-cart"></i>', Url::to(['basket/add', 'id' => 3]), ['class' => 'btn btn-block text-center btn-blue']) ?>
      </div>
    </div>
  </div>
  <div class="col-6 col-sm-4 col-md-3 my-2">
    <div class="card-item bg-light box-shadow-blue">
      <?= Html::a(Html::img('/frontend/web/img/load/8.jpg', ['alt' => 'product name', 'class' => 'card-image']), ['/'], []) ?>

      <div class="card-label p-2">
          <div class="card-name">Pillow</div>
          <div class="card-price text-success">$40.00</div>
      </div>

      <div class="card-pane m-0">
          <?= Html::a('<i class="fas fa-shopping-cart"></i>', Url::to(['basket/add', 'id' => 3]), ['class' => 'btn btn-block text-center btn-blue']) ?>
      </div>
    </div>
  </div>
  <div class="col-6 col-sm-4 col-md-3 my-2">
    <div class="card-item bg-light box-shadow-blue">
      <?= Html::a(Html::img('/frontend/web/img/load/9.jpg', ['alt' => 'product name', 'class' => 'card-image']), ['/'], []) ?>

      <div class="card-label p-2">
          <div class="card-name">Pillow</div>
          <div class="card-price text-success">$40.00</div>
      </div>

      <div class="card-pane m-0">
          <?= Html::a('<i class="fas fa-shopping-cart"></i>', Url::to(['basket/add', 'id' => 3]), ['class' => 'btn btn-block text-center btn-blue']) ?>
      </div>
    </div>
  </div>
  <div class="col-6 col-sm-4 col-md-3 my-2">
    <div class="card-item bg-light box-shadow-blue">
      <?= Html::a(Html::img('/frontend/web/img/load/5.jpg', ['alt' => 'product name', 'class' => 'card-image']), ['/'], []) ?>

      <div class="card-label p-2">
          <div class="card-name">Pillow</div>
          <div class="card-price text-success">$40.00</div>
      </div>

      <div class="card-pane m-0">
          <?= Html::a('<i class="fas fa-shopping-cart"></i>', Url::to(['basket/add', 'id' => 3]), ['class' => 'btn btn-block text-center btn-blue']) ?>
      </div>
    </div>
  </div>
</div>
<?php Pjax::end()?>