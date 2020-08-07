<?php
use yii\helpers\Html;
use yii\helpers\Url;

?>
<!-- <div class="sidebar-header">
    <h3><?= $header ?></h3>
</div> -->
<div class="sidebar">
    <ul class="list-unstyled components list">
        <li class="item sidebar-header">
            <a><h4><?= $header ?></h4></a>
        </li>
        <?php
        foreach($items as $item) {

            echo '<li class="item">';
            echo Html::a('<i class="'. $item['icon'] .'" aria-hidden="true"></i>&nbsp'.$item['label'], Url::to([$item['url'], 'params' => json_encode($item['params'])]));
            echo '</li>';
        }

        ?>
    </ul>
</div>