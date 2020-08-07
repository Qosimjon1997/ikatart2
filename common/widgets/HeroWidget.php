<?php

namespace common\widgets;
use yii\base\Widget;

class HeroWidget extends Widget {
   

    public function init() {
        parent::init();
       
    }

    public function run() {
        return $this->render('hero');
    }
}

?>