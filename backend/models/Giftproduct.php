<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "giftproduct".
 *
 * @property int $id
 * @property int $gift_id
 * @property int $product_id
 *
 * @property Gift $gift
 * @property Product $product
 */
class Giftproduct extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'giftproduct';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gift_id', 'product_id'], 'required'],
            [['gift_id', 'product_id'], 'integer'],
            [['gift_id'], 'exist', 'skipOnError' => true, 'targetClass' => Gift::className(), 'targetAttribute' => ['gift_id' => 'id']],
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
            'gift_id' => Yii::t('app', 'Gift ID'),
            'product_id' => Yii::t('app', 'Product ID'),
        ];
    }

    /**
     * Gets query for [[Gift]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGift()
    {
        return $this->hasOne(Gift::className(), ['id' => 'gift_id']);
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
}
