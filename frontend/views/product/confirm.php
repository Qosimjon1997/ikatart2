<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Address;
use backend\models\Cards;
use backend\models\Cardtype;
use backend\models\Country;
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
  <!-- Yangi karta qo'shish -->
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
        	<!-- <label data-error="wrong" data-success="right" for="defaultForm-email">Number</label> -->
          <!-- <input type="email" id="defaultForm-email" class="form-control validate"> -->
          <?= $form->field($newCard, 'number')->textInput([
              'autofocus' => true,
              'class' => 'form-control validate',
              'placeholder' => Yii::t('app', 'Number') ])?>
        </div>

        <div class="md-form col-12 p-3 col-md-6">
        <!-- <label data-error="wrong" data-success="right" for="defaultForm-email">Expiration date</label> -->
        <!-- <input id="defaultForm-pass" class="form-control validate"> -->
          <?= $form->field($newCard, 'expirationdate')->textInput([
              'autofocus' => true,
              'class' => 'form-control validate',
              'placeholder' => Yii::t('app', 'Expiration date') ])?>
        </div>

        <div class="md-form col-12 p-3 col-md-6">
        <!-- <label data-error="wrong" data-success="right" for="defaultForm-pass">CVV</label> -->
      	<!-- <input type="password" style="width: 100px;" id="defaultForm-pass" class="form-control validate"> -->
          <?= $form->field($newCard, 'cvv')->textInput([
              'autofocus' => true,
              'class' => 'form-control validate',
              'placeholder' => Yii::t('app', 'CVV') ])?>
        </div>

        <div class="md-form col-12  p-3 col-md-6" style="width: 400px; display: inline-block;">
        <!-- <label data-error="wrong" data-success="right" for="defaultForm-pass">Holder</label> -->
          <!-- <input  id="defaultForm-pass" class="form-control validate"> -->
          <?= $form->field($newCard, 'holder')->textInput([
              'autofocus' => true,
              'class' => 'form-control validate',
              'placeholder' => Yii::t('app', 'Holder') ])?>
        </div>
      </div>
      
      <div class="modal-footer d-flex justify-content-center">
        <?= Html::submitButton(Yii::t('app', 'Save2'), ['class' => 'btn btn-success','name'=>'submit','value'=>'btnCard']) ?>
      </div>
      <div class="md-form col-12  p-3 col-md-6" style="width: 400px; display: inline-block;">
        <!-- <label data-error="wrong" data-success="right" for="defaultForm-pass">Type of Card</label> -->
          <!-- <input  id="defaultForm-pass" class="form-control validate"> -->
          <?= $form->field($newCard, 'cardtype_id')->dropDownList(ArrayHelper::map(Cardtype::find()->all(),'id','name'),['prompt'=>'Type of card']) ?>
        </div>
      </div>

      

    </div>
  </div>
</div>


<div class="text-center">
  <a href="" class="" data-toggle="modal" data-target="#modalLoginForm1">Add new Address</a>
</div>

<?= $form->field($modelOrder, 'address_id')->dropDownList($addresses, ['prompt' => 'Address']) ?>
<!-- Yangi address qo'shish -->
  <div class="modal fade"  id="modalLoginForm1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      
      <div class="modal-content m-auto" style="width: 700px; left: -100px">
        <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">New Address</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body mx-3 row">
        <div class="md-form col-12 p-3 col-md-6 m-auto">
        	<!-- <label data-error="wrong" data-success="right" for="defaultForm-email">Adress</label> -->
         	<!-- <input type="email" id="defaultForm-email" class="form-control validate"> -->
           <?= $form->field($newAddress, 'address')->textInput([
              'class' => 'form-control validate',
              'placeholder' => Yii::t('app', 'Address') ])?>
        </div>

        <div class="md-form col-12 p-3 col-md-6">
        	<!-- <label data-error="wrong" data-success="right" for="defaultForm-pass">Country</label> -->
          	<!-- <input id="defaultForm-pass" class="form-control validate"> -->
            <?= $form->field($newAddress, 'country_id')->dropDownList(ArrayHelper::map(Country::find()->all(),'id','name'),['prompt'=>'Name of Country']) ?>
        </div>

      </div>

      <div class="modal-footer d-flex justify-content-center">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success','name'=>'submit','value'=>'btnAddress']) ?>
      </div>

    </div>
  </div>

  
</div>

<div class="text-center">
  <a href="" class="" data-toggle="modal" data-target="#modalLoginForm">Add new Card</a>
</div>
    <?= $form->field($modelCards, 'number')->dropDownList($cards, ['prompt' => 'Cards']) ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success','name'=>'submit','value'=>'btnConf']) ?>
    </div>

    <?php ActiveForm::end(); ?>