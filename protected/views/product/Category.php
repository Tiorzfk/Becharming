<div class="breadcrumbs">
			<div class="container main">
				<ul>
					<li><a href="#">Home</a></li><li>&#47;</li><li class="active"><a href="#">Category</a></li>
				</ul>
			</div>	
		</div>
		
		<div class="main_content">
			<div class="container main product_style">
				<div class="row">
					<div class="span9 product-area">
					
						<div class="discount_banner">
							<img alt="" src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/images/category/1.jpg" style="width:675px;height:200px;">
						</div>
					
				<!--Nav section for mixtop-->
					
						<nav class="controls just view_as top">
						<div class="group span4 left-order Sorts">
							<p>view as:</p>
							<ul>
								<li><div class="button" id="ToGrid"></div></li>
								<li><div class="button" id="ToList"></div></li>
							</ul>
						</div>
					</nav>
					
					<!--Nav section for mixtop-->
					<div id="myImg">
					</div>
						<ul id="Parks" class="just list">
						<?php foreach($models as $data):?>
						<li class="mix northeast camping climbing fishing swimming mix_all" data-name="Acadia" data-area="47452.80">
							<div class="meta name">
								<div class="img_wrapper loaded">
								<?php
								foreach($data->image as $img){
									echo CHtml::image(Yii::app() -> request -> baseUrl . '/images/products/' . $data['id_product'] .'/'.$img['filename'].'', '',array('style'=>'width:180px;height:250px;'));
								}
								
								;?>

								</div>

							</div>	
							<div class="product_info new-product-info">
								<div>
									<div class="new-product-price">Rp.<?php echo number_format($data['price'],0,',','.');?></div>
									<div class="new-product-bg">
										<div class="newE-product-cart_like">
											<div class="new-product-cart_like">
												<div class="new-product-cart" id="cartall<?php echo $data['id_product']?>">
												<a href="#" class="all_cart" id="<?php echo $data['id_product']?>">
												<img alt="" src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/images/new-product/shoping-info/cart-image.png">
												</a>
												</div>
												 <div class="new-product-cart" style="display:none;" id="loadingall<?php echo $data['id_product']?>"><img src="<?php echo Yii::app()->request->baseUrl;?>/images/ajax-loader.gif" width="20px"></div>
												<div class="new-product-like"><img alt="" src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/images/new-product/shoping-info/like-img.png"></div>
											</div>
										</div>
										<div class="new-product-details"><?php echo CHtml::link(CHtml::encode("DETAIL"), array('detail', 'id' => $data ['id_product'], 'p'=>$data ['name_product'])); ?></div>
									</div>			
								</div>
							</div>
							<div class="product_description product_info">
								<div class="title"><?php echo $data['name_product']?></div>
								<div class="content"><?php echo substr($data['description'], 0, 60)?>.</div>
							</div>								
							<div class="meta product_description">
								<div class="title"><?php echo $data['name_product']?></div>
								<div class="content"><?php echo substr($data['description'], 0, 300)?>.</div>
							</div>
							<div class="meta product_description">
								<div class="popular-product-info">	
									<div>
										<div class="popular-product-price">Rp.<?php echo number_format($data['price'],0,',','.');?></div>
											<div class="popular-product-bg">
												<div class="popular-product-cart_like">
													<div class="popular-product-cart_like">
														<div class="popular-product-cart" id="cartallpop<?php echo $data['id_product']?>">
														<a href="#" class="all_cart_pop" id="<?php echo $data['id_product']?>">
														<img alt="" src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/images/new-product/shoping-info/cart-image.png">
														</a>
														</div>
														 <div class="popular-product-cart" style="display:none;" id="loadingallpop<?php echo $data['id_product']?>"><img src="<?php echo Yii::app()->request->baseUrl;?>/images/ajax-loader.gif" width="20px"></div>
														<div class="popular-product-like"><img alt="" src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/images/new-product/shoping-info/like-img.png"></div>
													</div>
												</div>
												<div class="popular-product-details"><?php echo CHtml::link(CHtml::encode("DETAIL"), array('detail', 'id' => $data ['id_product'], 'p'=>$data ['name_product'])); ?></div>
											</div>			
										</div>
									</div>
								</div>
						</li>	
						<?php endforeach; ?>				
					</ul>
					
				<!--Nav section for mixtop-->
					
						<nav class="controls just view_as bottom">
						<div class="group span4 left-order Sorts">
							<p>view as:</p>
							<ul>
								<li><div class="button" id="ToGrid1"></div></li>
								<li><div class="button" id="ToList1"></div></li>
							</ul>
						</div>
						<div class="group span5 right-order">
							<!-- Start pagination -->
								<div class="pagination">
									<ul>
									  <?php $this->widget('CLinkPager', array(
   										'pages' => $pages,
   										'cssFile'=>false,
   										'header'=> '',
   										'firstPageLabel'=>'| <',
   										'lastPageLabel'=>'> |',
   										'nextPageLabel'=>'>',
   										'prevPageLabel'=>'<',
   										'maxButtonCount'=>5,
									   ))?>
									</ul>
								</div>
							<!-- End pagination -->
						</div>
					</nav>
						
				<!--Nav section for mixtop-->	
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
									<li>
									<?php 
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
                    				?>
									</li>
								<?php endforeach;?>
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
							<div class="widget-title">Page</div>
							<div class="line"></div>
							<div class="widget-content">
<div class="fb-page" data-href="https://www.facebook.com/yii.indonesia/?fref=nf" data-width="270" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/yii.indonesia/?fref=nf"><a href="https://www.facebook.com/yii.indonesia/?fref=nf">Indonesia Yii Framework community</a></blockquote></div></div>
                             </div>
						</div>

					</div>	
				</div>
				</div>
			</div>
		</div>
<script>
        $('.all_cart').click(function(){
        /*dapatkan id produk*/
        var id =$(this).attr('id'); 
        $('#cartall'+id).hide();
        $('#loadingall'+id).show();
        /*fungsi ajax dimainkan*/
        $.ajax({
           /*kirim bermetod post*/
           type:'POST',
           /*load url localhost/ajax/delete/$id*/   
             url:'<?php echo Yii::app()->request->baseUrl;?>/Product/Addtocart/'+id,
             /*fungsi sukses*/
             success:function(){
              $("#loadingall"+id).hide(); 
              $('#cartall'+id).show();
              /*load url localhost/ajax/indexproduk*/
              $('#cart').load('<?php echo Yii::app()->request->baseUrl;?>/Product/cart'); 
             }
          });
          return false;
        });
  </script>
   <script>
        $('.all_cart_pop').click(function(){
        /*dapatkan id produk*/
        var id =$(this).attr('id'); 
        $('#cartallpop'+id).hide();
        $('#loadingallpop'+id).show();
        /*fungsi ajax dimainkan*/
        $.ajax({
           /*kirim bermetod post*/
           type:'POST',
           /*load url localhost/ajax/delete/$id*/   
             url:'<?php echo Yii::app()->request->baseUrl;?>/Product/Addtocart/'+id,
             /*fungsi sukses*/
             success:function(){
              $("#loadingallpop"+id).hide(); 
              $('#cartallpop'+id).show();
              /*load url localhost/ajax/indexproduk*/
              $('#cart').load('<?php echo Yii::app()->request->baseUrl;?>/Product/cart'); 
             }
          });
          return false;
        });
  </script>
