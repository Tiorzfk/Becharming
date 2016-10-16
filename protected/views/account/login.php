<div class="breadcrumbs">
			<div class="container main">
				<ul>
					<li><a href="#">Home</a></li><li>&#47;</li><li class="active"><a href="<?php echo $this->createUrl('account/login');?>">Login</a></li>
				</ul>
			</div>	
		</div>	

		<div class="main_content">
			<div class="container main">
			<div class="row">
				<div class="span10 checkout_area">
					<h2 class="title-wrap">
						Login
					</h2>
					<div class="line"></div>
					<?php if(Yii::app()->user->hasFlash('success')):?>
					<div class="alert alert-success" role="alert">
                       <h5><?php echo Yii::app()->user->getFlash('success'); ?>.</h5>
                    </div>
					<?php endif; ?>
						<div id="accordion">
							<h3><span>Login</span></h3>
							<div class="row">
							<div class="checkout_info">
								<div class="span4 new_customer">
									<h2>Customer</h2>
									<p>Silahkan login, jika anda sudah memiliki account.</p>
								</div>
								<div class="span4 returning_customer">
									<h2>Login</h2>
									<div class="customer_select">
										<?php $form = $this -> beginWidget('CActiveForm', 
											array('id' => 'login-form', 
											'enableClientValidation' => true, 
											'clientOptions' => array(
												'validateOnSubmit' => true, 
											),
										  )
										); 
										?><div class="form">
										<?php echo $form -> errorSummary($model); ?>
											<p>
												<label><small>Email<strong>*</strong></small></label>											
												<?php echo $form -> textField($model, 'email'); ?>
												<?php echo $form -> error($model, 'email'); ?>
											</p>

											<p>
												<label><small>Password<strong>*</strong></small></label>												
												<?php echo $form -> passwordField($model, 'password'); ?>
												<?php echo $form -> error($model, 'password'); ?>
											</p>
											</div>
									</div>	
									<p>
										<?php echo $form -> checkBox($model, 'rememberMe'); ?>
										<?php echo $form -> label($model, 'rememberMe'); ?>
										<?php echo $form -> error($model, 'rememberMe'); ?>
									</p>

									<?php echo CHtml::submitButton('Login',array('class'=>'register')); ?>
								</div>
								<?php $this -> endWidget(); ?>
							</div>
							</div>
							<h3><span>Daftar Account Baru</span></h3>
							<div>
								<div class="delivery_details">
									<h2>Daftar</h2>
									<p>Silahkan buat account, jika anda belum memiliki account . </p>
									<?php $form = $this -> beginWidget('CActiveForm', 
        								array('id' => 'customer-form', 
        									'enableAjaxValidation' => false,
        									'enableClientValidation'=>TRUE, 
										)); ?>
										<div class="form">
										<?php echo $form -> errorSummary($modelcos); ?>
											<label><small>Name Lengkap<strong>*</strong></small></label>
            								<?php echo $form -> textField($modelcos, 'customer_name', array('maxlength' => 57,'class'=>'width','style'=>'width:500px;')); ?>
            								<?php echo $form -> error($modelcos, 'customer_name'); ?>				
										
											<label><small>Email<strong>*</strong></small></label>
											<?php echo $form -> emailField($modelcos, 'email', array('maxlength' => 45,'class'=>'width','style'=>'width:500px;')); ?>
            								<?php echo $form -> error($modelcos, 'email'); ?>
										
											<label><small>Password<strong>*</strong></small></label>
											<?php echo $form -> passwordField($modelcos, 'password', array('maxlength' => 35,'class'=>'width','style'=>'width:500px;')); ?>
            								<?php echo $form -> error($modelcos, 'password'); ?>

											<label><small>Confirm Password<strong>*</strong></small></label>
											<?php echo $form -> passwordField($modelcos, 'comparePassword', array('maxlength' => 35,'class'=>'width','style'=>'width:500px;')); ?>
            								<?php echo $form -> error($modelcos, 'comparePassword'); ?>
            							</div>
				
									<?php echo CHtml::submitButton("Register",array('class'=>'confirm_btn')); ?>
									<?php $this -> endWidget(); ?>
									  	
								</div>	
							</div>

						</div>	

				</div>
				<div class="span2 widget-area">
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
							<div class="widget-title">Page</div>
							<div class="line"></div>
						<div class="fb-page" data-href="https://www.facebook.com/yii.indonesia/?fref=nf" data-width="270" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/yii.indonesia/?fref=nf"><a href="https://www.facebook.com/yii.indonesia/?fref=nf">Indonesia Yii Framework community</a></blockquote></div></div>
  						</div>
            			
						
					</div>	
				</div>				
			</div>	
			</div>
			
		</div>