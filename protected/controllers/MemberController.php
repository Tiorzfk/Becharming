<?php

class MemberController extends Controller{
	 
	public $layout='homepage';

	/*untuk find data by pk*/
	public function loadModel($id){
		$model=Customer::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	public function actionAdmin() {

		if(!isset(Yii::app()->user->adminLogin)){
            $this->redirect(array('admin/'));
        }
		/*panggil model order dan function search*/
		$model=new Customer('search');
		/*clear semua default value attributes*/
		$model->unsetAttributes();
		/*jika data order dikirim
		 *sebagai kriteria pencarian*/
		if(isset($_GET['Customer'])){
			/*set nilai attributes 
			 *untuk pencarian data order*/
			$model->attributes=$_GET['Customer'];
		}
		/*render file views/orders/admin*/
		$this->render('admin',array(
			'model'=>$model,//data orders
		));
		}
	/*untuk delete category*/
	public function actionDelete($id){
		if (Yii::app() -> request -> isAjaxRequest) {
			$this->loadModel($id)->delete();
			$this->redirect(array('admin'));
			if (!isset($_GET['ajax']))
				$this -> redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
	}

}
?>