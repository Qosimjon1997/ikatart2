<?php
use yii\helpers\Html;
use yii\helpers\Url;
use backend\assets\SidebarAsset;

SidebarAsset::register($this);
?>
<!-- <div class="sidebar-header">
    <h3></h3>
</div> -->
<div class="sidebar">
    <ul class="list-unstyled components list">
        <?php
        foreach($items as $item) {
            echo '<li class="item">';
            echo Html::a('<i class="'. $item['icon'] .'" aria-hidden="true"></i>&nbsp'.$item['label'], Url::to([$item['url'], 'params' => json_encode($item['params'])]));
            echo '</li>';
        }

        ?>
    </ul>
</div>