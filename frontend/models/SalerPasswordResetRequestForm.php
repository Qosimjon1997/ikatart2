<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use backend\models\Saler;

/**
 * Password reset request form
 */
class SalerPasswordResetRequestForm extends Model
{
    public $email;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'exist',
                'targetClass' => '\backend\models\Saler',
                'filter' => ['status' => Saler::STATUS_ACTIVE],
                'message' => 'There is no saler with this email address.'
            ],
        ];
    }

    /**
     * Sends an email with a link, for resetting the password.
     *
     * @return bool whether the email was send
     */
    public function sendEmail()
    {
        $saler = Saler::findOne([
            'status' => Saler::STATUS_ACTIVE,
            'email' => strtolower($this->email),
        ]);

        if (!$saler) {
            return false;
        }

        if (!Saler::isPasswordResetTokenValid($saler->password_reset_token)) {
            $saler->generatePasswordResetToken();
            if (!$saler->save()) {
                return false;
            }
        }

        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'passwordResetToken-html', 'text' => 'passwordResetToken-text'],
                ['user' => $saler, 'isUser' => 0, 'isSaler' => 1],
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name])
            ->setTo($this->email)
            ->setSubject('Password reset for ' . Yii::$app->name)
            ->send();
    }
}
