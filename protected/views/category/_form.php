                        <?php
                        /*digunakan untuk membuat breadcrumbs*/
							$this -> breadcrumbs = array('Category',$a );
							?>
                        <div class="col-md-2"></div>

                        <div class="col-md-6">
                            <div class="panel panel-white">
                                <div class="panel-heading clearfix">
                                    <h4 class="panel-title"><?php echo $a ?></h4>
                                </div>
                                <div class="form panel-body">
                                    <?php $form=$this->beginWidget('CActiveForm', array(
										'id'=>'category-form',
										'enableAjaxValidation'=>true,
										)); ?>
                                        <?php echo $form->errorSummary($model); ?>
                                        <div class="form-group">
                                            <label for="inputText" class="col-sm-4 control-label"><?php echo $form->labelEx($model,'name_category'); ?></label>
                                            <div class="col-sm-8">
												 <?php echo $form->textField($model,'name_category',array('class'=>'form-control','maxlength'=>555)); ?>
                                            	 <?php echo $form->error($model,'name_category'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <div class="checkbox">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-10 col-sm-2">
                                                <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-success')); ?>
                                            </div>
                                        </div>
                                    <?php $this->endWidget(); ?>
                                </div>
                            </div>
                        </div>