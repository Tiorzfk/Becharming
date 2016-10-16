<?php
class Contact extends CActiveRecord{
	
		public $verifyCode;

	public static function model($className=__CLASS__){
		return parent::model($className);
	}
	
	public function tableName(){
		return 'tb_contact';
	}
	
	public function rules(){
		return array(
			array('name,email,phone,subject,message','required'),
			array('phone','numerical','integerOnly'=>TRUE),
			array('email','email'),
			array('name,email,phone,subject','safe','on'=>'search'),
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
		);
	}
	
	public function attributeLabels(){
		return array(
			'id_contact'=>'ID',
			'name'=>'Nama',
			'email'=>'Email',
			'phone'=>'Phone',
			'message'=>'Message',
			'subject'=>'Subject',
			'verifyCode'=>'Verification Code',
		);
	}
		/*untuk pencarian*/
	public function search(){
		/*panggil class CDbCriteria*/
		$criteria=new CDbCriteria;
		/*set attributes*/
		$criteria->compare('id',$this->id_contact);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('subject',$this->subject,true);
		
		/*kebalikan ke CActiveDataProvider*/
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}