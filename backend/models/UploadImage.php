<?php


namespace backend\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadImage extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    
    public function upload()
    {
        $path=null;
        if ($this->validate()) {
            $path=Yii::$app->security->generateRandomString(10) . $this->imageFile->extension ;
            $this->imageFile->saveAs(Yii::getAlias('@backend') . '/web/upimages/' . $path);
           
        } 
        return $path;
    }
}