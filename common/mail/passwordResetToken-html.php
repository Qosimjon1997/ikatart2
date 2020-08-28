<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink;
if($isSaler == 1) {
	$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['saler/reset-password', 'token' => $user->password_reset_token]);
}

if($isUser == 1) {
	$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['user/reset-password', 'token' => $user->password_reset_token]);
}
?>
<div class="password-reset">
    <p><?= Yii::t('app', 'Hello') . Html::encode($user->email) ?>,</p>

    <p><?= Yii::t('app', 'Follow the link below to reset your password') ?>:</p>

    <p><?= Html::a(Html::encode($resetLink), $resetLink) ?></p>
</div>
