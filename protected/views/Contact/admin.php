<div class="panel panel-white">
<div class="panel-heading clearfix">
    <h4 class="panel-title">Message</h4>
</div>
<div class="panel-body">
<?php 
/*gunakan data grid view*/
$this->widget('zii.widgets.grid.CGridView', array(

	'itemsCssClass' => 'table table-bordered table-hover',
	/*id datagridview*/
	'id'=>'contact-grid',
	/*data provider (data order)*/
	'dataProvider'=>$model->search(),
	/*untuk filter/pencarian*/
	'filter'=>$model,
	/*untuk menghilangkan 
	 *summary text paging*/
	'summaryText'=>'',
	'pager'=>array(
			'header'=>'',
	),
	/*data yang dampilkan*/
	'columns'=>array(
		/*id order*/
		'id_contact',
		/*order kode/nomor pemesanan*/
		'name',
		/*tanggal pemesanan*/
		'email',
		/*bank transfer*/
		'subject',
		/*payment status*/
		'phone',
		'message',
		
		array(
			'class'=>'CButtonColumn',
			/*template buttom aksi:
			 *menampilkan tombol view saja*/
			'template'=>'{delete}'
		),
	),
)); ?>
