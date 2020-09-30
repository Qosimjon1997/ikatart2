<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "cardtype".
 *
 * @property int $id
 * @property string $name
 *
 * @property Cards[] $cards
 */
class Cardtype extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cardtype';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['id'], 'integer'],
            [['name'], 'string', 'max' => 45],
            [['id', 'name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
        ];
    }

    /**
     * Gets query for [[Cards]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCards()
    {
        return $this->hasMany(Cards::className(), ['cardtype_id' => 'id']);
    }
}
