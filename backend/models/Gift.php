<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gift".
 *
 * @property int $id
 * @property int $product_id
 *
 * @property Product $product
 * @property Giftproduct[] $giftproducts
 */
class Gift extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gift';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id'], 'required'],
            [['product_id'], 'integer'],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'product_id' => Yii::t('app', 'Product ID'),
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
     * Gets query for [[Giftproducts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGiftproducts()
    {
        return $this->hasMany(Giftproduct::className(), ['gift_id' => 'id']);
    }
}
