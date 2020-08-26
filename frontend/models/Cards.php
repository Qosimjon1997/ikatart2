<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cards".
 *
 * @property int $id
 * @property int $number
 * @property int $expirationdate
 * @property int|null $Saler_id
 * @property int $cardtype_id
 * @property int|null $user_id
 *
 * @property Saler $saler
 * @property Cardtype $cardtype
 * @property User $user
 */
class Cards extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cards';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['number', 'expirationdate', 'cardtype_id'], 'required'],
            [['number', 'expirationdate', 'Saler_id', 'cardtype_id', 'user_id'], 'integer'],
            [['Saler_id'], 'exist', 'skipOnError' => true, 'targetClass' => Saler::className(), 'targetAttribute' => ['Saler_id' => 'id']],
            [['cardtype_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cardtype::className(), 'targetAttribute' => ['cardtype_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'number' => Yii::t('app', 'Number'),
            'expirationdate' => Yii::t('app', 'Expirationdate'),
            'Saler_id' => Yii::t('app', 'Saler ID'),
            'cardtype_id' => Yii::t('app', 'Cardtype ID'),
            'user_id' => Yii::t('app', 'User ID'),
        ];
    }

    /**
     * Gets query for [[Saler]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSaler()
    {
        return $this->hasOne(Saler::className(), ['id' => 'Saler_id']);
    }

    /**
     * Gets query for [[Cardtype]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCardtype()
    {
        return $this->hasOne(Cardtype::className(), ['id' => 'cardtype_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
