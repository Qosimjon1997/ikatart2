<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property string $date
 * @property int $basket_id
 *
 * @property Delivery[] $deliveries
 * @property Basket $basket
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'basket_id'], 'required'],
            [['date'], 'safe'],
            [['basket_id'], 'integer'],
            [['basket_id'], 'exist', 'skipOnError' => true, 'targetClass' => Basket::className(), 'targetAttribute' => ['basket_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'date' => Yii::t('app', 'Date'),
            'basket_id' => Yii::t('app', 'Basket ID'),
            'basket.product.name' => Yii::t('app', 'Product'),
            'basket.count' => Yii::t('app', 'Count'),
            'basket.user.email' => Yii::t('app', 'Customer'),
            'basket.product.saler.email' => Yii::t('app', 'Saler'),
        ];
    }

    /**
     * Gets query for [[Deliveries]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDeliveries()
    {
        return $this->hasMany(Delivery::className(), ['order_id' => 'id']);
    }

    /**
     * Gets query for [[Basket]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBasket()
    {
        return $this->hasOne(Basket::className(), ['id' => 'basket_id']);
    }
}
