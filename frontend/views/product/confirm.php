<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Address;
use backend\models\Cards;
use yii\helpers\ArrayHelper;

$addresses = [];
$cards = [];

foreach($address as $ad) {
    $addresses[$ad->id] = $ad->address . ', ' . $ad->country->name;
}

foreach($card as $ad) {
    $cards[$ad->id] = $ad->number . ', ' . $ad->holder;
}

?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
	<!-- Button trigger modal modal fade -->
<div class="modal fade"  id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content m-auto" style="width: 700px; left: -100px">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">New Cart</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3 row">
        <div class="md-form col-12 p-3 col-md-6 m-auto">
        	<label data-error="wrong" data-success="right" for="defaultForm-email">Number</label>
         	<input type="email" id="defaultForm-email" class="form-control validate">
        </div>

        <div class="md-form col-12 p-3 col-md-6">
        	<label data-error="wrong" data-success="right" for="defaultForm-pass">Expiretint</label>
          	<input type="password" id="defaultForm-pass" class="form-control validate">
        </div>
        <div class="md-form col-12 p-3 col-md-6">
        	<label data-error="wrong" data-success="right" for="defaultForm-pass">CVV</label>
          	<input type="password" style="width: 100px;" id="defaultForm-pass" class="form-control validate">
        </div>
        <div class="md-form col-12  p-3 col-md-6" style="width: 400px; display: inline-block;">
        	<label data-error="wrong" data-success="right" for="defaultForm-pass">Holder</label>
          	<input type="password" id="defaultForm-pass" class="form-control validate">
        </div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-default">Save</button>
      </div>
    </div>
  </div>
</div>

<div class="text-center">
  <a href="" class="" data-toggle="modal" data-target="#modalLoginForm">Link</a>
</div>
    <?= $form->field($modelOrder, 'address_id')->dropDownList($addresses, ['prompt' => 'Address']) ?>
    <div class="modal fade"  id="modalLoginForm1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content m-auto" style="width: 700px; left: -100px">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">New Cart</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3 row">
        <div class="md-form col-12 p-3 col-md-6 m-auto">
        	<label data-error="wrong" data-success="right" for="defaultForm-email">Adress</label>
         	<input type="email" id="defaultForm-email" class="form-control validate">
        </div>

        <div class="md-form col-12 p-3 col-md-6">
        	<label data-error="wrong" data-success="right" for="defaultForm-pass">Country</label>
          	<input type="password" id="defaultForm-pass" class="form-control validate">
        </div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-default">Save</button>
      </div>
    </div>
  </div>
</div>

<div class="text-center">
  <a href="" class="" data-toggle="modal" data-target="#modalLoginForm1">Adress</a>
</div>
    <?= $form->field($modelCards, 'number')->dropDownList($cards, ['prompt' => 'Cards']) ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>