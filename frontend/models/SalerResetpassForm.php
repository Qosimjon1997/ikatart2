<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use backend\models\Saler;

/**
 * Signup form
 */
class SalerResetpassForm extends Model
{
    public $oldpassword;
    public $password1;
    public $password2;

    private $_saler;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['password1','password2','oldpassword'], 'required'],
            ['password1', 'string', 'min' => 8],
            ['password2', 'string', 'min' => 8],
            ['oldpassword', 'validatePassword'],
        ];
    }
    
    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function check()
    {
        if ($this->validate() && $this->password1 == $this->password2) {

            $model = Saler::findIdentity(Yii::$app->saler->id);

            $model->password = Yii::$app->security->generatePasswordHash($password1);
            $model->save();
            return true;
        }
        
        return false;
    }


    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $saler = $this->getSaler();
            if (!$saler || !$saler->validatePassword($this->oldpassword)) {
                $this->addError($attribute, 'Incorrect password');
            }
        }
    }


    protected function getSaler()
    {
        if ($this->_saler === null) {
            $this->_saler = Saler::findIdentity(Yii::$app->saler->id);
        }

        return $this->_saler;
    }

    
}
