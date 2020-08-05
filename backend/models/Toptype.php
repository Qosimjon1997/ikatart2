<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "toptype".
 *
 * @property int $id
 * @property int $day
 * @property int $price
 *
 * @property Topproduct[] $topproducts
 */
class Toptype extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'toptype';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['day', 'price'], 'required'],
            [['day', 'price'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'day' => Yii::t('app', 'Day'),
            'price' => Yii::t('app', 'Price'),
        ];
    }

    /**
     * Gets query for [[Topproducts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTopproducts()
    {
        return $this->hasMany(Topproduct::className(), ['toptype_id' => 'id']);
    }
}
