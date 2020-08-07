<?php
namespace backend\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class PasswordReset extends Model
{
    public $oldpassword;
    public $password;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['oldpassword', 'password'], 'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'oldpassword' => Yii::t('app', 'oldpassword'),
            'password' => Yii::t('app', 'password'),
        ];
    }

    public function valid($oldmodel) {
        $this->password = Yii::$app->security->generatePasswordHash($this->password);

        if(Yii::$app->security->validatePassword($this->oldpassword, $oldmodel->password)){
            return true;
        }

        return false;
    }
}
