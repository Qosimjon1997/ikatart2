<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use backend\models\User;

/**
 * Login form
 */
class UserResetpassForm extends Model
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
            [['oldpassword', 'newpassword','newpasswordconfirm'],'string', 'min'=>8],
            [['newpassword','newpasswordconfirm'], 'filter', 'filter'=>'trim'],
        ];
    }

    public function valid($model) {
        if($this->validate()) {
            if($this->newpassword === $this->newpasswordconfirm && strlen($this->newpassword) > 7) {
                if(Yii::$app->security->validatePassword($this->oldpassword, $model->password)){
                    $this->newpassword = Yii::$app->security->generatePasswordHash($this->newpassword);
                    return true;
                }
            }
        }
        return false;
    }
}
