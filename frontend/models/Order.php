<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property string $date
 * @property int $basket_id
 * @property int $totalcost
 * @property int $isActive
 * @property int $address_id
 * @property string $zipcode
 *
 * @property Address $address
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
            [['date', 'basket_id', 'totalcost', 'address_id', 'zipcode'], 'required'],
            [['date'], 'safe'],
            [['basket_id', 'totalcost', 'isActive', 'address_id'], 'integer'],
            [['zipcode'], 'string', 'max' => 45],
            [['address_id'], 'exist', 'skipOnError' => true, 'targetClass' => Address::className(), 'targetAttribute' => ['address_id' => 'id']],
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
            'totalcost' => Yii::t('app', 'Totalcost'),
            'isActive' => Yii::t('app', 'Is Active'),
            'address_id' => Yii::t('app', 'Address ID'),
            'zipcode' => Yii::t('app', 'Zipcode'),
        ];
    }

    /**
     * Gets query for [[Address]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAddress()
    {
        return $this->hasOne(Address::className(), ['id' => 'address_id']);
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
