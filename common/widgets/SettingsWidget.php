<?php

namespace common\widgets;
use yii\base\Widget;

class SettingsWidget extends Widget {
   

    public function init() {
        parent::init();
       
    }

    public function run() {
        return $this->render('settings');
    }
}

?>