<div class="breadcrumbs">
			<div class="container main">
				<ul>
					<li><a href="#">Home</a></li><li>&#47;</li><li class="active"><a href="#">All</a></li>
				</ul>
			</div>	
		</div>
		
		<div class="main_content">
			<div class="container main product_style">
				<div class="row">
					<div class="product_all">

				<!--Nav section for mixtop-->
					
					<nav class="controls just view_as top">
						<div class="group span4 left-order Sorts">

						</div>
					</nav>
					
					<!--Nav section for mixtop-->
		<div class="container main" id="first-carousel-slide">
        <div class="row list_work">
          <h2 class="title-wrap">
            <span>All Products</span>
          </h2>
          <div class="line"></div>
          <ul id="mycarousel" class="jcarousel-skin-tango item da-thumbs">
            <?php foreach($models as $data):?>
            <li class="span3 new-product"> 
              <div class="new-product-image">        
             <?php
				foreach($data->image as $img){
					echo CHtml::image(Yii::app() -> request -> baseUrl . '/images/products/' . $data['id_product'] .'/'.$img['filename'].'', '',array('style'=>'width:190px;height:190px;'));
				}
				
			 ;?>
			 </div>  
              <div class="new-product-info">  
                <div>
                  <div class="new-product-price">Rp.<?php echo number_format($data['price'],0,',','.');?></div>
                  <div class="new-product-bg">
                    <div class="newE-product-cart_like">
                      <div class="new-product-cart_like">
                        <div class="new-product-cart" id="cart<?php echo $data['id_product']?>">
                        <a href="#" id="<?php echo $data['id_product']?>" class="product-cart"><img alt="" src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/images/new-product/shoping-info/cart-image.png"></a>
                        </div>
                        <div class="new-product-cart" style="display:none;" id="loading<?php echo $data['id_product']?>"><img src="<?php echo Yii::app()->request->baseUrl;?>/images/ajax-loader.gif" width="20px"></div>
                        <div class="new-product-like"><img alt="" src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/images/new-product/shoping-info/like-img.png"></div>
                      </div>
                    </div>
                    <div class="new-product-details"><?php echo CHtml::link(CHtml::encode("DETAIL"), array('detail', 'id' => $data ['id_product'], 'p'=>$data ['name_product']),array('class' => 'details')); ?></div>
                  </div>      
                </div>
              </div>
              <div class="new-product-content">
                <div class="new-product-title">
                  <a href="#"><p><?php echo $data ['name_product']; ?></p></a>
                </div>
                <div class="new-product-content">
                  <p><?php echo substr($data['description'],0,30); ?></p>
                </div>
              </div>
            </li>   
            <?php endforeach;?> 
          </ul>
        </div>      <div class="line"></div>    
      </div>  
					
				<!--Nav section for mixtop-->
					
						<nav class="controls just view_as bottom">
						<div class="group span4 left-order Sorts">

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
					
				</div>
			</div>
		</div>
		<script>
        $('.product-cart').click(function(){
        /*dapatkan id produk*/
        var id =$(this).attr('id'); 
        $('#cart'+id).hide();
        $('#loading'+id).show();
        /*fungsi ajax dimainkan*/
        $.ajax({
           /*kirim bermetod post*/
           type:'POST',
           /*load url localhost/ajax/delete/$id*/   
             url:'<?php echo Yii::app()->request->baseUrl;?>/Product/Addtocart/'+id,
             /*fungsi sukses*/
             success:function(){
              $("#loading"+id).hide(); 
              $('#cart'+id).show();
              /*load url localhost/ajax/indexproduk*/
              $('#cart').load('<?php echo Yii::app()->request->baseUrl;?>/Product/cart'); 
             }
          });
          return false;
        });
  </script>
  