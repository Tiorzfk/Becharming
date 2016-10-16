<div class="panel panel-white">
<div class="panel-heading clearfix">
    <h4 class="panel-title">Member</h4>
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
		'customer_id',
		/*order kode/nomor pemesanan*/
		'customer_name',
		/*tanggal pemesanan*/
		'email',
		
		array(
			'class'=>'CButtonColumn',
			/*template buttom aksi:
			 *menampilkan tombol view saja*/
			'template'=>'{delete}'
		),
	),
)); ?>
