<?php

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
<?= Yii::t('app', 'Hello') . $user->email ?>,

<?= Yii::t('app', 'Follow the link below to reset your password') ?>:

<?= $resetLink ?>
