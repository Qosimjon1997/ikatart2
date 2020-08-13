<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "duration".
 *
 * @property int $id
 * @property int $day
 * @property int $zone_id
 * @property int $posttype_id
 *
 * @property Posttype $posttype
 * @property Zone $zone
 */
class Duration extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'duration';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['day', 'zone_id', 'posttype_id'], 'required'],
            [['day', 'zone_id', 'posttype_id'], 'integer'],
            [['posttype_id'], 'exist', 'skipOnError' => true, 'targetClass' => Posttype::className(), 'targetAttribute' => ['posttype_id' => 'id']],
            [['zone_id'], 'exist', 'skipOnError' => true, 'targetClass' => Zone::className(), 'targetAttribute' => ['zone_id' => 'id']],
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
            'zone_id' => Yii::t('app', 'Zone ID'),
            'posttype_id' => Yii::t('app', 'Posttype ID'),
            'zone.zone' => Yii::t('app', 'Zone'),
            'posttype.name' => Yii::t('app', 'Post Type'),
        ];
    }

    /**
     * Gets query for [[Posttype]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPosttype()
    {
        return $this->hasOne(Posttype::className(), ['id' => 'posttype_id']);
    }

    /**
     * Gets query for [[Zone]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getZone()
    {
        return $this->hasOne(Zone::className(), ['id' => 'zone_id']);
    }
}
