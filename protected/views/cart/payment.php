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
						Checkout Payment
					</h2>
					<div class="line"></div>
					<p><h5>Silahkan melakukan transfer ke salah satu rekening di bawah ini.</h5></p>
						<div id="accordion">
							<h3>1: <span>Silahkan Gunakan Bank transfer.</span></h3>
							<div class="row">
							<div class="delivery_details">
							<form action="" method="post">
							<div style="clear: left;"></div>
							<div style="padding:5px 0 15px 0;float: left;margin:5px 0 0 5px;border:solid 1px #CCC;width:100%;">
								<table width="100%" height="66">
									<tr>
										<td>
										<input type="radio" checked="checked" name="Transfer[bank]" value="BCA 0989-455-344 a.n Kuuga">
										BCA 0989-455-344 a.n Elis Handayani</td>
									</tr>
									<tr>
										<td>
										<input type="radio" name="Transfer[bank]" value="MANDIRI 9999-9877-009 a.n Kuuga">
										MANDIRI 9999-9877-009 a.n Elis Handayani</td>
									</tr>
									<tr>
										<td>
										<input type="radio" name="Transfer[bank]" value="BRI 77090-8898-989 a.n Kuuga">
										BRI 77090-8898-989 a.n Elis Handayani</td>
									</tr>
								</table>
							</div>
							<?php echo CHtml::submitButton('Lanjutkan',array('class'=>'confirm_btn')); ?>
							</div>
							</form>
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