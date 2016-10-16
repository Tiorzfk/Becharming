<div class="page-content" id="result">
            <div class="page-inner">
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-3 center">
                            <div class="form login-box">
                                <a href="index.html" class="logo-name text-lg text-center">Halaman Administration</a>
                                <p class="text-center m-t-md">Please login into your account.</p>
                                <?php $form = $this -> beginWidget('CActiveForm', 
                                    array('id' => 'login-form', 
                                    'enableClientValidation' => true, 
                                    'clientOptions' => array(
                                    'validateOnSubmit' => true), 
                                    'htmlOptions' => array(
                                    'class' => 'm-t-md',
                                    )));?>
                                    <div class="form-group">
                                        <?php echo $form -> textField($model, 'username',array('class'=>'form-control','placeholder'=>'Username')); ?>
                                        <?php echo $form -> error($model, 'username'); ?>
                                    </div>
                                    <div class="form-group">
                                        <?php echo $form -> passwordField($model, 'password',array('class'=>'form-control','placeholder'=>'Password')); ?>
                                        <?php echo $form -> error($model, 'password'); ?>
                                    </div>
                                    <?php echo CHtml::submitButton('Login',array('id'=>'login','class'=>'btn btn-primary')); ?>
                                    
                                    <div id="loading" style="display:none;"><img src="<?php echo Yii::app()->request->baseUrl;?>/images/loading.gif">Please wait...</div>
                                    <div id="success" style="display:none;">Success...</div>
                                    <a href="forgot.html" class="display-block text-center m-t-md text-sm">Forgot Password?</a>
                                    <p class="text-center m-t-xs text-sm">Do not have an account?</p>
                                    <a href="register.html" class="btn btn-default btn-block m-t-md">Create an account</a>
                                <?php $this->endWidget(); ?>
                                <p class="text-center m-t-xs text-sm">2015 &copy; Modern by Steelcode.</p>
                            </div>
                        </div>
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->
            </div><!-- Page Inner -->
        </main><!-- Page Content -->
<script>
$('#login').click(function () {
     $(this).prop('disabled', true);
     $('#login-form').submit();
});
</script>