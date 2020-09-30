<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "posttype".
 *
 * @property int $id
 * @property string $name
 *
 * @property Pricelist[] $pricelists
 */
class Posttype extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'posttype';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
			[['name'], 'unique'],
            [['name'], 'string', 'max' => 255],
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
     * Gets query for [[Pricelists]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPricelists()
    {
        return $this->hasMany(Pricelist::className(), ['posttype_id' => 'id']);
    }
}
