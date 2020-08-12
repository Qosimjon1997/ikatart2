<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "topproduct".
 *
 * @property int $id
 * @property int $isActive
 * @property string $startdate
 * @property int $toptype_id
 * @property int $product_id
 *
 * @property Product $product
 * @property Toptype $toptype
 */
class Topproduct extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'topproduct';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['isActive', 'startdate', 'toptype_id', 'product_id'], 'required'],
            [['isActive', 'toptype_id', 'product_id'], 'integer'],
            [['startdate'], 'safe'],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
            [['toptype_id'], 'exist', 'skipOnError' => true, 'targetClass' => Toptype::className(), 'targetAttribute' => ['toptype_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'isActive' => Yii::t('app', 'Is Active'),
            'startdate' => Yii::t('app', 'Startdate'),
            'toptype_id' => Yii::t('app', 'Toptype ID'),
            'product_id' => Yii::t('app', 'Product ID'),
            'toptype.day' => Yii::t('app', 'Toptype'),
            'product.name' => Yii::t('app', 'Product'),
        ];
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
     * Gets query for [[Toptype]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getToptype()
    {
        return $this->hasOne(Toptype::className(), ['id' => 'toptype_id']);
    }
}
