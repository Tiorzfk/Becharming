<div class="panel panel-white">
<div class="panel-heading clearfix">
    <h4 class="panel-title">Manage Order</h4>
</div>
<div class="panel-body">
<?php 
/*gunakan data grid view*/
$this->widget('zii.widgets.grid.CGridView', array(

	'itemsCssClass' => 'table table-bordered table-hover',
	/*id datagridview*/
	'id'=>'order-grid',
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
		'id',
		/*order kode/nomor pemesanan*/
		'order_code',
		/*tanggal pemesanan*/
		'order_date',
		/*bank transfer*/
		'bank_transfer',
		/*payment status*/
		array(
			'name' => "payment_status",
			'value'=>'$data->payment',
			'type'=>'html',
			/*untuk filter pembayaran (sudah bayar/belum)*/
			'filter' => CHtml::dropDownList('Order[payment_status]',$model->payment_status,array('1'=>'Paid','0'=>'Pending'),array('empty'=>'','class'=>'height:400px;')),
		),
		
		array(
			'class'=>'CButtonColumn',
			/*template buttom aksi:
			 *menampilkan tombol view saja*/
			'template'=>'{view}'
		),
	),
)); ?>
