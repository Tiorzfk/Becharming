<style>
	form .errorSummary {
    background: none repeat scroll 0 0 #FFEEEE;
    border: 2px solid #CC0000;
    font-size: 0.9em;
    margin: 0 0 20px 3px;
    padding: 7px 7px 12px;
    text-align: justify;
}
form .errorSummary ul{
	padding: 0 0 0 20px;
}
</style>
<div class="breadcrumbs">
			<div class="container main">
				<ul>
					<li><a href="#">Home</a></li><li>&#47;</li><li><a href="<?php echo $this->createUrl('account/');?>">My Account</a></li>&#47;</li><li class="active"><a href="<?php echo $this->createUrl('account/orders');?>">Detail Orders</a></li>
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
					<h5><font color="red">*Pastikan Anda Sudah Membayar sebelum konfirmasi pembayaran berikut ini</font></h5>
					 <?php echo CHtml::beginForm();?>
 					 <?php echo CHtml::errorSummary($model); ?>
									<div class="form">	
											<label><small>Nomor Pemesanan<strong>*</strong></small></label>
 											<?php echo CHtml::activeTextField($model,'nomerPemesanan',array('value'=>$_GET['confirm'],'readonly'=>'readonly'));?> 
										
											<label><small>Nama Bank Pengirim<strong>*</strong></small></label>
 											<?php echo CHtml::activeTextField($model,'bankAsal',array('placeholder'=>'ex.BCA'));?> 
										
											<label><small>Nama Pemilik Rekening<strong>*</strong></small></label>
											<?php echo CHtml::activeTextField($model,'pemilikRekAsal',array('style'=>'height:50px','placeholder'=>'ex.Endi Agustin'));?> 


											<?php $modelOrder = Order::model()->findByAttributes(array('order_code'=>$_GET['confirm']));?>
											<label><small>Bank Tujuan Transfer<strong>*</strong></small></label>
											<?php echo CHtml::activeTextField($model,'bankTujuan',array('value'=>$modelOrder->bank_transfer,'readonly'=>'readonly'));?> 


											<label><small>Jumlah yang Ditransfer<strong>*</strong></small></label>
											<?php echo CHtml::activeTextField($model,'nominalTransfer',array('placeholder'=>'ex.120000'));?>

										
									</div> 
									<?php echo CHtml::submitButton('Confirm');?>
									<?php echo CHtml::endForm();?>
	 

						</div>
				</div>
				</div>
				</div>
				<?php $this->renderPartial('_right_menu');?>			
			</div>	
			</div>
			
		</div>