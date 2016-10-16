<?php
/*class untuk keranjang belanja*/
class Cart extends CActiveRecord{
	public static function model($className=__CLASS__){
		return parent::model($className);
	}

	//tentukan tabel yang digunakan
	public function tableName(){
		return 'tb_cart';
	}

	/*ini digunakan untuk memformat mata uang produk
	 *yang akan ditampilkan*/
	
	public function rules(){
		
		return array(
			array('id_product, qty, cart_code', 'required'),
			array('id_product, qty', 'numerical', 'integerOnly'=>true),
			array('cart_code', 'length', 'max'=>555),
			
		);
	}

	/**
	 * @return array relational rules.
	 */


	public function relations(){
		 
		return array(

		);
	}
	
}