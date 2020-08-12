<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "saler".
 *
 * @property int $id
 * @property string|null $firstname
 * @property string|null $secondname
 * @property string|null $passport
 * @property string|null $inn
 * @property string $email
 * @property string $password
 * @property string|null $phone
 * @property string $auth_key
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property string|null $verification_token
 * @property string|null $password_reset_token
 *
 * @property Cards[] $cards
 * @property Images[] $images
 * @property Product[] $products
 * @property Salarhistorylanguages[] $salarhistorylanguages
 */
class Saler extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'saler';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'password', 'auth_key', 'status', 'created_at', 'updated_at'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['firstname', 'secondname', 'passport', 'inn', 'email', 'phone'], 'string', 'max' => 45],
            [['password', 'verification_token', 'password_reset_token'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'firstname' => Yii::t('app', 'Firstname'),
            'secondname' => Yii::t('app', 'Secondname'),
            'passport' => Yii::t('app', 'Passport'),
            'inn' => Yii::t('app', 'Inn'),
            'email' => Yii::t('app', 'Email'),
            'password' => Yii::t('app', 'Password'),
            'phone' => Yii::t('app', 'Phone'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'verification_token' => Yii::t('app', 'Verification Token'),
            'password_reset_token' => Yii::t('app', 'Password Reset Token'),
        ];
    }

    /**
     * Gets query for [[Cards]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCards()
    {
        return $this->hasMany(Cards::className(), ['Saler_id' => 'id']);
    }

    /**
     * Gets query for [[Images]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getImages()
    {
        return $this->hasMany(Images::className(), ['saler_id' => 'id']);
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['Saler_id' => 'id']);
    }

    /**
     * Gets query for [[Salarhistorylanguages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSalarhistorylanguages()
    {
        return $this->hasMany(Salarhistorylanguages::className(), ['saler_id' => 'id']);
    }
}
