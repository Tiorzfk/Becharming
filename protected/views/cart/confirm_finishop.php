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
						Checkout
					</h2>
					<div class="line"></div>
						<div id="accordion">
							<h3><span>Konfirmasi.</span></h3>
							<div class="row">
							<div class="delivery_details">
							<p>Silahkan Cek Pesanan Anda, caranya klik 'My Account' dan pilih menu 'Pesanan Saya',dan Untuk Konfirmasi Pembayaran 
							jika anda sudah bayar/Transfer caranya klik nomor pesanan anda di menu 'Pesanan Saya' dan klik 
							'Konfirmasi Pembayaran' atau sms ke 08579300996</p>
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