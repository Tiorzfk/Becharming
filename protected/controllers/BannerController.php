<?php
class BannerController extends Controller {

	public $layout = "homepage";

	const URLUPLOAD = '/../images/banner/';


	public function actionCreate(){
		if(!isset(Yii::app()->user->adminLogin)){
            $this->redirect(array('admin/'));
        }
		$model = new Banner;
		$this->performAjaxValidation($model);

		if (isset($_POST['Banner'])) {

			$cekfile = $model -> banner = CUploadedFile::getInstance($model, 'banner');

			$model -> attributes = $_POST['Banner'];

			$model -> banner = CUploadedFile::getInstance($model, 'banner');

			$model -> date = date('Y-m-d');

			if ($model -> save()) {
				/*jika file ada*/
				if (!empty($cekfile)) {
					/*set value field image dengan nama gambar
					 *dan upload gambar ke folder images/products*/
					$model -> banner -> saveAs(Yii::app() -> basePath . self::URLUPLOAD . $model -> banner . '');
				}
			$this->redirect(array('admin'));
			}
		}
		$this -> render('create', 
				array('model' => $model, 
			)
		);
	}
	/*untuk update produk*/
	public function actionUpdate($id) {
		
		/*find produk by pk*/
		$model = $this -> loadModel($id);
		/*ambil gambar*/
		$image = $model -> banner;
		/*jika data perubahan dikirim*/
		if (isset($_POST['Banner'])) {
			/*cek file / gambar produk*/
			$cekfile = $model -> banner = CUploadedFile::getInstance($model, 'banner');
			/*jika file tidak ada*/
			if (empty($cekfile)) {
				/*set value attribute*/	
				$model -> attributes = $_POST['Banner'];
				/*set image dari yang sudah ada*/
				$model -> banner = $image;
				/*simpan perubahan data*/
				if ($model -> save()) {
					/*direct ke product/view*/
					$this -> redirect(array('admin'));
				}
			} else {/*jika file ada*/

				$dir=Yii::app()->basePath . '/../images/banner/';
				unlink($dir. $image);	
				/*set value attribute*/
				$model -> attributes = $_POST['Banner'];
				/*ambil value / nama gambar*/
				$model -> banner = CUploadedFile::getInstance($model, 'banner');
				/*simpan perubahan data produk*/
				if ($model -> save()) {
					/*set value field image dengan nama gambar
					 *dan upload gambar ke folder images/products*/
					$model -> banner -> saveAs(Yii::app() -> basePath . '/../images/banner/' . $model -> banner . '');
					/*direct ke product/view*/
					$this -> redirect(array('admin'));
				}
			}
		}
		/*render form update product*/
		$this -> render('update', 
				array('model' => $model, 
			)
		);
	}
	protected function performAjaxValidation($model) {
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'banner-form') {
			echo CActiveForm::validate($model);
			Yii::app() -> end();
		}
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
		
		$criteria = new CDbCriteria( array('order' => 'id ASC'));

		$model = Banner::model() -> findAll($criteria);
		$this -> render('admin_table', array('model' => $model, ));
	}

	public function actionDelete($id) {
		if(!isset(Yii::app()->user->adminLogin)){
            $this->redirect(array('admin/'));
        }
		if (Yii::app() -> request -> isAjaxRequest) {

			$model = $this -> loadModel($id);
			if($model ->banner){
				unlink(Yii::app()->basePath . '/../images/banner/' . $model->banner);		
			}
			$this->loadModel($id)->delete();
			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if (!isset($_GET['ajax']))
				$this -> redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
	}
	public function loadModel($id) {
		$model = banner::model() -> findByPk($id);
		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}
}