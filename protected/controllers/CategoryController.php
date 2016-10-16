<?php

class CategoryController extends Controller{
	 
	public $layout='homepage';

	/**
	 * Manages all models.
	 */
	/*create kategori*/
	public function actionCreate(){
		if(!isset(Yii::app()->user->adminLogin)){
            $this->redirect(array('admin/'));
        }
		/*panggil model Category*/	
		$model=new Category;
		$this->performAjaxValidation($model);
		/*jika data kategori dikirim*/
		if(isset($_POST['Category'])){
			/*set attributes*/	
			$model->attributes=$_POST['Category'];
			/*simpan data kategori*/
			if($model->save()){
				/*direct ke actionView*/
				$this->redirect(array('admin'));
			}
				
		}
		/*menampilkan form create*/
		$this->render('create',array(
			'model'=>$model,
		));
	}
	protected function performAjaxValidation($model) {
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'category-form') {
			echo CActiveForm::validate($model);
			Yii::app() -> end();
		}
	}
	/*update category*/
	public function actionUpdate($id){
		if(!isset(Yii::app()->user->adminLogin)){
            $this->redirect(array('admin/'));
        }
		/*find data by pk*/	
		$model=$this->loadModel($id);
		/*jika data dikirim*/
		if(isset($_POST['Category'])){
			/*set attributes*/	
			$model->attributes=$_POST['Category'];
			/*simpan perubahan*/
			if($model->save()){
				/*direct ke function actionView*/	
				$this->redirect(array('admin'));
			}
		}
		/*menampilkan form update*/
		$this->render('update',array(
			'model'=>$model,
		));
	}
	/*untuk find data by pk*/
	public function loadModel($id){
		$model=Category::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
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
		$criteria = new CDbCriteria( array('order' => 'id_category ASC'));

		$model = Category::model() -> findAll($criteria);
		$this -> render('admin_table', array('model' => $model, ));

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