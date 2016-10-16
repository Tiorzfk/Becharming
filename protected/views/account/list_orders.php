<style>
	/*css ini untuk mengcustom tampilan datagridview*/
	.grid-view{
		margin-left:5px !important;
	}
	.summary{display:none !important;}
	.grid-view table.items [id*="order-grid"]{
		background: #696969 !important;
	}
	.grid-view table.items tr.odd{background: #EDE3E3 !important;}
	.grid-view table.items tr.even{background: #ffffff !important;}
	.grid-view table.items tr > td > a{
		text-decoration: none;
		color:black;	 
	}
	.grid-view table.items tr > td > a:hover{
		text-decoration: underline;
		color:#745151;	 
	}
</style>
<div class="breadcrumbs">
			<div class="container main">
				<ul>
					<li><a href="#">Home</a></li><li>&#47;</li><li><a href="<?php echo $this->createUrl('account/');?>">My Account</a></li>&#47;</li><li class="active"><a href="<?php echo $this->createUrl('account/orders');?>">List Orders</a></li>
				</ul>
			</div>	
		</div>	

		<div class="main_content">
			<div class="container main">
			<div class="row">
				<div class="span10 checkout_area">
					<h2 class="title-wrap">
						My Account
					</h2>
					<div class="line"></div>
					<div id="accordion">
					<div>
						<?php $this->renderPartial('_myaccount_menu');?>
					</div>
					<div class="row">
					<div class="delivery_details">
					<h5><font color="red">
					<?php
						foreach (Yii::app()->user->getFlashes() as $key => $message) {
							echo "<div style='margin:5px 5px 0 5px;' class='flash-" . $key . "'>" . $message . "</div>";
						}
						?>
					</font></h5>
						<h5>Order history anda</h5>
						<div style="clear: left;"></div>
						<?php
							/*buat code jquery untk search data order*/
							Yii::app() -> clientScript -> registerScript('search', "
								/*jika search form disumbit*/ 
								$('.search-form form').submit(function(){
									/*update order-grid*/	
									$.fn.yiiGridView.update('order-grid', {
									/*set data form menjadi serialize*/	
									data: $(this).serialize()
									});
								return false;
								});
							");
						?>
						<!--form search--> 
						<div class="search-form" style="margin-left: 100px;margin-top:10px;">
							<?php $form = $this -> beginWidget('CActiveForm', 
							    array('action' => Yii::app() -> createUrl($this -> route), 'method' => 'get', )); ?>
								<?php echo $form -> textField($model, 'order_code',array('placeholder'=>'cari berdasarkan order code','size'=>30,'style'=>'width:300px;')); ?>
							<?php echo CHtml::submitButton('Search'); ?>
							<?php $this -> endWidget(); ?>
						</div>
						<!--/form search--> 
						<div style="clear: left;"></div>
						<?php $this -> widget('zii.widgets.grid.CGridView', array('id' => 'order-grid',
							'dataProvider' => $model -> search(),
							'summaryText'=>'',
							//'filter'=>$model,
							'columns' => array(
								'id', 
								array(
									'name'=>'order_code',
									'header'=>'Nomor Pemesanan',
									'type'=>'html',
									'value'=>'CHtml::link("$data->order_code", array("orders", "id"=>$data->id),array("title"=>"click to view order"))',
									 
								), 
								'order_date', 
								'bank_transfer',
								)
							)
						);
						?>
						</div>
				</div>
				</div>
				</div>
					<?php $this->renderPartial('_right_menu');?>
			</div>	
			</div>
			
		</div>