<div class="breadcrumbs">
      <div class="container main">
        <ul>
          <li><a href="#">Home</a></li><li>&#47;</li><li class="active"><a href="#">Product Details</a></li>
        </ul>
      </div>  
    </div>  
  
    <div class="main_content">
      <div class="container main">
        <div class="row">
          <div class="span3 widget-area">
          <div class="left-sidebar">
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
              <div class="widget-title">Popular</div>
              <div class="line"></div>
              <div class="widget">
                <ul>
                <?php foreach($mostview as $mostview):?>
                  <li class="feature_pro sidebar_post_wrap">
                    <div class="feature_pro_image sidebar_feature_img"> 
                    <a href="<?php echo $this->createUrl('detail',array('id'=>$mostview['id_product'],'p'=>$mostview ['name_product']));?>">
                       <?php echo CHtml::image(Yii::app() -> request -> baseUrl . '/images/products/' . $mostview['id_product'] .'/'.$mostview['filename'].'', '',array('style'=>'width:130px;height:140px;'));?>
                    </a>
                    </div>
                    <div class="feature_pro_info sidebar_feature_pro_info">
                      <p class="feature_pro_title sidebar_feature_pro_title"><?php echo $mostview['name_product']?></p>
                      <p class="feature_pro_content sidebar_feature_pro_content"><?php echo substr($mostview['description'],0,50)?></p>
                      <button class="feature_pro_price sidebar_pro_price">Rp.<?php echo number_format($mostview['price'],0,',','.');?></button>
                    </div>  
                  </li>
                <?php endforeach;?>
                </ul>
              </div>
            </div>
            
          </div>
          
        </div>
          <div class="span9 product_details">         
            <div class="row">
              <div class="span4">
                <div class="porduct_info">       
                  <div class="clearfix portfilio_zooming_product span9">
                  <?php foreach($image1 as $image1){?>
                    <a href="<?php echo Yii::app() -> request -> baseUrl . '/images/products/' . $image1['id_product'] .'/'.$image1['filename']?>" class="jqzoom" rel='gal1'  title="triumph" >
                      <div class="span4">
                      <?php echo CHtml::image(Yii::app() -> request -> baseUrl . '/images/products/' . $image1['id_product'] .'/'.$image1['filename'].'', '');
                      echo "</div>";
                      }?>
                    </a>
                  </div>
      
                  <div class="clearfix span4" >
                    <ul id="thumblist" class="clearfix" >
                    <?php foreach($image2 as $image2){?>
                      <li>
                        <a href='javascript:void(0);' rel="{gallery: 'gal1', smallimage: '<?php echo Yii::app() -> request -> baseUrl . '/images/products/' . $image2['id_product'] .'/'.$image2['filename']?>',largeimage: '<?php echo Yii::app() -> request -> baseUrl . '/images/products/' . $image2['id_product'] .'/'.$image2['filename']?>'}">
                        <?php echo CHtml::image(Yii::app() -> request -> baseUrl . '/images/products/' . $image2['id_product'] .'/'.$image2['filename'].'', '',array());?>
                        </a>
                      </li>
                    <?php } ?>
                    </ul>
                  </div>
                </div>  
              </div>
              <div class="row">
                <div class="span5">
                
                  <div class="porduct_info_details ">
                    <div class="row">
                      <div class="product_single_title span2">
                        <?php echo $data->name_product ?>
                      </div>
                      <div class="date span2">
                      Publish: <?php echo $data->date ?>
                      </div>

                      <div class="product_select span4">
                      </div>
                      <div class="product_single_info span4">
                        <p><span>Product Id:</span> <?php echo $data->id_product?></p>
                        <p><span>Category:</span> <?php echo $data->category->name_category?></p>
                        <p><span>Harga:</span> Rp. <?php echo $data->price_product?></p>
                        <p><span>View:</span> <?php echo $data->view?></p>
                      </div>
                      <div class="product_single_model_info span4">
                        <p><span>About This Model:</span></p>
                        <?php echo $data->description;?>
                      </div>
                      <div class="product_single_cart_info span4">
                        <button class="price">
                          Rp.<?php echo $data->price_product?>
                        </button>
                        <button class="add_to_cart" id="<?php echo $data->id_product?>">
                          <img alt="" src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/images/new-product/shoping-info/cart-image.png">
                          <span>Add to cart</span>
                        </button>
                        <button class="like">
                          <img alt="" src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/images/new-product/shoping-info/like-img.png">
                        </button>
                        <strong> <div class="tunggu<?php echo $data->id_product;?>"style="display:none;"><font size="3">*Please Wait ...</font></div>
                      <div style="display:none;" class="sip<?php echo $data->id_product;?>"><font size="3">*Product Telah ditambahkan .</font></div></strong>
                      </div>
                        
                    </div>  
                    <div class="row">
                    <div class="span4"></div>
                    <div class="rating_share_wrapper">
                      <div class="share_it span3">
                        <p>Share this:</p>
<script type="text/javascript">  
document.write('<ifr'+'ame id="websites_iframe" src="http://www.linksalpha.com/social?link=' + escape(location.href) + '" scrolling="no" frameborder="0" height="25px" width="320px"></ifr'+'ame>');  
</script>     
                      </div>
                    </div>
                    </div>

                  </div>
            
                </div>
              </div>
            </div>
            <div class="row">
              <div class="span9 related_product checkout_area list_work">
                <h2 class="title-rel">
                  <span>Produk Lainnya</span>
                </h2>
                <div class="line"></div>
                <div class="new-product-info">
                  <div class="related_products">
                  <?php foreach($newpro as $newpro):?>
                    <div class="span3 new-product slide">
                      <div class="new-product-image"> 
                        <a href="#"><?php echo CHtml::image(Yii::app() -> request -> baseUrl . '/images/products/' . $newpro['id_product'] .'/'.$newpro['filename'].'', '',array('style'=>'width:180px;height:240px;'));?></a>
                      </div>  
                      <div class="new-product-info">  
                        <div>
                          <div class="new-product-price">Rp.<?php echo number_format($newpro['price'],0,',','.'); ?></div>
                          <div class="new-product-bg">
                            <div class="newE-product-cart_like">
                              <div class="new-product-cart_like">
                                <div class="new-product-cart"><a href="#"><img alt="" src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/images/new-product/shoping-info/cart-image.png"></a></div>
                                <div class="new-product-like"><a href="#"><img alt="" src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/images/new-product/shoping-info/like-img.png"></a></div>
                              </div>
                            </div>
                            <div class="new-product-details"><?php echo CHtml::link(CHtml::encode("DETAIL"), array('detail', 'id' => $newpro ['id_product'], 'p'=>$newpro ['name_product']),array()); ?></a></div>
                          </div>      
                        </div>
                      </div>
                      <div class="new-product-content">
                        <div class="new-product-title">
                          <a href="#"><p><?php echo $newpro['name_product'];?></p></a>
                        </div>
                      </div>
                    </div>
                  <?php endforeach;?>

                    </div>                
                  </div>
                </div>  
            <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/js/menu/jquery.min.js"></script>
            <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/js/yeah.js"></script>
            <script type="text/javascript">
              $(document).ready(function(){
                $('.related_products').bxSlider({
                slideWidth: 220,
                minSlides: 2,
                maxSlides: 3,
                slideMargin: 18
                });
              });
            </script>
              <script>
        $('.add_to_cart').click(function(){
        /*dapatkan id produk*/
        var id =$(this).attr('id'); 
        $('.tunggu'+id).show();
$('.sip'+id).hide();
        /*fungsi ajax dimainkan*/
        $.ajax({
           /*kirim bermetod post*/
           type:'POST',
           /*load url localhost/ajax/delete/$id*/   
             url:'<?php echo Yii::app()->request->baseUrl;?>/Product/Addtocart/'+id,
             /*fungsi sukses*/
             success:function(){
              $(".tunggu"+id).hide(); 
              $('.sip'+id).show();
              /*load url localhost/ajax/indexproduk*/
              $('#cart').load('<?php echo Yii::app()->request->baseUrl;?>/Product/cart'); 
             }
          });
          return false;
        });
  </script>
          </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  