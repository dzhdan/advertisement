<?php

class Mailer {

    const REGISTRATION_SUBJECT = 'Registration confirmation';
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


/*        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "ssl";
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465;
        $mail->Username = "sekret47@gmail.com"; // мой личный почтовый ящик на gmail
        $mail->Password = "sekret_soul"; // пароль от моего ящика*/

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