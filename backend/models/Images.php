<?php

namespace backend\models;

use yii\web\UploadedFile;
use Yii;


/**
 * This is the model class for table "images".
 *
 * @property int $id
 * @property string $path
 * @property int $main
 * @property int|null $product_id
 * @property int|null $advert_id
 * @property int|null $saler_id
 *
 * @property Advert $advert
 * @property Product $product
 * @property Saler $saler
 */
class Images extends \yii\db\ActiveRecord
{
    public $imageFile;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'images';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['path', 'main'], 'required'],
            [['main', 'product_id', 'advert_id', 'saler_id'], 'integer'],
            [['path'], 'string', 'max' => 255],
            [['advert_id'], 'exist', 'skipOnError' => true, 'targetClass' => Advert::className(), 'targetAttribute' => ['advert_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
            [['saler_id'], 'exist', 'skipOnError' => true, 'targetClass' => Saler::className(), 'targetAttribute' => ['saler_id' => 'id']],
        ];
    }





    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'path' => Yii::t('app', 'Path'),
            'main' => Yii::t('app', 'Main'),
            'product_id' => Yii::t('app', 'Product ID'),
            'advert_id' => Yii::t('app', 'Advert ID'),
            'saler_id' => Yii::t('app', 'Saler ID'),
        ];
    }

    /**
     * Gets query for [[Advert]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAdvert()
    {
        return $this->hasOne(Advert::className(), ['id' => 'advert_id']);
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }

    /**
     * Gets query for [[Saler]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSaler()
    {
        return $this->hasOne(Saler::className(), ['id' => 'saler_id']);
    }
}
