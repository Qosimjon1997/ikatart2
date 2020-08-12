<?php


namespace backend\models;
use Yii;
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

        $path = Yii::getAlias('@backend') . '/web/upimages';
        $name = null;
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        if ($this->validate()) {
            $name = Yii::$app->security->generateRandomString(10) . '.' . $this->imageFile->extension ;
            $this->imageFile->saveAs(Yii::getAlias('@backend') . '/web/upimages/' . $name);
        }
        return $name;
    }
}