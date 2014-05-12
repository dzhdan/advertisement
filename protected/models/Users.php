<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $role
 * @property integer $last_activity
 * @property integer $activation_status
 * @property integer $activation_key
 * @property integer $deleted
 *
 */
class Users extends CActiveRecord
{
    public $passwordRepeat;
    public $verifyCode;
    public $captcha;

    //30*60
    const LAST_ACTIVITY_TIME = 1800;

    const ROLE_USER = 'user';

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'users';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return [
            ['deleted', 'numerical', 'integerOnly' => true],
            ['name, email, password, role', 'length', 'max' => 255],

            ['id, name, email, password, role', 'safe', 'on' => 'search'],

            ['verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements(), 'on'=>'registration'],
            ['name, password, passwordRepeat, email', 'required','on'=>'registration'],
            ['passwordRepeat', 'compare', 'compareAttribute'=>'password','on'=>'registration'],
            ['name, password, email, role', 'safe', 'on'=>'registration'],

        ];
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return [];
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
            'role' => 'Role',
            'deleted' => 'Deleted',
            'passwordRepeat' => 'Password repeat',
        ];
    }


    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        /*		$criteria->compare('name',$this->name,true);
                $criteria->compare('email',$this->email,true);
                $criteria->compare('password',$this->password,true);
                $criteria->compare('role',$this->role,true);
                $criteria->compare('online_status',$this->online_status);
                $criteria->compare('deleted',$this->deleted);*/

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function isUserOnline()
    {
        if($this->last_activity + self::LAST_ACTIVITY_TIME  > time()){
            return true;
        }
        return false;
    }

    public function registration($data)
    {

        $this->attributes = $data;
        $this->role = self::ROLE_USER;
        $this->activation_status = 0;
        $this->activation_key = sha1(mt_rand(10000, 99999) . time() . $this->email);

        if (!$this->validate() && !$this->save()) {
            return false;
        }

        $mail = new Mailer();
        $mail->registrationMail($this->email, $this->activation_key);

        return true;
    }

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function loadModel()
    {

    }

}
