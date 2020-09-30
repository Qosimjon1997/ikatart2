<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mass".
 *
 * @property int $id
 * @property int $mass
 *
 * @property Pricelist[] $pricelists
 * @property Product[] $products
 */
class Mass extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mass';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mass'], 'required'],
            [['mass'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'mass' => Yii::t('app', 'Mass'),
        ];
    }

    /**
     * Gets query for [[Pricelists]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPricelists()
    {
        return $this->hasMany(Pricelist::className(), ['mass_id' => 'id']);
    }
}
