<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<!-- <div class="sidebar-header">
    <h3></h3>
</div> -->
<div class="sidebar">
    <ul class="list-unstyled components list">
        <?php
        foreach($items as $item) {
            echo '<li class="item">';
            echo Html::a('<i class="'. $item['icon'] .'" aria-hidden="true"></i>&nbsp'.$item['label'], Url::to(Yii::$app->request->baseUrl.'/'.$item['url'], true));
            echo '</li>';
        }

        ?>
        <!-- <li>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="#">Page 1</a>
                </li>
                <li>
                    <a href="#">Page 2</a>
                </li>
                <li>
                    <a href="#">Page 3</a>
                </li>
            </ul>
        </li> -->

    </ul>
</div>