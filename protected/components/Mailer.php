<?php

class Mailer extends CComponent
{

    const REGISTRATION_SUBJECT = 'Registration confirmation';

    private $_hostName;
    private $_from;

    public function __construct()
    {
        $this->_hostName = preg_replace('#^https?://#', " ", Yii::app()->getBaseUrl(true));
        $this->_from = Yii::app()->params->mailer['from'];
    }

    public function registrationMail($to, $activationCode)
    {
        $activationLink = CHtml::link($activationCode, Yii::app()->getBaseUrl(true));
        $mail = new YiiMailer('registration',
            [
                'activationLink' => $activationLink,
            ]
        );

        $mail->setFrom(Yii::app()->params['adminEmail'], $this->_hostName);
        $mail->setTo($to);
        $mail->setSubject(self::REGISTRATION_SUBJECT);

        if (!$mail->send()) {
            echo 'Message could not be sent.';
            echo $mail->getError();
            exit;
        }
    }


}