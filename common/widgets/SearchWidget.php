<?php

namespace common\widgets;
use yii\base\Widget;

class SearchWidget extends Widget {
   

    public function init() {
        parent::init();
       
    }

    public function run() {
        return $this->render('search');
    }
}

?>