<?php
class AccountController extends Controller {
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout = 'store';

	/**
	 * @return array action filters
	 */
	public function filters() {
		return array('accessControl', // perform access control for CRUD operations
		);
	}

	public function actionIndex() {
		if (!isset(Yii::app() -> user -> customerLogin)) {
			$model = new CustomerLoginForm;
			// jika ajax maka divalidasi dengan ajax
			if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
				/*tampilkan hasil validasi form*/
				echo CActiveForm::validate($model);
				/*end/exit/die*/
				Yii::app() -> end();
			}

			// ambil data yang diinput oleh user
			if (isset($_POST['CustomerLoginForm'])) {
				$model -> attributes = $_POST['CustomerLoginForm'];
				/*validaasi data yang diinput oleh user dan
				 *jika valid maka ...
				 */
				if ($model -> validate() && $model -> login()) {
					/*redirect ke halaman yang diinginkan
					 **/
					/*setFlash */
					$this -> redirect(array('./'));
				}
			}
			// untuk daftar
			$modelcos = new Customer;

			if (isset($_POST['Customer'])) {
			$modelcos -> attributes = $_POST['Customer'];
				if($modelcos -> save()){
					Yii::app()->user->setFlash('success', "Berhasil Membuat Akun Silahkan Login!"); 
					$this->redirect(array('account/'));
				}
			}
			$this -> render("login", array('model' => $model,'modelcos'=>$modelcos));
		} else {
			
			$this -> render("index");
		}
	}
	public function actionOngkir(){
		$IdmoreRO = new Idmore();
if(isset($_GET['act'])):
	switch ($_GET['act']) {
		case 'showprovince':
		$province = $IdmoreRO->showProvince();
		echo $province;
		break;
		case 'showcity':
		$idprovince = $_GET['province'];
		$city = $IdmoreRO->showCity($idprovince);
		echo $city;
		break;
		case 'showresult':
		$idprovince = $_GET['province'];
		$idcity = $_GET['id'];
		$result = $IdmoreRO->showResult($idprovince,$idcity);
		echo $result;
		break;
		case 'cost':
		$origin = $_GET['origin'];
		$destination = $_GET['destination'];
		$weight = $_GET['weight'];
		$courier = $_GET['courier'];
		$cost = $IdmoreRO->hitungOngkir($origin,$destination,$weight,$courier);
		//parse json
		$costarray = json_decode($cost);
		$results = $costarray->rajaongkir->results;
		if(!empty($results)):
			foreach($results as $r):
				foreach($r->costs as $rc):
					foreach($rc->cost as $rcc):
						echo "<tr><td>$r->code</td><td>$rc->service</td><td>$rc->description</td><td>$rcc->etd</td><td>".number_format($rcc->value)."</td><td><input onclick='totalOngkir()' type='radio' id='pilihpaket' name='pilihpaket' value='$rcc->value'></td></tr>";
					endforeach;
				endforeach;
			endforeach;
		endif;
//end of parse json
		break;

	}
	endif;
	}
	public function actionOrders($id = '') {
		 if(!isset(Yii::app()->user->customerLogin)){
            $this->redirect(array('account/'));
        }
		/*untuk konfirmasi pembayaran*/
		if(isset($_GET['confirm'])){
			/*panggil model Confirmpayment*/
			$model = new Confirmpayment;
			/*jika data Confirmpayment dikirim dengan method POST*/
			if(isset($_POST['Confirmpayment'])){
				/*set value field*/	
				$order_code = $_POST['Confirmpayment']['nomerPemesanan'];
				$model->attributes = $_POST['Confirmpayment'];
				$model->order_code = $_POST['Confirmpayment']['nomerPemesanan'];
				$model->text_detail .= $_POST['Confirmpayment']['bankAsal'].'#';
				$model->text_detail .= $_POST['Confirmpayment']['pemilikRekAsal'].'#';
				$model->text_detail .= $_POST['Confirmpayment']['bankTujuan'].'#';
				$model->text_detail .=$_POST['Confirmpayment']['nominalTransfer'];
				/*jika data confirmpayment disimpan*/
				if($model->save()){
					/*find data order by attributes berdasarkan order code*/	
					$modelOrder = Order::model()->findByAttributes(array('order_code'=>$order_code));
					/*set field payment_status menjadi 1 
					 *yg artinya telah pembayaran telah dikonfirmasi*/
					$modelOrder->payment_status =1;
					/*simpan perubahan*/
					$modelOrder->save();
					/*setFlash untuk informasi sukses konfirmasi pesanan*/
					Yii::app()->user->setFlash('success', "Pesanan anda dengan nomor pemesanan #".$order_code." telah berhasil dikonfirmasi, Tunggu hingga kami konfirmasi pembayaran anda, dan kami akan memberikan no resi di detail pesanan anda!"); 
					/*direct ke halaman orders*/
					$this->redirect(array('orders'));
					return;
				}
			}
			/*render ke file account/confirmasi_payment*/
			$this->render('confirm_payment',array('model'=>$model));
			return;
		}
		
		/*untuk halaman list data pesanan*/
		if (empty($id)) {
			/*panggil model Order dan function search*/ 
			$model = new Order('search');
			// hapus default values pada attributes
			$model -> unsetAttributes();
			$model -> customer_id = Yii::app() -> user -> customerId;
			/*jika data order dikirim view get*/
			if (isset($_GET['Order'])){
				/*set attributes untuk pencarian*/
				$model -> attributes = $_GET['Order'];
			}
			/*render ke file account/list_orders*/
			$this -> render('list_orders', array('model' => $model, ));
			return;
		}
		
		/*untuk detail order*/
		if (!empty($id)) {
			/*join query untuk mendapatkan detail order*/
			$dataOrderDetail = Yii::app()->db->createCommand()
				->select('tb_orders.*,tb_orderdetail.*,tb_product.*')
				->from('tb_orders')
				->join('tb_orderdetail','tb_orderdetail.order_id = tb_orders.id')
				->join('tb_product','tb_product.id_product = tb_orderdetail.product_id')
				->where('tb_orders.id=:id_order',array(':id_order'=>$id))
				->queryAll();
			/*join query untuk mendapatkan data order 
			 *dan customer/pelanggan*/
			$dataOrder = Yii::app()->db->createCommand()
				->select('tb_orders.*,tb_customer.customer_name')
				->from('tb_orders')
				->join('tb_customer','tb_orders.customer_id = tb_customer.customer_id')
				->where('tb_orders.id=:id_order',array(':id_order'=>$id))
				->queryRow();
			/*render ke file account/detail_order*/	 
			$this->render('detail_order',array(
					'dataOrder'=>$dataOrder,
					'orderDetail'=>$dataOrderDetail,
					'subtotal'=>'',
					'grandtotal'=>'',
				)
			);
			return;
		}
	}
	
	
	/*untuk address book pelanggan*/
	public function actionAddressbook() {
		/*cek user login*/	
		 if(!isset(Yii::app()->user->customerLogin)){
            $this->redirect(array('account/'));
        }
		/*jika add data address book*/
		if (isset($_GET['add'])) {
			$model = new Address;
			/*jika post addressbook*/
			if (isset($_POST['Address'])) {
				/*set attributes address book*/
				$model -> attributes = $_POST['Address'];
				/*ambil customer id*/
				$model -> customer_id = Yii::app() -> user -> customerId;
				/*ambil address nama*/
				$addressName = $_POST['Address']['name'];
				/*jika berhasil menyimpan data*/
				if ($model -> save()) {
					/*buat setflash*/
					Yii::app() -> user -> setFlash('success', 'Address book baru dengan nama <b>' . $addressName . '</b> berhasil ditambahkan');
					/*direct ke halaman addressbook awal*/
					$this -> redirect(array('account/addressbook'));
				}
			}
			/*render ke view form add addressbook dengan nama(add_addressbook.php)*/
			$this -> render('add_addressbook', array('model' => $model, ));
			return;
		}
		/*jika edit address book*/
		if (isset($_GET['edit'])) {
			/*ambil data addressbook berdasarkan pk*/
			$model = Address::model() -> findByPk($_GET['edit']);
			/*jika post Address*/
			if (isset($_POST['Address'])) {
				/*ambil nilai attributes nya*/
				$model -> attributes = $_POST['Address'];
				/*ambil customer id*/
				$model -> customer_id = Yii::app() -> user -> customerId;
				/*ambil address name*/
				$addressName = $_POST['Address']['name'];
				/*jika berhasil menyimpan data*/
				if ($model -> save()) {
					/*buat Setflash*/
					Yii::app() -> user -> setFlash('success', 'Address book dengan nama <b>' . $addressName . '</b>  berhasil dirubah');
					/*direct ke halaman address book awal*/
					$this -> redirect(array('account/addressbook'));
				}
			}
			/*render ke view form edit address book dengan nama(add_addressbook.php)*/
			$this -> render('add_addressbook', array('model' => $model, ));
			return;
		}
		
		/*untuk menampilkan list data address book*/
		$model = Address::model() -> findAll('customer_id=:customer_id', array(':customer_id' => Yii::app() -> user -> customerId));
		/*render ke view addressbook*/
		$this -> render('addressbook', array('model' => $model, ));
	}

	/**
	 * Log out, dan akan didirect ke halaman homepage.
	 */
	public function actionLogout() {
		/*logout user*/
		Yii::app() -> user -> clearStates();
		/*direct ke halaman yang diinginkan*/
		$this -> redirect(array('./'));
	}

	public function actionChangepassword() {
		/*untuk cek apakah user telah login atau belum*/
		 if(!isset(Yii::app()->user->customerLogin)){
            $this->redirect(array('account/'));
        }
		/*findbyPK data user yang login*/
		$model = CustomerChangePassword::model() -> findByPk(Yii::app() -> user -> customerId);
		/*jika POST maka
		 *ubahpassword*/
		if (isset($_POST['CustomerChangePassword'])) {
			$model -> setAttributes($_POST['CustomerChangePassword']);
			$model -> password = $_POST['CustomerChangePassword']['newPassword'];
			/*jika changepassword maka direct ke halaman success*/
			if ($model -> save()) {
				$this -> redirect(array('changepasswordsuccess'));
			}
		}
		/*render ke view ubah password*/
		$this -> render('changepassword', array('model' => $model));
	}

	public function actionChangepasswordsuccess() {
		/*untuk cek apakah user telah login atau belum*/
		 if(!isset(Yii::app()->user->customerLogin)){
            $this->redirect(array('account/'));
        }
		/*untuk setflash berhasil ubah password*/
		Yii::app() -> user -> setFlash('success', 'Password anda berhasil dirubah dengan passwod yang baru');
		/*render ke file view*/
		$this -> render('changePasswordSuccess');
	}

	public function actionInfo() {
		 if(!isset(Yii::app()->user->customerLogin)){
            $this->redirect(array('account/'));
        }
		$this -> render('info');
	}


	/**
	 * Manages all models.
	 */
	public function actionAdmin() {
		if(!isset(Yii::app()->user->adminLogin)){
            $this->redirect(array('admin/'));
        }
		$model = new Customer('search');
		$model -> unsetAttributes();
		// clear any default values
		if (isset($_GET['Customer']))
			$model -> attributes = $_GET['Customer'];

		$this -> render('admin', array('model' => $model, ));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id) {
		$model = Customer::model() -> findByPk($id);
		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($modelcos) {
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'customer-form') {
			echo CActiveForm::validate($modelcos);
			Yii::app() -> end();
		}
	}

}
