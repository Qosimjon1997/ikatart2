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

    <?= $form->field($modelOrder, 'address_id')->dropDownList($addresses, ['prompt' => 'Address']) ?>
    <?= $form->field($modelCards, 'number')->dropDownList($cards, ['prompt' => 'Cards']) ?>
    

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>