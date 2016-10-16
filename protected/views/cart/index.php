<div class="breadcrumbs">
			<div class="container main">
				<ul>
					<li><a href="#">Home</a></li><li>&#47;</li><li class="active"><a href="<?php echo $this->createUrl('cart/');?>">Keranjang Belanja</a></li>
				</ul>
			</div>	
		</div>

		<div class="main_content">
			<div class="container main">
				<div class="checkout_area">
					<h2 class="title-wrap">
						Keranjang Belanja
					</h2>
					<div class="line"></div>
					
						<div class="cart_area">
							
							<div class="cart_area_heading">
								<div class="row">
								<div class="span1 cart_remove">
									<p>No</p>
								</div>
								<div class="span2 cart_remove">
									<p>Hapus</p>
								</div>
								<div class="span2 cart_image">
									<p>Gambar</p>
								</div>
								<div class="span2 cart_product_name">
									<p>Nama Product</p>
								</div>
								<div class="span2 cart_quantity">
									<p>Jumlah</p>
								</div>
								<div class="span3 cart_total_price">
									<p>Harga</p>
								</div>
								</div>
							</div>
							<?php echo CHtml::beginForm(array('change')); 
							$i=1;foreach($data as $model): $sum=$sum+($model['price'] * $model['qty']);
							echo CHtml::hiddenField('id' . $i, $model['id_cart'], array('maxlength' => 3, 'style' => "width:20px;text-align:center")); ?>
							<div class="cart_area_list">
								<div class="cart_area_content">
								<div class="row">
									<div class="span1 cart_remove">
										<p><?php echo $i; ?></p>
									</div>
									<div class="span2 cart_remove">
										<p><a href="<?php echo $this->createUrl('Remove',array('id'=>$model['id_cart']))?>">X</a></p>
									</div>
									<div class="span2 cart_image">
										<?php echo CHtml::image(Yii::app() -> request -> baseUrl . '/images/products/' . $model['id_product'] .'/'.$model['filename'].'', '',array('style'=>'width:90px;height:90px;'));?></p>
									</div>
									<div class="span2 cart_product_name">
										<p><?php echo $model['name_product']; ?></p>
									</div>
									<div class="span2 cart_quantity">
										<p><?php echo CHtml::textField('qty' . $i, $model['qty'], array('maxlength' => 3, 'style' => "width:50px;text-align:center")); ?></p>
									</div>
									<div class="span3 cart_total_price">
										<p>IDR <?php echo number_format($model['price'] * $model['qty'], 0, '.', '.'); ?></p>
									</div>
								</div>
							</div>
							</div>
						<?php $i++; endforeach;?>
						<div class="total_cart_cost_btn">
						<?php echo CHtml::submitbutton('Update',array('class'=>'continue'));?>
						</div>
						</div>
						<p>*)Apabila Anda mengubah jumlah (Qty), jangan lupa tekan tombol Update Keranjang..</p>
						<p>**) Total harga diatas belum termasuk ongkos kirim yang akan dihitung saat Selesai Belanja..</p>
					</div>
					<div class="row total_cost">
						<div class="span6 gap_section">

						</div>
						<div class="span6 total_cost_section">
						<center>
							<div class="total_cart_cost">
								<div class="cart_level">
									<p><span>Total Harga:</span></p>
								</div>
								<div class="cart_amount">
									<p><span>IDR <?=number_format($sum, 0, ",", ".") ?></span></p>
								</div>
							</div>
						</center>
							<div class="total_cart_cost_btn">
							<?php if($i>1){?>
								<button type="button" onclick="window.location='<?php echo Yii::app()->request->baseUrl; ?>/cart/finishshop'" class="checkout">Checkout</button>
							<?php }else{ ?>	
								<button type="button" onclick="window.location='<?php echo Yii::app()->request->baseUrl; ?>/cart/finishshop'" class="checkout" disabled>Checkout</button>
							<?php } ?>
								<button type="button" onclick="window.location='<?php echo Yii::app()->request->baseUrl; ?>./'" class="continue">Continue</button>
							</div>
						</div>
					</div>
				</div>
			</div>