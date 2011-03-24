<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    private $_id;
    private $_role;
    private $_mail;
    /**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
	    $criteria=new CDbCriteria;
        $criteria->select='*';  
        $criteria->condition='active=:active AND (mail=:mail OR nick_name=:nick_name)';
        $criteria->params=array(':active'=>'yes',':mail'=>$this->username,':nick_name'=>$this->username);
        $criteria->limit='1';

		$user=User::model()->find($criteria);
         
        if(!$user)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		else if($user->password!==md5($this->password))
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
        else{
            
		    $this->_id=$user->id;
            $this->username=$user->nick_name;
            $this->_mail=$user->mail;
            
            $this->_role=$user->role;
            $auth=Yii::app()->authManager;
            if(!$auth->isAssigned($this->_role,$this->_id)){
                if($auth->assign($this->_role,$this->_id)){
                    Yii::app()->authManager->save();
                }
            } 
		  $this->errorCode=self::ERROR_NONE;
		}
			
		return $this->errorCode==self::ERROR_NONE;
	}
    public function getId()
    {
        return $this->_id;
    }
}