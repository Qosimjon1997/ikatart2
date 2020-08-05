<?php

namespace common\widgets;
use yii\base\Widget;

class SidebarWidget extends Widget {
    public $header;
    public $items;
    
    public function init() {
        parent::init();
        if(!$this->header) {
            $this->header = "Sidebar";
        }
    }

    public function run() {
        $params = [
            'header' => $this->header,
            'items' => $this->items,
        ];
        return $this->render('sidebar', $params);
    }
}

?>