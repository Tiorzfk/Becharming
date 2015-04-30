<?php

class PageController extends Controller
{

	public $layout = 'homepage' ;

	public function actionIndex()
	{
		$this->render('index');
	}
	public function actionCreate()
	{
		$this->layout=false;
		if (Yii::app() -> request -> isAjaxRequest) {
			$modelpegawai = new Pegawai;
			if($_POST){
			$modelpegawai['nama']=$_POST['nama'];
			$modelpegawai['alamat']=$_POST['alamat'];
			$modelpegawai['telp']=$_POST['telp'];
			$modelpegawai->save();
			}
		$this -> render('create');
		}
	}
	public function actionTable()
	{
		$this->layout=false;
		$criteria = new CDbCriteria( array('order' => 'id DESC'));
		/* dapatkan semua data pegawai */
		$dataPegawai = Pegawai::model() -> findAll($criteria);
		/* kemudian render ke table
		 * dengan datapegawauk membawa data dari $dataPegawai dan
		 * data paging $pages*/
		$this -> render('table', array('dataPegawai' => $dataPegawai));
	}
	public function actionView($id)
	{
		$sql = "SELECT * FROM pegawai WHERE id='$id'";
		/*digunakan untuk mengkoneksikan ke databse*/
		$conncection = Yii::app() -> db;
		/*membuat command/query*/
		$command = $conncection -> createCommand($sql);
		/*membaca query dan akan dapat di tampilkan 1
		 datanya*/
		$results = $command -> queryRow();
		/*render ke file view nya indexpegawai.php*/
		$this -> render('view', array(
		/*dataProvider menampung data dari $results dan
		 akan di foreach di file view*/
		'pegawai' => $results));
	}
	public function actionDelete($id)
	{
		if (Yii::app() -> request -> isAjaxRequest) {
			/*delete data*/
			Pegawai::model() -> deleteByPk($id);
		}
	}
	public function actionUpdate($id)
	{
		$this->layout=false;
		if (Yii::app() -> request -> isAjaxRequest) {
		/*digunakan untuk mengkoneksikan ke databse*/
		$modelpegawai = Pegawai::model() -> findByPk($id);
		if($_POST){
			$modelpegawai['nama']=$_POST['nama'];
			$modelpegawai['alamat']=$_POST['alamat'];
			$modelpegawai['telp']=$_POST['telp'];
			$modelpegawai->save();
		}
		$this->render('update',array('pegawai'=>$modelpegawai));
		}
	}

}