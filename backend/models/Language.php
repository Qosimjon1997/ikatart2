<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "language".
 *
 * @property int $id
 * @property string $name
 * @property string $shortname
 *
 * @property Categorylanguages[] $categorylanguages
 * @property Productlanguages[] $productlanguages
 * @property Salarhistorylanguages[] $salarhistorylanguages
 */
class Language extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'language';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'shortname'], 'required'],
            [['name', 'shortname'], 'string', 'max' => 45],
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
            'shortname' => Yii::t('app', 'Shortname'),
        ];
    }

    /**
     * Gets query for [[Categorylanguages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategorylanguages()
    {
        return $this->hasMany(Categorylanguages::className(), ['language_id' => 'id']);
    }

    /**
     * Gets query for [[Productlanguages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductlanguages()
    {
        return $this->hasMany(Productlanguages::className(), ['language_id' => 'id']);
    }

    /**
     * Gets query for [[Salarhistorylanguages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSalarhistorylanguages()
    {
        return $this->hasMany(Salarhistorylanguages::className(), ['language_id' => 'id']);
    }
}
