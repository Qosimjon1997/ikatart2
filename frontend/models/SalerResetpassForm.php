<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use backend\models\Saler;

/**
 * Login form
 */
class SalerResetpassForm extends Model
{
    public $oldpassword;
    public $newpassword;
    public $newpasswordconfirm;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['newpassword','oldpassword','newpaswwordconfirm'],'required'],
            [['oldpassword'],'validateCurrentPassword'],

            [['newpassword','newpasswordconfirm'],'string', 'min'=>8],
            [['newpassword','newpasswordconfirm'], 'filter', 'filter'=>'trim'],
            [['newpasswordconfirm'],'compare','compareAttribute'=>'newpassword','message'=>'Password do not match'],
        ];
    }

    public function validateCurrentPassword()
    {
        if(!$this->verifyPassword($this->oldpassword))
        {
            $this->addError('oldpassword','Current password incorrect');
        }
    }

    public function setpass()
    {
        if($this->validate())
        {
            $model->oldpassword=$model->newPassword;
            $model->save(false);
        }
    }

    public function verifyPassword($password)
    {
        $dbpassword = static::findOne(['id'=>Yii::$app->saler->identity->id])->password_hash;
        return Yii::$app->security->validatePassword($password, $dbpassword);
    }
}
