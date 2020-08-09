<?php

namespace backend\models;

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
    public $names = [];
    public $info = [];
    public $languages;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'language';
    }

    public function init() {
        parent::init();
        $this->languages = self::find()->asArray()->all();
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

    public function getNameLanguages($name = null) {
        foreach ($this->languages as $lang) {

            $this->names[$lang['shortname']] = null;
            if($name) {
                foreach ($name as $n) {

                    if($n->language->shortname == $lang['shortname']){
                        $this->names[$lang['shortname']] = $n->name;
                    }
                }
            }
        }
    }

    public function getInfoLanguages($infos = null) {
        foreach ($this->languages as $lang) {

            $this->info[$lang['shortname']] = null;
            if($infos){
                foreach ($infos as $info) {

                    if($info->language->shortname == $lang['shortname']){
                        $this->info[$lang['shortname']] = $info->name;
                    }
                }
            }
        }
    }
}
