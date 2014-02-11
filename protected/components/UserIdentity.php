<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
    private $_id;
    private $_role;
	public function authenticate()
	{
        $record = Users::model()->find('LOWER(name)=?', array(strtolower($this->username)));
        if($record === null){
            $this->errorCode= self::ERROR_USERNAME_INVALID;
        }
        elseif($record->password !==  $this->password){
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        }
        else{

            $this->setState('user_id', $record->id);
            $this->setState('email', $record->email);
            $this->setState('deleted', $record->deleted);
            $this->setState('role', $record->role);
            $this->errorCode=self::ERROR_NONE;

        }
        return !$this->errorCode;
	}

    public function getRole(){
        return $this->_id;
    }
}