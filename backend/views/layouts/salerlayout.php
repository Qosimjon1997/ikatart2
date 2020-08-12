<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;

?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= Html::encode($this->title) ?></title>

</head>
<body>


<div class="wrap">
    <div class="container">
        <?= $content ?>
    </div>
</div>

<footer class="footer">

</footer>
</body>
</html>

