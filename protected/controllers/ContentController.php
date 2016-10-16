<?php

class ContentController extends Controller{
	 
	public $layout='store';

	public function actionCara_order(){

		$this->render('cara_order');
	}
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	public function actionContact_us()
	{
		$model=new Contact;
		$this->performAjaxValidation($model);
		if(isset($_POST['Contact']))
		{
			$model->attributes=$_POST['Contact'];
			if($model->save())
			{
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->redirect(array('content/contact_us'));
			}
		}
		$this->render('contact',array('model'=>$model));
	}
		protected function performAjaxValidation($model) {
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'contact-form') {
			echo CActiveForm::validate($model);
			Yii::app() -> end();
		}
	}
	public function actionAbout_us()
	{
		$this->render('about');
	}
	public function actionShipping_delivery()
	{
		$this->render('sd');
	}
	public function actionCek_ongkir()
	{
		$this->render('cek_ongkir');
	}
	public function actionReturns_exchanges()
	{
		$this->render('returns_exchanges');
	}
}
?>