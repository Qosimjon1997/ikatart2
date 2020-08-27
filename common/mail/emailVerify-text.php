<?php

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
<?= Yii::('app', 'Hello') . $user->email ?>,

<?= Yii::('app', 'Follow the link below to verify your email') ?>:

<?= $verifyLink ?>
