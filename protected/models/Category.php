<?php
class Category extends CActiveRecord {

	public static function model($className = __CLASS__) {
		return parent::model($className);
	}
	/*tentukan tabel yang akan digunakan (
	 *model ini menggunakan tabel category)*/
	public function tableName() {
		return 'tb_category';
	}
	
	/*set masing-masing rule pada tiap field 
	 *yang ada pada tabel category*/
	public function rules() {
		return array( 
		 	array('name_category', 'required'), 
			array('name_category', 'length', 'max' => 555), 
			array('id_category, name_category', 'safe', 'on' => 'search'), 
		);
	}
	
	/*set label 
	 *untuk masing-masing attribute atau field*/
	public function attributeLabels() {
		return array(
			'id_category' => 'ID', 
			'name_category' => 'Category Name', 
		);
	}

	/*untuk search data category*/
	public function search() {
		$criteria = new CDbCriteria;
		$criteria -> compare('id_category', $this -> id_category);
		$criteria -> compare('name_category', $this -> name_category, true);
		return new CActiveDataProvider($this, array('criteria' => $criteria, ));
	}
}
?>