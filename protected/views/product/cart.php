            <div class="cart_info span3">
              <div class="cart_data">Keranjang belanja</div>
              <button class="cart_btn btn btn-navbar" data-toggle="collapse" data-target=".item_cart_wrap"><img alt="" src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/images/shopping_cart_btn_img.png"></button>
              <div class="item_cart_content">
                <div class="item_cart_wrap collapse">
                  <div class="item_cart">
                    <p class="item_cart_products">Products</p>
                 
                    
                    <?php 
                    $i=1;
                     foreach ($model as $data):?>
                   <center>
                      <div class="new-product-area">
                        <ul>
                          <li><p class="new-product-image">
                          <li>
                          <p class="np"><?php echo $data['name_product'];?> X <?php echo $data['qty'];?> </p></li>
                          <?php echo CHtml::image(Yii::app() -> request -> baseUrl . '/images/products/' . $data['id_product'] .'/'.$data['filename'].'', '',array('style'=>'width:50px;height:50px;'));?></p>
                          <li><p class="new-product-remove"><a href="#" class="product-remove" id="<?php echo $data['id_cart'] ?>">Hapus</a></p></li>
                          <div class="new-product-cart" id="loading<?php echo $data['id_cart']?>" style="display:none"><img src="<?php echo Yii::app()->request->baseUrl;?>/images/ajax-loader.gif" width="15px"></div>
                          </li>
                        </ul>
                      </div>
                    <?php $i++; endforeach;?>
                    <p>
                    <?php if($i>1){?>
                  <button type="button" onclick="window.location='<?php echo Yii::app()->request->baseUrl; ?>/cart/finishshop'" class="checkout">Checkout</button>
                  <?php }else{?>
                   <button type="button" onclick="window.location='<?php echo Yii::app()->request->baseUrl; ?>/cart/finishshop'" class="checkout" disabled>Checkout</button>
                   <?php } ?>
                   <button type="button" onclick="window.location='<?php echo Yii::app()->request->baseUrl; ?>/cart/'" class="cart">Cart</button>

                  </div>

                </div>
              </div>
            </div>
    <script>
        $('.product-remove').click(function(){
        /*dapatkan id produk*/
        var id =$(this).attr('id'); 
         $('#loading'+id).show();
        /*fungsi ajax dimainkan*/
        $.ajax({
           /*kirim bermetod post*/
           type:'POST',
           /*load url localhost/ajax/delete/$id*/   
             url:'<?php echo Yii::app()->request->baseUrl;?>/Product/removecart/'+id,
             /*fungsi sukses*/
             success:function(){
               $('#loading'+id).hide();
              /*load url localhost/ajax/indexproduk*/
              $('#cart').load('<?php echo Yii::app()->request->baseUrl;?>/Product/cart'); 
             }
          });
          return false;
        });
  </script>