<?php
namespace backend\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class LoginWorkers extends Model
{
    public $id;
    public $username;
    public $password;
    public $oldpassword;
    public $rememberMe = true;

    private $_workers;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            ['id','integer'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            ['oldpassword', 'string'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
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
            $user = $this->getWorkers();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
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
            return Yii::$app->workers->login($this->getWorkers(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        }

        return false;
    }

    public function register()
    {
        $model = new Workers();
        $model->username = strtolower($this->username);
        $model->setPassword($this->password);
        if($model->save())
        {
            $this->id = $model->id;
            return true;
        }
        return false;
    }


    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getWorkers()
    {
        if ($this->_workers === null) {
            $this->_workers = Workers::findByUsername($this->username);
        }

        return $this->_workers;
    }
}
