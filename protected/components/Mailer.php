<?php

class Mailer {

    const REGISTRATION_SUBJECT = 'Here is the subject';
    const REGISTRATION_BODY = 'This is the HTML message body <b>in bold!</b>';

    private $_hostName;
    private $_from;

    public function __construct()
    {
        $this->_hostName = preg_replace('#^https?://#'," ", Yii::app()->getBaseUrl(true));
        $this->_from = Yii::app()->params->mailer['from'];
    }

    public function registrationMail($to, $activationCode)
    {
        $activationLink = CHtml::link($activationCode, Yii::app()->getBaseUrl(true));
        $mail = new PHPMailer();

        $mail->From = $this->_from;
        $mail->FromName = $this->_hostName;
        $mail->addAddress($to);

        $mail->isHTML(true);

        $mail->Subject = self::REGISTRATION_SUBJECT;
        $mail->Body = "This is the HTML message body <b>in bold!</b>  $activationLink
        dwdcwdwdc";
//Todo activation link
        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
            exit;
        }
    }

    public function sendMail()
    {

    }
}