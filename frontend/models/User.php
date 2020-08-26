<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $auth_key
 * @property string $password
 * @property string|null $password_reset_token
 * @property string $email
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property string|null $verification_token
 * @property string $firstname
 * @property string $secondname
 * @property int $zipcode
 * @property string|null $phone
 *
 * @property Address[] $addresses
 * @property Basket[] $baskets
 * @property Cards[] $cards
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['auth_key', 'password', 'email', 'created_at', 'updated_at', 'firstname', 'secondname', 'zipcode'], 'required'],
            [['status', 'created_at', 'updated_at', 'zipcode'], 'integer'],
            [['auth_key'], 'string', 'max' => 32],
            [['password', 'password_reset_token', 'email', 'verification_token', 'firstname', 'secondname'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 45],
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
            'auth_key' => Yii::t('app', 'Auth Key'),
            'password' => Yii::t('app', 'Password'),
            'password_reset_token' => Yii::t('app', 'Password Reset Token'),
            'email' => Yii::t('app', 'Email'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'verification_token' => Yii::t('app', 'Verification Token'),
            'firstname' => Yii::t('app', 'Firstname'),
            'secondname' => Yii::t('app', 'Secondname'),
            'zipcode' => Yii::t('app', 'Zipcode'),
            'phone' => Yii::t('app', 'Phone'),
        ];
    }

    /**
     * Gets query for [[Addresses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAddresses()
    {
        return $this->hasMany(Address::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Baskets]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBaskets()
    {
        return $this->hasMany(Basket::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Cards]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCards()
    {
        return $this->hasMany(Cards::className(), ['user_id' => 'id']);
    }
}
