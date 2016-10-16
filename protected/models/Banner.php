<?php

class Banner extends CActiveRecord{

	public static function model($className=__CLASS__){
		return parent::model($className);
	}

	public function tableName(){
		return 'tb_banner';
	}
	
	public function rules(){
		return array(
			array('banner', 'file', 'types'=>'jpg, gif, png','allowEmpty'=>true,'on'=>'insert'),
			array('title','required'),
		);
	}

	/*set attributes*/
	public function attributeLabels(){
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'banner' => 'Banner',
		);
	}
}