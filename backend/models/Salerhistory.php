<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "salerhistory".
 *
 * @property int $id
 * @property string $info
 */
class Salerhistory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'salerhistory';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['info'], 'required'],
            [['info'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'info' => Yii::t('app', 'Info'),
        ];
    }
}
