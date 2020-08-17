<?php


namespace frontend\models;

use Yii;
use backend\models\Saler;
use yii\base\Model;

class SalerResendVerificationEmailForm extends Model
{
    /**
     * @var string
     */
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
                'filter' => ['status' => Saler::STATUS_INACTIVE],
                'message' => 'There is no saler with this email address.'
            ],
        ];
    }

    /**
     * Sends confirmation email to user
     *
     * @return bool whether the email was sent
     */
    public function sendEmail()
    {
        $saler = Saler::findOne([
            'email' => $this->email,
            'status' => Saler::STATUS_INACTIVE
        ]);

        if ($saler === null) {
            return false;
        }

        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $saler, 'isUser' => 0, 'isSaler' => 1]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
}
