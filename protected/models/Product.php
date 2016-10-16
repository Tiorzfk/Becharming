<?php
class Product extends CActiveRecord{
	/*untuk menampung format harga produk 
	 *yg akan dikonvert ke bentuk mata uang*/
	public $price_product;
	
	public static function model($className=__CLASS__){
		return parent::model($className);
	}

	/*kembalikan ke tabel product 
	 *(maksudnya model ini akan menggunakan tabel product)*/
	public function tableName(){
		return 'tb_product';
	}
	/*ini digunakan untuk memformat mata uang produk
	 *yang akan ditampilkan*/
	protected function afterFind(){
		parent::afterFind();
		$this->price_product=number_format($this->price,0,',','.');
		return TRUE;       
	}
	
	/*ini digunakan untuk mreplace tanda titik(.) yang ada di mata uang
	 *seperti (100.000) menjadi (100000)*/
	protected function beforeSave(){
		parent::afterFind();
		$this->price = str_replace('.','',$this->price);
		return TRUE;       
	}

	/*ini digunakan untuk rules dari masing-masing field 
	 *yang ada pada tabel product*/
	public function rules(){
		return array(
			array('name_product, id_category, price,description', 'required'),
			array('id_category, price', 'numerical', 'integerOnly'=>true),
			array('name_product', 'length', 'max'=>555),
		);
	}
	public function primaryKey(){return array('id_image');}
	public function relations(){
		parent::relations();
		return array(
			/*merelasikan ketabel category*/
			'category'=>array(self::BELONGS_TO,'Category','id_category'),
			'image'=>array(self::MANY_MANY,'Image','tb_product(id_image, id_image)','together' => true),
        	
		);

	}

	/*set attributes*/
	public function attributeLabels(){
		return array(
			'id_product' => 'ID',
			'name_product' => 'Name Product',
			'id_category' => 'Category',
			'price' => 'Price',
		);
	}


}
?>