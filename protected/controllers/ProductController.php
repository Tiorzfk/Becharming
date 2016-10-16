<?php
class ProductController extends YiishopController {

	public $layout = "homepage";

	const URLUPLOAD = '/../images/products/';

	/**
	 * Manages all models.
	 */

	/*untuk create product*/
	public function actionCarts(){
		$this->layout=null;
    $count='SELECT COUNT(fruit_id) as id,jeniskelamin as aa FROM fruit GROUP BY jeniskelamin';
    $dataProvider=new CSqlDataProvider($count,array('totalitemcount'=>(int) $count,'keyField'=>'fruit_id'));

        return $this->render('carts',array('dataProvider'=>$dataProvider));
    }
	public function actionCreate() {
		if(!isset(Yii::app()->user->adminLogin)){
            $this->redirect(array('admin/'));
        }
		/*panggil model product*/
		$model = new Hproduct;
		$this->performAjaxValidation($model);

		$filemodel=new Image; 

		/* untuk menyimpan image_id di tabel image */
		$id_image = Image::model() -> findAll();
		if(!empty($id_image)){
			foreach ($id_image as $id){
				$image_id=$id->id_image+1;
			}
		}else{
			$image_id="1";
		}
		//untuk set id image di tb_produk dan tb_image(biar sama)
		$idmage=$this -> orderCode();
		/*jika data dikirim*/
		if (isset($_POST['Hproduct'])) {
			/*set attributes product*/
			$model -> attributes = $_POST['Hproduct'];
			/*jika data product disimpan*/
			$model -> date = date('Y-m-d');

			$model -> id_image = $idmage;

			if ($model -> save()) {

				$images = CUploadedFile::getInstancesByName('images');
				if (isset($images) && count($images) > 0) {
                   
					if(!is_dir(Yii::app()->basePath . self::URLUPLOAD . '/' . $model->id_product)){
                        mkdir(Yii::app()->basePath . self::URLUPLOAD . '/' . $model->id_product);
                    }
					/*simpan ke tabel image*/
					foreach($images as $photo=>$pic){   
						$pic-> saveAs(Yii::app()->basePath . self::URLUPLOAD . '/' . $model->id_product.'/'.$pic -> name . '');                                      
                		/*$filename="{$fileimage[$image]}";*/ 
                		$filemodel->setIsNewRecord(true);                    
                		$filemodel -> filename = $pic->name;
                		$filemodel -> id_image = $idmage;
                	
                		// check model validation
                		$filemodel->save();                           
                		                                               
            		}    
            	}                         
            	
				/*direct ke halaman product/review*/
				$this->redirect(array('admin'));
			}
		}
		/*tampilkan form create produk*/
		$this -> render('create', 
				array('model' => $model,'fileimage'=>$filemodel,'image_id'=>$image_id
			)
		);
	}
	public function actionUpdate($id) {
		if(!isset(Yii::app()->user->adminLogin)){
            $this->redirect(array('admin/'));
        }

		/*find produk by pk*/
		$model = $this -> loadModel2($id);
		$filemodel = new Image();

		$this->performAjaxValidation(array($model,$filemodel));
		
        //mengambil id_image dari tb_produk
        $image_id=$model->id_image;

		/*jika data perubahan dikirim*/
		if (isset($_POST['Hproduct'])) {

			$model -> attributes = $_POST['Hproduct'];

			/*cek file / gambar produk*/
			$images= CUploadedFile::getInstancesByName('images');
			/*jika file ada*/
			if (isset($images) && count($images) > 0) {

				$dir=Yii::app()->basePath . '/../images/products/'.$model->id_product;

				/* Menampilkan image berdasarkan id_produk, dan menghapusnya*/
				$sql2 = "SELECT id_product,filename FROM tb_images LEFT OUTER JOIN tb_product on tb_product.id_image=tb_images.id_image WHERE tb_product.id_image='$image_id'";
                /*digunakan untuk mengkoneksikan ke databse*/
                $conncection = Yii::app() -> db;
                /*membuat command/query*/
                $command2 = $conncection -> createCommand($sql2);
                /*membaca query dan akan dapat di tampilkan semua
                 datanya*/
                $image = $command2 -> queryAll();
				/* hapus image sebelumnya */
				foreach($image as $i=>$delimage){
				unlink( $dir.'/'. $delimage['filename']);
				}	

				//Delete Image sebelum upload image baru
				$sql = "DELETE FROM tb_images WHERE id_image='$image_id'";
				$connection = Yii::app() -> db;
				$command = $connection -> createCommand($sql);
				/*eksekusi query atau execute non query*/
				$command -> execute();


				/*simpan ke tabel image*/
				foreach($images as $photo=>$pic){   
					$pic-> saveAs(Yii::app()->basePath . self::URLUPLOAD . '/' . $model->id_product.'/'.$pic -> name . '');                                      
               		/*$filename="{$fileimage[$image]}";*/ 
               		
               		$filemodel->setIsNewRecord(true);                    
               		$filemodel -> filename = $pic->name;
               		$filemodel -> id_image = $image_id;
               	
               		// check model validation
               		$filemodel->save();                         
                }   
            }
				/*simpan perubahan data*/
			if ($model -> save()) {
				/*direct ke product/view*/
				$this -> redirect(array('admin'));
			}
		}
		/*render form update product*/
		$this -> render('update', 
				array('model' => $model,'filemodel' => $filemodel,'image_id' => $image_id
			)
		);
	}
	protected function performAjaxValidation($model) {
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'product-form') {
			echo CActiveForm::validate($model);
			Yii::app() -> end();
		}
	}
	public function actionDelete($id) {
		if(!isset(Yii::app()->user->adminLogin)){
            $this->redirect(array('admin/'));
        }

				$model = $this -> loadModel2($id);
				$image_id=$model->id_image;
	
				$dir=Yii::app()->basePath . '/../images/products/'.$model->id_product;
				/*tampilkan image berdasarkan id_produk untuk dihapus*/
				$sql = "SELECT id_product,filename FROM tb_images LEFT OUTER JOIN tb_product on tb_product.id_image=tb_images.id_image WHERE tb_product.id_image='$image_id'";
        		/*digunakan untuk mengkoneksikan ke databse*/
        		$conncection = Yii::app() -> db;
        		/*membuat command/query*/
        		$command = $conncection -> createCommand($sql);
        		/*membaca query dan akan dapat di tampilkan semua
        		 datanya*/
        		$image = $command -> queryAll();
        		
        		foreach ($image as $i=>$delimage) {
        			unlink($dir.'/'. $delimage['filename']);	
        		}	
				rmdir(Yii::app()->basePath . self::URLUPLOAD . '/' . $model->id_product);
				/* untuk mendelete image perdasarkan id_product*/
				$sql = "DELETE FROM tb_images WHERE id_image='$image_id'";
				$connection = Yii::app() -> db;
				$command = $connection -> createCommand($sql);
				/*eksekusi query atau execute non query*/
				$command -> execute();
	
				$this->loadModel2($id)->delete();
					// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
				$this -> redirect(array('admin'));
			
		
		
	}
	public function loadModel2($id) {
		$model = Hproduct::model() -> findByPk($id);
		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}

	public function loadModel($id) {
		$model = Product::model() -> find($id);
		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}

	public function actionAdmin() {
		if(!isset(Yii::app()->user->adminLogin)){
            $this->redirect(array('admin/'));
        }
		$this -> render('admin');
	}
	public function actionAdmintable() {
		if(!isset(Yii::app()->user->adminLogin)){
            $this->redirect(array('admin/'));
        }
		$this->layout = "null";
		
		$criteria = new CDbCriteria( array('order' => 'id_product DESC'));

		$model = Product::model() -> findAll($criteria);
		$this -> render('admin_table', array('model' => $model));
	}
	public function actionIndex(){
		$this -> layout = 'store';	
			/*Popular Product 1*/
			$popro = Yii::app()->db->createCommand()
			->select('tb_product.id_product,tb_product.price,tb_product.description,tb_product.name_product,tb_images.filename')
			->from('tb_images')
			->leftjoin('tb_product','tb_product.id_image = tb_images.id_image')
			->Group('tb_product.id_image')	
			->order('tb_product.view DESC')
			->limit('8')
			->queryAll();
			/*Random Product*/
			$randpro = Yii::app()->db->createCommand()
			->select('tb_product.id_product,tb_product.price,tb_product.description,tb_product.name_product,tb_images.filename')
			->from('tb_images')
			->leftjoin('tb_product','tb_product.id_image = tb_images.id_image')
			->Group('tb_product.id_image')	
			->order('RAND()')
			->queryAll();
			/*New Product*/
		$newpro = Yii::app()->db->createCommand()
		->select('tb_product.id_product,tb_product.price,tb_product.description,tb_product.name_product,tb_images.filename')
		->from('tb_images')
		->leftjoin('tb_product','tb_product.id_image = tb_images.id_image')
		->Group('tb_product.id_image')	
		->order('tb_product.date DESC')
		->limit('8')
		->queryAll();
		$this -> render('product',array('popro' =>$popro,'randpro'=>$randpro,'models' => $newpro));
	}
	public function actionall(){

		$this -> layout = "store";

		/*menyatakan criteria bahwa
		 *select data akan difilter berdasarkan
		 *categori_id dan diorder berdasarkan
		 *id DESC*/
		$criteria = new CDbCriteria( array('order' => 't.id_product DESC', 'group'=>'t.id_image'));

		/*hitung jumlah data produk*/
		$count = Product::model() -> count($criteria);

		/*panggil class paging*/
		$pages = new CPagination($count);

		/*tentukan jumlah nomer paging/page*/
		$pages -> pageSize = 12;

		/*terapkan limit page dan criteria*/
		$pages -> applyLimit($criteria);

		$models = Product::model()->with('image')->findAll($criteria);


		/*render ke file view all_product.php
		 *dengan membawa data dari $models, dan $pages*/
		$this -> render('all_product', array('models' => $models, 'pages' => $pages));
	}
	public function actionNewproduct(){
		$this->layout="null";
		/*New Product*/
		$newpro = Yii::app()->db->createCommand()
		->select('tb_product.id_product,tb_product.price,tb_product.description,tb_product.name_product,tb_images.filename')
		->from('tb_images')
		->leftjoin('tb_product','tb_product.id_image = tb_images.id_image')
		->Group('tb_product.id_image')	
		->order('tb_product.date DESC')
		->limit('8')
		->queryAll();
		$this -> render('new_product',array('models' => $newpro));
	}
	public function actionDetail($id) {
		/*gunakan layout store*/
		$this -> layout = 'store';
		//image1 (image yang besar)
		$image1 = Yii::app()->db->createCommand()
		->select('tb_product.id_product,tb_images.filename')
		->from('tb_images')
		->leftjoin('tb_product','tb_product.id_image = tb_images.id_image')
		->where('tb_product.id_product=:id_product LIMIT 1',array(':id_product'=>$id))
		->queryAll();
		//image2 (image yang kecil)
		$image2 = Yii::app()->db->createCommand()
		->select('tb_product.id_product,tb_images.filename')
		->from('tb_images')
		->leftjoin('tb_product','tb_product.id_image = tb_images.id_image')
		->where('tb_product.id_product=:id_product LIMIT 5',array(':id_product'=>$id))
		->queryAll();
		//Most View Produk
		$mostview = Yii::app()->db->createCommand()
		->select('tb_product.name_product,tb_product.price,tb_product.description,tb_product.id_product,tb_images.filename ')
		->from('tb_images')
		->leftjoin('tb_product','tb_product.id_image = tb_images.id_image')
		->Group('tb_product.id_image')
		->order('tb_product.view DESC')
		->limit(3)
		->queryAll();

		//New View Produk
		$newpro = Yii::app()->db->createCommand()
		->select('tb_product.name_product,tb_product.price,tb_product.description,tb_product.id_product,tb_images.filename ')
		->from('tb_images')
		->leftjoin('tb_product','tb_product.id_image = tb_images.id_image')
		->Group('tb_product.id_image')
		->order('tb_product.date')
		->queryAll();

		$data = Hproduct::model() -> cache(1000) -> findByPk($id);
		$view=$data->view;
		$data -> view = $view+1;
		$data->save();
		/*render ke file view.php dengan membawa
		 *data yang ditampung $model*/
		$this -> render('detail', array('image1' => $image1,'image2' => $image2,'data'=>$data,'mostview'=>$mostview,'newpro'=>$newpro));
	}
		/*untuk menampilkan cart/keranjang belanja*/
	public function actionCart() {

		$this->layout="null";

		$model = Yii::app()->db->createCommand()
		->select('tb_product.name_product,tb_product.price,tb_product.id_product,tb_images.filename,tb_cart.qty,tb_cart.id_cart ')
		->from('tb_cart')
		->leftjoin('tb_product','tb_product.id_product = tb_cart.id_product')
		->leftjoin('tb_images','tb_images.id_image = tb_product.id_image')
		->Group('tb_product.id_image')
		->queryAll();
	
		/*tampilkan cart*/
		$this -> render('cart',array('model'=>$model));
		
	}
	public function actionCategory($id){

		$this -> layout = "store";

		/*menyatakan criteria bahwa
		 *select data akan difilter berdasarkan
		 *categori_id dan diorder berdasarkan
		 *id DESC*/
		$criteria = new CDbCriteria( array('condition' => 't.id_category=' . $id,  'order' => 't.id_product DESC', 'group'=>'t.id_image'));

		/*hitung jumlah data produk*/
		$count = Product::model() -> count($criteria);

		/*panggil class paging*/
		$pages = new CPagination($count);

		/*tentukan jumlah nomer paging/page*/
		$pages -> pageSize = 5;

		/*terapkan limit page dan criteria*/
		$pages -> applyLimit($criteria);

		$models = Product::model()->with('image')->findAll($criteria);

		//breadcrumb
		foreach($models as $bc){
			if(empty($bc)){
			$bc=$bc->category->name_category;
			}
		}

		/*render ke file view category.php
		 *dengan membawa data dari $models, dan $pages*/
		$this -> render('category', array('models' => $models, 'pages' => $pages));

	
	}
	public function actionSearch(){
		/*gunakan layout store*/
		$this -> layout = 'store';
		if (isset($_POST['Search'])) {
			$keyword = $_POST['Search']['keyword'];
			$category = $_POST['Search']['category'];
			//$this->redirect(array('product/search','c'=>$category,'key'=>$key));

			//$criteria = new CDbCriteria( array('order' => 'id DESC', ));
			if ($category == 'all-categories' && empty($keyword)) {
				$this -> redirect(array('product/'));
			}
			if ($category != 'all-categories' && empty($keyword)) {
				$criteria = new CDbCriteria( array('order' => 't.id_product DESC', 'condition' => 't.id_category=' . $category . ''));
			}
			if ($category == 'all-categories' && !empty($keyword)) {
				$criteria = new CDbCriteria( array('order' => 't.id_product DESC', 'condition' => 't.name_product like"%' . trim($keyword) . '%"', ));
			}
			if ($category != 'all-categories' && !empty($keyword)) {
				$criteria = new CDbCriteria( array('order' => 't.id_product DESC', 'condition' => 't.id_category=' . $category . ' AND t.name_product like"%' . trim($keyword) . '%"', ));
			}

			/*count data product*/
			$count = Product::model() -> count($criteria);
			/*panggil class paging*/
			$pages = new CPagination($count);
			/*elements per page*/
			$pages -> pageSize = 5;
			/*terapkan limit page*/
			$pages -> applyLimit($criteria);

			/*select data product
			 *cache(1000) digunakan untuk men cache data,
			 * 1000 = 10menit*/
			$models = Product::model() -> cache(1000) -> with('image')->findAll($criteria);

			foreach($models as $bc){
			$bc=$bc->category->name_category;
			}
			
			$this -> render('category', array('models' => $models, 'pages' => $pages,'bc'=>$bc ));
		} else {
			$this -> redirect(array('product/'));
		}
	}
	public function actionRemovecart($id) {
		if (Yii::app() -> request -> isAjaxRequest) {
		/*delete by pk
		 *jika berhasil maka*/	
		if (Cart::model() -> cache(1000) -> deleteByPk($id)) {
			/*direct ke halaman cart*/				
			$this -> redirect(array("./"));
		} else {
			/*jika tidak tampilkan error 400*/
			throw new CHttpException(400, 'Invalid request ID. Please do not repeat this request again.');
		}
		}
	}
	/*untuk menambahkan product ke keranjang belanja*/
	public function actionAddtocart($id) {
		if (Yii::app() -> request -> isAjaxRequest) {
		/*gunakan layout store*/
		$this -> layout = 'store';

		/*panggil model Cart*/
		$model = new Cart;
		/*set data ke masing masing field*/
		/*product_id*/
		$_POST['Cart']['id_product'] = $id;
		/*qty*/
		$_POST['Cart']['qty'] = 1;
		/*cart_code*/
		$_POST['Cart']['cart_code'] = Yii::app()->session['cart_code'];
		/*set ke attribut2*/
		$model -> attributes = $_POST['Cart'];
		
		/*update qty-nya jika produk sudah ada di dalam keranjang belanja
		 *menjadi +1*/
		if ($this -> addQuantity($id, Yii::app()->session['cart_code'], 1)) {
			/*direct ke halaman cart*/	
			if (!isset($_GET['ajax']))
				$this -> redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('product/'));
		/*add ke keranjang belanja jika produk belum ada di keranjang*/	
		} elseif ($model -> save()) {
			/*direct ke halaman cart*/ 
			if (!isset($_GET['ajax']))
				$this -> redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('product/'));
		} else {
			/*produk tidak ada di dalam data product kasih error 404*/
			throw new CHttpException(404, 'The requested id invalid.');
		}
		}
		
	}
	
	/*function untuk update QTY produk di keranjang belanja*/
	private function addQuantity($id_product, $cart_code = '', $qty = '') {
		
			/*model Cart findBy attributes product_id dan cart_code*/
			$modelCart = Cart::model() -> findByAttributes(array('id_product' => $id_product, 'cart_code' => $cart_code));
			/*jika ada didalam keranjang belanja*/
			if (count($modelCart) > 0) {
				/*maka update qty nya*/
				$modelCart -> qty += $qty;
				/*simpan dan return true*/
				$modelCart -> save();
				return TRUE;
			} else {
				/*lain dari itu return false*/
				return FALSE;
			}
		
	}

}