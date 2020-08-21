<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

?>

<!-- <img src="/backend/web/upimages/<?php echo $modelimage->path?>" alt="rasm"> -->
<?php foreach ($modelcarusel as $key1) {
            # code...
            echo "<h2>";
            echo $key1->name;
            echo "<ul>";
            // foreach ($key1->images as $func) { 
                $amg = $key1->images[0]
                ?>
                
                <img src="/backend/web/upimages/<?php echo $amg->path?>" alt="rasm">
            <?php
            // }
            echo "</ul>";
            echo "<h2>";
        }

?>