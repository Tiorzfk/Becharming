<?php
class Pegawai extends CActiveRecord {

	public static function model($className = __CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'pegawai';
	}

	public function rules() {
		return array( 
			array('nama ,alamat, telp', 'required',),
			array('telp','numerical','integerOnly'=>true,),
		);
	}

	public function attributeLabels() {
		return array(
			'nama' => 'Nama Pegawai', 
			'alamat'=>'Alamat Pegawai',
			'telp'=>'Telepon Pegawai',
		);
	}

}
?>
