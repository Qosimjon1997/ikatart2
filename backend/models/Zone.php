<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "zone".
 *
 * @property int $id
 * @property int $zone
 *
 * @property Postcountry[] $postcountries
 * @property Pricelist[] $pricelists
 */
class Zone extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'zone';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['zone'], 'required'],
            [['zone'], 'integer'],
            [['zone'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'zone' => Yii::t('app', 'Zone'),
        ];
    }

    /**
     * Gets query for [[Postcountries]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPostcountries()
    {
        return $this->hasMany(Postcountry::className(), ['zone_id' => 'id']);
    }

    /**
     * Gets query for [[Pricelists]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPricelists()
    {
        return $this->hasMany(Pricelist::className(), ['zone_id' => 'id']);
    }
}
