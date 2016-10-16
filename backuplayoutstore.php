<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="initial-scale=1, maximum-scale=1" />
    <meta name="viewport" content="width=device-width" />
    <link rel="apple-touch-icon" href="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/icon.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/icon.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/icon.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/icon.png">
    <link rel="icon" type="image/x-icon" href="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/icon.png"/>
    <title>Fashion</title>
  
  <!-- Font CSS Link -->
    <link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
  <!-- Font CSS Link -->  
    
  <!-- Start CSS Link -->
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/css/bootstrap.css" type="text/css" media="all" />
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/css/responsive.css" type="text/css" media="all" />
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/css/main.css" type="text/css" media="all" />
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/css/custom_responsive.css" type="text/css" media="all" />
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/css/menu.css" type="text/css" media="all" />
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/css/supermenu.css" type="text/css" media="all" />
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/css/bounce_slider.css" type="text/css" media="all" />
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/css/jcarousel.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/css/jquery.bxslider.css" type="text/css" media="screen" /> 
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/css/grid-list.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/css/accrodin.css" type="text/css"/>
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/css/ui.css" type="text/css"/>
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/css/jquery.jqzoom.css" type="text/css"/>
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/css/submenu.css" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
  <!-- End CSS Link -->
  <style type="text/css">
.fixed {
  position: fixed; 
  top: 0; 
  margin-left: 20px;
  width: 1350px;
  z-index: 100000000000;
}
  </style>

  </head>
  <body>
  <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    <div class="header">
      <div class="container main">
          <div class="row">
          <div class="header_top">
            <div class="currency_translator span5"> 
              <div class="currency">
                
              </div>
                    
            </div>
            <div class="account_login span7">
            
              <ul class="account_info">
              <?php
              if(isset(Yii::app()->user->customerName)){?>
              <li><a href="<?php echo $this->createUrl('account/');?>"><img alt="" src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/images/my_account.png">MY ACCOUNT (<?php echo Yii::app()->user->customerName?>)</a></li>
              <?php } ?>
                <li><a href="<?php echo $this->createUrl('cart/');?>"><img alt="" src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/images/shopping_cart.png"> MY CART</a></li>
                <li><a href="<?php echo $this->createUrl('cart/');?>"><img alt="" src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/images/checkout.png"> MY CHECKOUT</a></li>
              <?php if(isset(Yii::app()->user->customerLogin)){?>
                <li><a href="<?php echo $this->createUrl('account/logout');?>"><img alt="" src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/images/log_out.png">LOGOUT</a></li>
                <?php }else{ ?>
                <li><a href="<?php echo $this->createUrl('account/');?>"><img alt="" src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/images/log_out.png"> LOGIN</a></li>
                <?php } ?>
              </ul>
            
            </div>
          </div>
          </div>
          <div class="row">
          <div class="header_top">
            <div class="span3">
              <a href="../">
                <div class="logo"></div>
              </a>
            </div>
            <div class="call_info span5">
 <p>SELAMAT DATANG DI :<span class="color"><font size="3px">BECHARMING FASHION</font></span></p>
 
              <p>PHONE: <span class="color">085793009996</span></p>
              <p>Call us Monday - Saturday: 7:00 am - 22:00 pm</p>
            </div>
            <div id="cart"></div>
              <?php 
              Yii::app() -> clientScript -> registerCoreScript('jquery', CClientScript::POS_BEGIN);?>
              <script>
              $(document).ready(function(){
              $('#cart').load('<?php echo Yii::app()->request->baseUrl;?>/Product/cart');
              });
              </script>
          </div>
          </div>
        
      </div>
    </div>
      
    <div class="navigation navbar">
      
      <div class="row">
        <div id="wrapper">
          <nav role="navigation" id="access" >
          <a class="skip-link icon-reorder" title="Accéder au menu" href="#menu">Category</a>
            <ul id="menu">
                  <?php
                      $criteria = new CDbCriteria( array('limit' => '15'));
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
                  ?></li>
                <?php endforeach;?>
                </ul>
          </nav>
          </div>
        </div>
        <div class="navbar">
          <div class="container main">
   
          <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </a>
          <!-- Be sure to leave the brand out there if you want it shown -->
   
          <!-- Everything you want hidden at 940px or less, place within here -->
            <div class="nav-collapse collapse">
            <!-- .nav, .navbar-search, .navbar-form, etc -->
              <ul class="sf-menu">
                <li class="deeper parent current"><a href="<?php echo $this->createUrl('./');?>">Home</a></li>
                <li><a href="<?php echo $this->createUrl('content/about_us');?>">About Us</a></li>
                <li><a href="<?php echo $this->createUrl('product/all/');?>">Product</a></li>
                <li ><a href="<?php echo $this->createUrl('content/cara_order');?>">How to Order</a></li>
                <li><a href="<?php echo $this->createUrl('content/cek_ongkir');?>">Cek Ongkir</a></li>
                <li><a href="<?php echo $this->createUrl('content/contact_us');?>">Contact Us</a></li> 
              </ul>
              <div class="search">
              <form action="<?php echo $this->createUrl('product/search');?>" method="post">
              <div style="display:none">
              <select class="select_color" name="Search[category]">
                <option value="all-categories">All Categories</option>
              </select>
              </div>
                <input type="search" name="Search[keyword]" placeholder="Search Name Product">
                <input type="hidden" name="all">
                  <button class="search_btn">
                    <input type="image" src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/images/icon_search.png">
                  </button>
                </form>
              </div>

            </div>
          
          </div>
        </div>
      </div>
      
    </div>
      
    <?php echo $content?>
      
    <div class="contact_info">
      <div class="container main">
        <ul class="row">
          <li class="follow-us span4">
            <div class="follow-social">Follow us on:</div>
            <div class="social-icon">
              <ul>
                <li class="fb">
                  <a href="https://web.facebook.com/elis.handayani.16?fref=ts" target="_blank"><img alt="" src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/images/social/facebook.png"></a>
                </li>
                <li class="tw">
                  <a href="#"><img alt="" src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/images/social/twitter.png"></a>
                </li>
                <li class="rss">
                  <a href="#"><img alt="" src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/images/social/rss.png"></a>
                </li>
                <li class="yt">
                  <a href="#"><img alt="" src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/images/social/youtube.png"></a>
                </li>
              </ul>
            </div>
          </li>
          <li class="span4">
          <div class="free-shipping">
            <div class="free-shipping-wrap">
              <div class="free-shipping-image">
                <img alt="" src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/images/social/shiping-truck.png">
              </div>
              <div class="free-shipping-info">
                <div id="free-shipping-info-title">
                Pengiriman

                </div>
                <div id="free-shipping-info">
                  Cepat & Aman.
                </div>
              </div>
            </div>  
          </div>  
          </li>
          <li class="contact-no span4">
            <div class="contact-no-wrap">
              <div class="contact-no-image">
                <img alt="" src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/images/social/telephone.png">
              </div>
              <div class="contact-no-info">
                <div id="contact-no-info-title">
                  Order Online
                </div>
                <br/>
                <div id="contact-no-info">
                  <p>Phone:</p>
                  <p id="nb">085793009996</p>
                </div>
              </div>
            </div>
          </li>
        </ul> 
      </div>

    </div>
    
    <div class="footer">
      <div class="footer-top">
        <div class="container main" id="footer-top">
          <br/>
          <div class="row">
            <div class="span3 footer-col">
              <div class="widget-info">
                <div class="widget-title">About Us</div>
                <div class="line"></div>
                <div class="widget-content">
                  <p><b><u>Becharming Fasion</u></b> adalah Toko Online yang berlokasi di kota Bandung, kami menyediakan aneka fashion dan perlengkapan lainnya yang pastinya dengan
                kualitas yang terjamin dan harga terjangkau.</p>
                </div>
              </div>
            </div>
            <div class="span3 footer-col">
              <div class="widget-info">
                <div class="widget-title">Informasi</div>
                <div class="line"></div>
                <div class="widget-content">
                  <ul>
                    <li><a href="<?php echo $this->createUrl('content/about_us');?>">About Us</a></li>
                    <li><a href="<?php echo $this->createUrl('content/cara_order');?>">How to order</a></li>
                    <li><a href="#">Contact Us</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="span3 footer-col">
              <div class="widget-info">
                <div class="widget-title">Layanan</div>
                <div class="line"></div>
                <div class="widget-content">
                  <ul>
                    <li><a href="<?php echo $this->createUrl('content/Shipping_delivery');?>">Shipping-Delivery</a></li>
                    <li><a href="<?php echo $this->createUrl('content/Returns_exchanges');?>">Return & Exchanges</a></li>
                    <li><a href="<?php echo $this->createUrl('content/Cek_ongkir');?>">Cek Ongkir & Resi</a></li>
                    <li><a href="#">Reseller</a></li>
                    <li><a href="#">Group Sales</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="span3 footer-col">
              <div class="widget-info">
                <div class="widget-title">Account Saya</div>
                <div class="line"></div>
                <div class="widget-content">
                  <ul>
                    <li><a href="<?php echo $this->createUrl('account/changepassword');?>">Ganti Password</a></li>
                    <li><a href="<?php echo $this->createUrl('account/orders');?>">Order Status</a></li>
                    <li><a href="<?php echo $this->createUrl('cart/');?>">View cart</a></li>
                    <li><a href="<?php echo $this->createUrl('account/address');?>">My address</a></li>
                    <li><a href="<?php echo $this->createUrl('account/logout');?>">Logout</a></li>
                  </ul>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
      <div class="footer-bottom">
        <div class="container main" id="footer-bottom">
          <div class="row">
            <div class="span8 footer-col">
              Copyright &#169; 2015 <a href="#">Be Charming</a>. All rights reserved.
            </div>
            <div class="span4 footer-col">
              <ul>
                <li><a href="#"><img alt="" src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/images/share_it/icon-jne.png" style="width:50px;height:30px"></a></li>
                <li><a href="#"><img alt="" src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/images/share_it/icon-mandiri.png" style="width:50px;height:30px"></a></li>
                <li><a href="#"><img alt="" src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/images/share_it/icon-tiki.png" style="width:50px;height:30px"></a></li>
                <li><a href="#"><img alt="" src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/images/share_it/logo_bca.png" style="width:50px;height:30px"></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  <!-- Start JS Link -->

    <script type="text/javascript">
    ;(function($) {
    "use strict";
    $(document).ready(function() {
        $('#access').on('touchstart click', '.skip-link', function(event) {
            $(this).toggleClass('focus');
            $($(this).attr('href')).toggleClass('target');
            event.preventDefault();
        }).find('.skip-link').append('<span>'+$('#menu .active').text()+'</span>');
    });
})(jQuery);
</script>
  <script>
   $(document).ready(function(){
     $(window).bind('scroll', function() {
     var navHeight = $( window ).height() - 530;
       if ($(window).scrollTop() > navHeight) {
         $('#access').addClass('fixed');
       }
       else {
         $('#access').removeClass('fixed');
       }
    });
  });
</script>

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/js/menu/superfish.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/js/bounceslider/modernizr.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/js/bounceslider/jquery.bounceslider.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/js/new-product-js/jquery.jcarousel.min.js"> </script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/js/new-product-js/responsiveslides.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/js/bxslider/jquery.bxslider.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/js/bxslider/jquery.bxslider.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/js/jquery.mixitup.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/js/mixitup/jquery-ui.sortable.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/js/mixitup/jquery.ui.touch-punch.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/js/mixitup/jquery.mixitup.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/js/mixitup/mixitop-inline.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/js/mixitup/ga.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/js/mixitup/cloudflare.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/js/contact_form/jquery.form.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/js/contact_form/init_form.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/js/jquery-ui.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/js/zoom/jquery.jqzoom-core.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/js/bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/js/custom.js"></script>
  <!-- End JS Link -->    
  </body>
</html>