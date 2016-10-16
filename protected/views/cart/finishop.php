<div class="breadcrumbs">
			<div class="container main">
				<ul>
					<li><a href="#">Home</a></li><li>&#47;</li><li class="active"><a href="#">Check Out</a></li>
				</ul>
			</div>	
		</div>	

		<div class="main_content">
			<div class="container main">
			<div class="row">
				<div class="span9 checkout_area">
					<h2 class="title-wrap">
						Checkout Address
					</h2>
					<div class="line"></div>
					<p><h5>Alamat ini digunakan untuk tujuan pengiriman pesanan anda.</h5></p>
						<div id="accordion">
							<h3>1: <span>Gunakan Alamat yang Sudah ada di Bawah ini.</span></h3>
							<div class="row">
							<div class="delivery_details">
							<form action="" method="post">
							<div style="clear: left;"></div>
							<?php
								$i=1;foreach($addressBooks as $address):
								($i%3===0) ? $div ='<div style="clear:left;"></div>':$div='';
								($i===1) ? $checked ='checked="checked"' : $checked='';
							?>
								<div style="float: left;margin:5px 0 0 5px;border:solid 1px #CCC;">
									<table width="166" height="66">
										<tr>
											<td valign="top"><input type="radio" <?php echo $checked;?> name="ChooseAddress[id_address]" value="<?php echo $address->id_address;?>" /></td>
											<td valign="top">
												<strong><?php echo $address->name;?></strong><br>
												<?php echo $address->address;?>
												<?php echo $address->province;?>
												<?php echo $address->city;?><br>
												Telp./Hp : 
												<?php echo $address->phone_number;?>
											</td>
										</tr>
									</table>
								</div>
							
							<?php
						echo $div;
						$i++;
						endforeach;
						?>
						<?php if($i>1){
						echo CHtml::submitButton($model -> isNewRecord ? 'Lanjutkan' : 'Save',array('class'=>'confirm_btn','onclick'=>'return confirm("periksa kembali, apakah alamat kirim sudah benar?")')); ?>
						<?php }else{
						echo CHtml::submitButton($model -> isNewRecord ? 'Lanjutkan' : 'Save',array('class'=>'confirm_btn','onclick'=>'return confirm("periksa kembali, apakah alamat kirim sudah benar?")','disabled'=>'disabled')); }?>

							</form>
							</div>
							</div>
							<h3>2: <span>Buat alamat baru dan gunakan sebagai alamat pengiriman</span></h3>
							<div>
								<div class="delivery_details">
									<h2>Alamat Baru</h2>
									<?php $form = $this -> beginWidget('CActiveForm', 
											array('id' => 'add-addressBook-form', 
											'enableAjaxValidation' => false, 
											'enableClientValidation' => TRUE, 
											)
										); 
									?>
									<div class="form">	
											<label><small>Name<strong>*</strong></small></label>
											<?php echo $form -> textField($model, 'name', array('class' => 'width', 'maxlength' => 56)); ?>
											<?php echo $form -> error($model, 'name'); ?>
										
											<label><small>Phone Number<strong>*</strong></small></label>
											<?php echo $form -> textField($model, 'phone_number', array('class' => 'width', 'maxlength' => 15)); ?>
											<?php echo $form -> error($model, 'phone_number'); ?>
										
											<label><small>Address<strong>*</strong></small></label>
											<?php echo $form -> textArea($model, 'address', array('class'=>'width','cols' => 43, 'rows' => 4,'style'=>'width:400px')); ?>
											<?php echo $form -> error($model, 'address'); ?>
										
											<label><small>Province<strong>*</strong></small></label>
											<?php echo $form -> textField($model, 'province', array('class' => 'width', 'maxlength' => 35)); ?>
											<?php echo $form -> error($model, 'province'); ?>
									
											<label><small>City<strong>*</strong></small></label>
											<?php echo $form -> textField($model, 'city', array('size' => 35, 'maxlength' => 35)); ?>
											<?php echo $form -> error($model, 'city'); ?>
										
									</div>
									<?php echo CHtml::submitButton($model -> isNewRecord ? 'Create' : 'Save',array('class'=>'confirm_btn')); ?>
								<?php $this -> endWidget(); ?>
								</div>	
							</div>

						</div>	

				</div>
				<div class="span3 widget-area">
					<div class="right-sidebar">
						<div class="widget-info">
							<div class="widget-title">Categories</div>
							<div class="line"></div>
							<div class="widget-content">
								<ul>
								<?php
                				  $criteria = new CDbCriteria( array('limit' => '6'));
                				  /*ambil semua data kategori*/
                				  $model=Category::model()->findAll($criteria);
                				  /*foreach data kategori*/
                				  foreach ($model as $datacat):
                				?>    
									<li><?php 
                      				/*buat link produk berdasarkan kategori*/
                      				echo CHtml::link(
                      				/*untuk label link*/
                      				CHtml::encode($datacat -> name_category), 
                      				/*untuk url link*/
                      				array(
                      				   'product/category', 
                      				   'id' => $datacat -> id_category, 
                      				   'c' => $datacat -> name_category
                      				)); 
                   				 ?></li><?php endforeach;?>
								</ul>
							</div>
						</div>
						<div class="widget-info">
							<div class="widget-title">Search Product</div>
							<div class="line"></div>
							<div class="widget-price">
							<form action="<?php echo $this->createUrl('product/search');?>" method="post">
								<select class="select_color" name="Search[category]">
								<option value="all-categories">All Categories</option>
								<?php
									$Categories = Category::model()->findAll();
									foreach($Categories as $category):
									?>
									<option value="<?php echo $category->id_category;?>"><?php echo $category->name_category;?></option>
								<?php endforeach; ?>
								</select>
								<input name="Search[keyword]" type="search" name="search" placeholder="Name Product" required>
								<input type="submit" value="Search" class="btn btn-danger">
							</form>
							</div>
						</div>
						<div class="widget-info">
							<div class="widget-title">Color</div>
							<div class="line"></div>
							<div class="widget-price">
								<select class="select_color">
									<option value="red">Red</option>
									<option value="blue">Blue</option>
									<option value="green">Green</option>
									<option value="yellow">yellow</option>
								</select>
							</div>
						</div>
						<div class="widget-info">
							<div class="widget-title">Manufacturer</div>
							<div class="line"></div>
							<div class="widget-content">
								<form>
									<div><input type="checkbox" name="vehicle" value="Bike"><div class="brand_name">Adidas</div></div>
									<div><input type="checkbox" name="vehicle" value="Car"><div class="brand_name">Nike</div></div>
									<div><input type="checkbox" name="vehicle" value="Bike"><div class="brand_name">T-Shirt</div></div>
									<div><input type="checkbox" name="vehicle" value="Car"><div class="brand_name">Puma</div></div> 
									<div><input type="checkbox" name="vehicle" value="Bike"><div class="brand_name">Denim</div></div>
									<div><input type="checkbox" name="vehicle" value="Car"><div class="brand_name">Dedeman</div></div> 
									<div><input type="checkbox" name="vehicle" value="Car"><div class="brand_name">New wear</div></div>
								</form>
							</div>
						</div>
						<div class="widget-info">
							<div class="widget-title">View History</div>
							<div class="line"></div>
							<div class="widget-content">
								<div class="history-product-image">	
									<a href="#"><img src="images/product-list/htstory.png" alt="" /></a>
								</div>
								<div id="feature-post-content">
									<div>
										<button class="shop-now">Shop Now</button> 
									</div>
								</div>
							</div>
						</div>
					</div>	
				</div>				
			</div>	
			</div>
			
		</div>