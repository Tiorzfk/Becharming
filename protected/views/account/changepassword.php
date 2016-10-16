		<div class="breadcrumbs">
			<div class="container main">
				<ul>
					<li><a href="#">Home</a></li><li>&#47;</li><li><a href="<?php echo $this->createUrl('account/');?>">My Account</a></li>&#47;</li><li class="active"><a href="<?php echo $this->createUrl('account/changepassword');?>">Change Password</a></li>
				</ul>
			</div>	
		</div>	
		<div class="main_content">
			<div class="container main">
			<div class="row">
				<div class="span10 checkout_area">
					<h2 class="title-wrap">
						My Account
					</h2>
					<div class="line"></div>
						<div id="accordion">
							<div>
								<?php $this->renderPartial('_myaccount_menu');?>
							</div>
							<div>
								<div class="delivery_details">
									<h2>Ubah Password Customer</h2>
									<?php $form = $this -> beginWidget('CActiveForm', 
											array('id' => 'customer-form', 
											'enableAjaxValidation' => false, 
											'enableClientValidation' => TRUE, 
											)
										); 
									?>
									<div class="form">	
											<label><small>Current Password<strong>*</strong></small></label>
											<?php echo $form -> hiddenField($model, 'password', array('style' => 'width:400px', 'maxlength' => 35)); ?>
            								<?php echo $form -> passwordField($model, 'oldPassword', array('style' => 'width:600px', 'maxlength' => 35)); ?>
            								<?php echo $form -> error($model, 'oldPassword'); ?>
										
											<label><small>New password<strong>*</strong></small></label>
	 										<?php echo $form -> passwordField($model, 'newPassword', array('style' => 'width:600px', 'maxlength' => 35)); ?>
            								<?php echo $form -> error($model, 'newPassword'); ?>
										
											<label><small>Confirm Password<strong>*</strong></small></label>
            								<?php echo $form -> passwordField($model, 'compareNewPassword', array('style' => 'width:600px', 'maxlength' => 35)); ?>
            								<?php echo $form -> error($model, 'compareNewPassword'); ?>								
										
									</div>
									<?php echo CHtml::submitButton("Ubah Password",array('class'=>'confirm_btn')); ?>
								<?php $this -> endWidget(); ?>
								</div>	
							</div>

						</div>	

				</div>
				<?php $this->renderPartial('_right_menu');?>		
			</div>	
			</div>
			
		</div>