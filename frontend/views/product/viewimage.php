<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

?>

<img src="/backend/web/upimages/<?php echo $modelimage->path?>" alt="rasm">
<?php
    foreach ($modelcarusel as $variable) {
        # code...
        echo $variable->name;
    }

?>