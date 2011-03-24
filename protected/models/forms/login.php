<?php

/**
 * This is the model class for form "login".
 *
 * The followings are the available columns in table 'opinions':
 * @property string $login
 * @property string $password
 */
class login extends CFormModel
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Opinions the static model class
	 */
    public $login='';
    public $password='';
    
    public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
 

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(  
            array('login', 'required','message'=>'Вы не указали свой логин'),
            array('password', 'required','message'=>'Вы не указали свой пароль'),
           
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
	   
		return array(
			'login' => 'Ваш логин',
			'password' => 'Ваш пароль',
		);
	}
    public function save(){ 
        $identity=new UserIdentity($this->login,$this->password);
        $identity->authenticate();
        
        switch($identity->errorCode)
        {
            case UserIdentity::ERROR_NONE:
                Yii::app()->user->login($identity);
               return true;
            break;
            case UserIdentity::ERROR_PASSWORD_INVALID:
               $this->addError('password','Вы неверно указали свой пароль');
            break;
             case UserIdentity::ERROR_USERNAME_INVALID:
               $this->addError('login','Вы неверно указали свой логин');
            break;
           default:
                $this->addError('password','Неизвестная ошибка входа');
            break;
        }
        
    }
    
}