<div class="main_content">

      <div class="container main" id="main-slide">
        <div id="wrapper">
          <div class="slide-content">
            <div class="bounce-slider" id="first">
              <ul>
              <?php
                $criteria = new CDbCriteria( array('limit' => '6','order' => 'date DESC'));
                /*ambil semua data kategori*/
                $model=Banner::model()->findAll($criteria);
                
                foreach ($model as $data):
              ?>
                <li>
                  <p class="bounce-desc right-side"><span><?php echo substr($data['title'],0,20);?> <br/> <?php echo substr($data['title'],20,60);?></span></p>
                  <?php echo CHtml::image(Yii::app() -> request -> baseUrl . '/images/banner/' . $data -> banner .'', '',array('style'=>'width:5000px;height:400px'));?>
              <?php endforeach;?>
              </ul>
              <span class="next bounce-nav"></span> 
              <span class="prev bounce-nav"></span>
            </div>
          </div>
        </div>  

      </div>
      <div class="container main">
        <div class="row home-content">
          <div class="span4 feature-content">
            <div id="feature-image_1">
              <img alt="" src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/images//feature-content/sweater.png">
            </div>
            <div id="feature-post-content_1">
              <ul>
                <li id="feature-post-content-title_1">Sweater</li>
                <li>Up to</li>
                <li><p id="feature-post-content-discount_1">40%</p><p>off</p></li>
              </ul>
              <ul>
                <li><button class="shop-now">Shop Now</button></li>
              </ul>
            </div>
          </div>
          <div class="span4 feature-content">
            <div id="feature-image_2">
              <img alt="" src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/images//feature-content/scarf.png">
            </div>
            <div id="feature-post-content_2">
              <ul>
                <li id="feature-post-content-title_1">Scarf</li>
                <li>Up to</li>
                <li><p id="feature-post-content-discount_2">40%</p><p>off</p></li>
              </ul>
              <ul>
                <li><button class="shop-now">Shop Now</button></li> 
              </ul>
            </div>
          </div>
          <div class="span4 feature-content">
            <div id="feature-image_3">
              <img alt="" src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/images//feature-content/dress.png">
            </div>
            <div id="feature-post-content_3">
              <ul>
                <li id="feature-post-content-title_3">Dress</li>
                <li>Up to</li>
                <li><p id="feature-post-content-discount_3">40%</p><p>off</p></li>
              </ul>
              <ul>
                <li><button class="shop-now">Shop Now</button></li> 
              </ul>
            </div>
          </div>          
        </div>      
        
      </div>
    <div class="container main" id="first-carousel-slide">
        <div class="row list_work">
          <h2 class="title-wrap">
            <span>New Products</span>
          </h2>
          <div class="line"></div>
          <ul id="mycarosel" class="jcarousel-skin-tango item da-thumbs">
            <?php foreach($models as $data):?>
            <li class="span2 new-product"> 
              <div class="new-product-image">        
                <a href="<?php echo $this->createUrl('detail',array('id'=>$data['id_product'],'p'=>$data ['name_product']));?>"><?php echo CHtml::image(Yii::app() -> request -> baseUrl . '/images/products/' . $data ['id_product'] .'/'.$data['filename'].'', '',array("style" => "width:120px;height:150px;"));?></a>
              </div>  
              <div class="new-product-info">  
                <div>
                  <div class="new-product-price">Rp.<?php echo number_format($data['price'],0,',','.');?></div>
                      
                </div>
              </div>
              <div class="new-product-content">
                <div class="new-product-title">
                  <a href="#"><p><?php echo $data ['name_product']; ?></p></a>
                </div>
                <div class="new-product-content">
                  <p><?php echo substr($data['description'],0,20); ?></p>
                </div>
              </div>
            </li>   
            <?php endforeach;?> 
          </ul>
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
  
      

      <div class="container main" id="second-carousel-slide">
        <div class="row">
        <div class="span8 p_product">
          <div class="list_work">
            <h2 class="title-wrap">
              <span>Popular Productss</span>
            </h2>
            <div class="line"></div>
            <div class="slider2 popular_product">
            <ul class='row slide popular_product_wrap-left'>
             <?php $i=1; foreach($popro as $popro):?>
                <li class="span4 popular_pro">
                  <div class="popular_pro_image"> 
                    <?php echo CHtml::image(Yii::app() -> request -> baseUrl . '/images/products/' . $popro['id_product'].'/'.$popro['filename'] .'', '',array("style" => "width:200px;height:190px;"));?>
                  </div>
                  <div class="popular_pro_info">
                    <p class="popular_pro_title"><?php echo $popro['name_product'];?><strong> <div style="display:none;" class="tunggu<?php echo $popro['id_product'];?>">*Please Wait ...</div><div style="display:none;" class="sip<?php echo $popro['id_product'];?>">*Product Telah ditambahkan .</div></strong></p>
                    <p class="popular_pro_content"><?php echo substr($popro['description'],0,120); ?></p>
                    <div class="popular-product-info">  
                      <div>
                        <div class="popular-product-price">Rp.<?php echo number_format($popro['price'],0,',','.');?></div>
                        <div class="popular-product-bg">
                          <div class="popular-product-cart_like">
                            <div class="popular-product-cart_like">
                              <div class="popular-product-cart" id="popcart<?php echo $popro['id_product']?>">
                                <a href="#" id="<?php echo $popro['id_product']?>" class="popproduct-cart">
                                <img alt="" src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/images/new-product/shoping-info/cart-image.png">
                                </a>
                              </div>
                              <div class="popular-product-cart" style="display:none;" id="poploading<?php echo $popro['id_product']?>"><img src="<?php echo Yii::app()->request->baseUrl;?>/images/ajax-loader.gif" width="20px"></div>
                              <div class="popular-product-like"><img alt="" src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/images/new-product/shoping-info/like-img.png"></div>
                            </div>
                          </div>
                          <div class="popular-product-details"><?php echo CHtml::link(CHtml::encode("DETAIL"), array('detail', 'id' => $popro ['id_product'], 'p'=>$popro ['name_product']),array()); ?></div>
                        </div>      
                      </div>
                    </div>
                  </div>
                </li>
                <?php if ($i % 2 === 0) echo '</ul><ul class="row slide popular_product_wrap-left">'; $i++;endforeach;?>
                 
              </ul>
          
             
            </div>
  
          </div>
          <br/>
        </div>
        <div class="span4 feature_product">
          <div class="list_work">
            <h2 class="title-wrap">
              <span>Random Products</span>
            </h2>
            <div class="line"></div>
            <div class="fslide">
              <ul class="bxslider">
              <?php foreach($randpro as $randpro):?>
                <li class="feature_pro">
                  <div class="feature_pro_image"> 
                  <a href="<?php echo $this->createUrl('detail',array('id'=>$randpro['id_product'],'p'=>$randpro ['name_product']));?>">
                    <?php echo CHtml::image(Yii::app() -> request -> baseUrl . '/images/products/' . $randpro['id_product'].'/'.$randpro['filename'] .'', '',array("style" => "width:103px;height:110px;"));?>
                  </a>
                  </div>
                  <div class="feature_pro_info">
                    <p class="feature_pro_title"><?php echo $randpro['name_product'];?></p>
                    <p class="feature_pro_content"><?php echo substr($randpro['description'],0,60); ?></p>
                    <button class="feature_pro_price">Rp.<?php echo number_format($randpro['price'],0,',','.');?></button>
                  </div>                  
                </li>
              <?php endforeach; ?>
              </ul>
            </div>
</div>
          </div>
        </div>
        
        </div>
      </div>  
    </div>
      <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/js/menu/jquery.min.js"></script>
      <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/js/yeah.js"></script>
    <script>
        $('.popproduct-cart').click(function(){
        /*dapatkan id produk*/
        var id =$(this).attr('id'); 
        $('.sip'+id).hide();
        $('.tunggu'+id).show();
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
            <script>
        $('.puproduct-cart').click(function(){
        /*dapatkan id produk*/
        var id =$(this).attr('id'); 
        $('.sipah'+id).hide();
        $('.tungguye'+id).show();
        /*fungsi ajax dimainkan*/
        $.ajax({
           /*kirim bermetod post*/
           type:'POST',
           /*load url localhost/ajax/delete/$id*/   
             url:'<?php echo Yii::app()->request->baseUrl;?>/Product/Addtocart/'+id,
             /*fungsi sukses*/
             success:function(){
              $(".tungguye"+id).hide(); 
              $('.sipah'+id).show();
              /*load url localhost/ajax/indexproduk*/
              $('#cart').load('<?php echo Yii::app()->request->baseUrl;?>/Product/cart'); 
             }
          });
          return false;
        });
  </script>
