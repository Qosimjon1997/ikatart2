<?php

namespace common\widgets;
use yii\base\Widget;

class ImageWidget extends Widget {

	public $images;

    public function init() {
        parent::init();
    }

    public function run() {
        return $this->render('image', ['images' => $this->images]);
    }
}

?>