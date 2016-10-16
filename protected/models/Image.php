<?php
class Image extends CActiveRecord{

	
	public static function model($className=__CLASS__){
		return parent::model($className);
	}

	public function tableName(){
		return 'tb_images';
	}

	/*relasi tabel*/
	public function relations(){
		return array(
			/*merelasikan ketabel category*/
			
		);
	}
	public function primaryKey(){return array('id_image');}
	
	public function rules()
	{
	return array(
		
		);
	}

	/*set attributes*/
	public function attributeLabels(){
		return array(
			'id_image' => 'ID',
			'filename' => 'File Name',
		);
	}

}
?>