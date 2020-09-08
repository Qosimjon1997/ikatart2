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
            [['oldpassword', 'newpassword','newpasswordconfirm'],'string', 'min'=>6],
            [['newpassword','newpasswordconfirm'], 'filter', 'filter'=>'trim'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'oldpassword' => Yii::t('app', 'Old Password'),
            'newpassword' => Yii::t('app', 'New Password'),
            'newpasswordconfirm' => Yii::t('app', 'Confirm New Password'),
        ];
    }

    public function valid($model) {
        if($this->validate()) {
            if($this->newpassword === $this->newpasswordconfirm) {
                if(Yii::$app->security->validatePassword($this->oldpassword, $model->password)){
                    $this->newpassword = Yii::$app->security->generatePasswordHash($this->newpassword);
                    return true;
                }
            }
        }
        return false;
    }
}
