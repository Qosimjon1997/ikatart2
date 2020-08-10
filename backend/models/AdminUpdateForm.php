<?php
namespace backend\models;

use Yii;
use yii\base\Model;

/**
 * Admin Login form
 */
class AdminUpdateForm extends Model
{
    public $oldpassword;
    public $password1;
    public $password2;

    private $_admin;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['oldpassword', 'password1', 'password2'], 'required'],
            // password is validated by validatePassword()
            ['oldpassword', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $admin = $this->getAdmin();
            if (!$admin || !$admin->validatePassword($this->oldpassword)) {
                $this->addError($attribute, 'Password ERROR!!!!');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->admin->login($this->getAdmin(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        }

        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getAdmin()
    {
        if ($this->_admin === null) {
            $this->_admin = Admin::findIdentity(Yii::$app->admin->id);
        }

        return $this->_admin;
    }
}
