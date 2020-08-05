<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "salarhistorylanguages".
 *
 * @property int $id
 * @property string $name
 * @property int $language_id
 * @property int $saler_id
 *
 * @property Language $language
 * @property Saler $saler
 */
class Salarhistorylanguages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'salarhistorylanguages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'language_id', 'saler_id'], 'required'],
            [['language_id', 'saler_id'], 'integer'],
            [['name'], 'string', 'max' => 45],
            [['language_id'], 'exist', 'skipOnError' => true, 'targetClass' => Language::className(), 'targetAttribute' => ['language_id' => 'id']],
            [['saler_id'], 'exist', 'skipOnError' => true, 'targetClass' => Saler::className(), 'targetAttribute' => ['saler_id' => 'id']],
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
            'language_id' => Yii::t('app', 'Language ID'),
            'saler_id' => Yii::t('app', 'Saler ID'),
        ];
    }

    /**
     * Gets query for [[Language]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLanguage()
    {
        return $this->hasOne(Language::className(), ['id' => 'language_id']);
    }

    /**
     * Gets query for [[Saler]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSaler()
    {
        return $this->hasOne(Saler::className(), ['id' => 'saler_id']);
    }
}
