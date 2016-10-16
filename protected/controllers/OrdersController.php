<?php

class OrdersController extends Controller{

	public $layout='homepage';

	public function actionView($id){
		/*untuk cek login admin*/
		if(!isset(Yii::app()->user->adminLogin)){
            $this->redirect(array('admin/'));
        }
		/*panggil function loadModel() 
		 *dan ditampung ke $dataOrder*/
		$dataOrder = $this->loadModel($id);

		$upnoresi=Order::model()->findByPk($id);
		//jika data order dikirim(jika nomor resi dikirim)
		if(isset($_POST['Order'])){
		$upnoresi->attributes=$_POST['Order'];
		$upnoresi->no_resi = $_POST['Order']['no_resi'];
		$upnoresi->save();
		$this->redirect(array('order/view/'.$id));
		}
		/*find data confirmpayment berdasarkan order_code*/
		$dataConfirmPayment = Confirmpayment::model()->findByAttributes(array('order_code'=>$dataOrder->order_code));
		/*find data alamat pengiriman berdasarkan id_address*/
		$dataShippingAddress = Address::model()->findByPk($dataOrder->id_address);
		/*panggil model Orderdetail dan function search*/
		$model=new Orderdetail('search');
		/*clear any default values*/
		$model->unsetAttributes();  
		/*set select data order_detail berdasarkan order_code*/
		$model->order_code =$dataOrder->order_code;
		/*render ke file views/orders/view*/	
		$this->render('view',array(
			'upnoresi'=>$upnoresi,
			'model'=>$dataOrder,//data order
			'ordet'=>$model, //data order detail
			'dataPayment'=>$dataConfirmPayment,//data konfirmasi pembayaran
			'shippingAddress'=>$dataShippingAddress,//data alamat pengiriman
		));
	}

	/**
	 * list data order
	 */
	public function actionAdmin(){
		/*untuk cek login admin*/
		if(!isset(Yii::app()->user->adminLogin)){
            $this->redirect(array('admin/'));
        }
		/*panggil model order dan function search*/
		$model=new Order('search');
		/*clear semua default value attributes*/
		$model->unsetAttributes();
		/*jika data order dikirim
		 *sebagai kriteria pencarian*/
		if(isset($_GET['Order'])){
			/*set nilai attributes 
			 *untuk pencarian data order*/
			$model->attributes=$_GET['Order'];
		}
		/*render file views/orders/admin*/
		$this->render('admin',array(
			'model'=>$model,//data orders
		));
	}

	public function loadModel($id){
		/*untuk cek login admin*/
		if(!isset(Yii::app()->user->adminLogin)){
            $this->redirect(array('admin/'));
        }
		/*findbyPk data order*/
		$model=Order::model()->findByPk($id);
		/*jika datanya tidak ada maka
		 *alihkan ke error 404*/
		if($model===null){
			throw new CHttpException(404,'The requested page does not exist.');
		}
		/*kembalikan nilai ke $model*/
		return $model;
	}
}