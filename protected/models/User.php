<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id_user
 * @property string $mail
 * @property string $password
 * @property string $checksum
 * @property string $first_name
 * @property string $last_name
 * @property string $nick_name
 * @property string $last_time
 * @property string $last_ip
 * @property string $active
 *
 * The followings are the available model relations:
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nick_name', 'required'),
			array('mail, first_name, last_name, nick_name', 'length', 'max'=>50),
			array('password', 'length', 'max'=>40),
			array('checksum', 'length', 'max'=>100),
			array('last_ip', 'length', 'max'=>16),
			array('active', 'length', 'max'=>4),
			array('last_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_user, mail, password, checksum, first_name, last_name, nick_name, last_time, last_ip, active', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_user' => 'Id User',
			'mail' => 'Mail',
			'password' => 'Password',
			'checksum' => 'Checksum',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'nick_name' => 'Nick Name',
			'last_time' => 'Last Time',
			'last_ip' => 'Last Ip',
			'active' => 'Active',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('mail',$this->mail,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('checksum',$this->checksum,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('nick_name',$this->nick_name,true);
		$criteria->compare('last_time',$this->last_time,true);
		$criteria->compare('last_ip',$this->last_ip,true);
		$criteria->compare('active',$this->active,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}