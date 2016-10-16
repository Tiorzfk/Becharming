<?php

class SystemController extends Controller
{

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		$this->layout='null';
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

}