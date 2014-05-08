<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class RegistrationForm extends CFormModel
{
    public $username;
    public $email;
    public $password;
    public $passwordRepeat;
    public $verifyCode;
    public $captcha;

    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules()
    {
        return [
            // username and password are required
            ['verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()],
            ['name, password, passwordRepeat, email', 'required'],
            ['passwordRepeat', 'compare', 'compareAttribute'=>'password'],
            ['name, password, email, role', 'safe'],
            array('email', 'unique', 'message' => 'Login name already exist', 'except' => 'remove'),
        ];
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels()
    {
        return array(
            'passwordRepeat' => 'Password repeat',
        );
    }

}
