<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "pricelist".
 *
 * @property int $id
 * @property int $price
 * @property int $mass_id
 * @property int $posttype_id
 * @property int $zone_id
 *
 * @property Mass $mass
 * @property Posttype $posttype
 * @property Zone $zone
 */
class Pricelist extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pricelist';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['price', 'mass_id', 'posttype_id', 'zone_id'], 'required'],
            [['price', 'mass_id', 'posttype_id', 'zone_id'], 'integer'],
            [['mass_id'], 'exist', 'skipOnError' => true, 'targetClass' => Mass::className(), 'targetAttribute' => ['mass_id' => 'id']],
            [['posttype_id'], 'exist', 'skipOnError' => true, 'targetClass' => Posttype::className(), 'targetAttribute' => ['posttype_id' => 'id']],
            [['zone_id'], 'exist', 'skipOnError' => true, 'targetClass' => Zone::className(), 'targetAttribute' => ['zone_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'price' => Yii::t('app', 'Price'),
            'mass_id' => Yii::t('app', 'Mass ID'),
            'posttype_id' => Yii::t('app', 'Posttype ID'),
            'zone_id' => Yii::t('app', 'Zone ID'),
        ];
    }

    /**
     * Gets query for [[Mass]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMass()
    {
        return $this->hasOne(Mass::className(), ['id' => 'mass_id']);
    }

    /**
     * Gets query for [[Posttype]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPosttype()
    {
        return $this->hasOne(Posttype::className(), ['id' => 'posttype_id']);
    }

    /**
     * Gets query for [[Zone]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getZone()
    {
        return $this->hasOne(Zone::className(), ['id' => 'zone_id']);
    }
}
