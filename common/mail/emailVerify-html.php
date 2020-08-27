<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

$verifyLink;
if($isSaler == 1) {
	$verifyLink = Yii::$app->urlManager->createAbsoluteUrl(['saler/verify-email', 'token' => $user->verification_token]);
}

if($isUser == 1) {
	$verifyLink = Yii::$app->urlManager->createAbsoluteUrl(['user/verify-email', 'token' => $user->verification_token]);
}
?>

<div class="verify-email">
    <p><?= Yii::('app', 'Hello') . Html::encode($user->email) ?>,</p>

    <p><?= Yii::('app', 'Follow the link below to verify your email') ?>:</p>

    <p><?= Html::a(Html::encode($verifyLink), $verifyLink) ?></p>
</div>
