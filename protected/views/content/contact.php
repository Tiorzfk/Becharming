
		<div class="breadcrumbs">
			<div class="container main">
				<ul>
					<li><a href="<?php echo $this->createUrl('./');?>">Home</a></li><li>&#47;</li><li class="active"><a href="<?php echo $this->createUrl('content/contact');?>">Contact US</a></li>
				</ul>
			</div>	
		</div>	
	
		<div class="main_content">
			<div class="container main">
				<div class="row">
				
					<div class="span9 comment_area">
					<h2 class="title-wrap">
						Contact 
					</h2>
					<div class="line"></div>
					<div class="comment_contentp">	
					<?php if(Yii::app()->user->hasFlash('contact')): ?>
						<div class="alert alert-success" role="alert">
							<h5><?php echo Yii::app()->user->getFlash('contact'); ?></h5>
						</div>
					<?php endif;?>
					<strong>
						<p>Anda Bisa Langsung Menghubungi kami:</p>
						<p>1. No HP: 08579300996</p>
						<p>2. PIN: 57BC3F0F/2943D3CG</p>
						<p>3. LINE: elish31</p>
						<p>Atau Bisa Mengisi Form Dibawah Ini:</p>
					</strong>
					</div>	
					<div id="commentform">
					<?php $form=$this->beginWidget('CActiveForm', array(
						'id'=>'contact-form',
						'enableClientValidation'=>true,
						'clientOptions'=>array(
						'validateOnSubmit'=>true,
					),
				)); ?>
                        <div class="form">

							<p><?php echo $form->textField($model,'name',array('class'=>'form-control','maxlength'=>20)); ?>
                            <?php echo $form->error($model,'name',array('style'=>'margin-top:200px')); ?></p>
							<label><small>Name<strong>*</strong></small></label>

							<p><?php echo $form->textField($model,'email',array('class'=>'form-control','maxlength'=>20)); ?>
                               <?php echo $form->error($model,'email',array('style'=>'margin-top:30px')); ?>
							<label><small>Email<strong>*</strong></small></label></p>
							
							<p><?php echo $form->textField($model,'phone',array('class'=>'form-control','maxlength'=>20)); ?>
                               <?php echo $form->error($model,'phone',array('style'=>'margin-top:30px')); ?>
							<label><small>Phone</small></label></p>

							<p><?php echo $form->textField($model,'subject',array('class'=>'form-control','maxlength'=>20)); ?>
                               <?php echo $form->error($model,'subject',array('style'=>'margin-top:30px')); ?>
							<label><small>Subject</small></label></p>

							<p><?php echo $form->textArea($model,'message',array('class'=>'form-control','maxlength'=>555,'placeholder'=>'MESSAGE HERE')); ?>
                                <?php echo $form->error($model,'message'); ?></p>
                            <?php if(CCaptcha::checkRequirements()): ?>
							<div class="row">
								<?php echo $form->labelEx($model,'verifyCode'); ?>
								<div>
								<?php $this->widget('CCaptcha'); ?>
								<?php echo $form->textField($model,'verifyCode'); ?>
								</div>
								<div class="hint">Please enter the letters as they are shown in the image above.
								<br/>Letters are not case-sensitive.</div>
								<?php echo $form->error($model,'verifyCode'); ?>
							</div>
							<?php endif; ?>
							<p><?php echo CHtml::submitButton($model->isNewRecord ? 'Kirim' : 'Save',array('class'=>'submitButton','id'=>'login')); ?></p>

						</div>
						<?php $this->endWidget(); ?>
						
						<p id="success">Your message has been sent, thank you!</p>
					</div>
				</div>
				
		</div></div>
		 <script>
		 $('#login').click(function () {
     $(this).prop('disabled', true);
     $('#contact-form').submit();
});
</script>
