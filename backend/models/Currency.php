<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "currency".
 *
 * @property int $id
 * @property float $koeficent
 * @property string $shortname
 * @property string $name
 */
class Currency extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'currency';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['koeficent', 'shortname', 'name'], 'required'],
            [['koeficent'], 'number'],
            [['shortname'], 'string', 'max' => 6],
            [['name'], 'string', 'max' => 45],
            [['name'], 'unique'],
            [['shortname'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'koeficent' => Yii::t('app', 'Koeficent'),
            'shortname' => Yii::t('app', 'Shortname'),
            'name' => Yii::t('app', 'Name'),
        ];
    }
}
