                        <?php
                        /*digunakan untuk membuat breadcrumbs*/
                            $this -> breadcrumbs = array('Banner',$a );
                            ?>
                        <div class="col-md-2"></div>

                        <div class="col-md-6">
                            <div class="panel panel-white">
                                <div class="panel-heading clearfix">
                                    <h4 class="panel-title"><?php echo $a ?></h4>
                                </div>
                                <div class="form panel-body">
                                    <?php $form=$this->beginWidget('CActiveForm', array(
                                        'id'=>'banner-form',
                                        'enableAjaxValidation'=>true,
                                        'htmlOptions' => array(
                                        'class' => 'form-horizontal',
                                        'enctype' => 'multipart/form-data',
                                     ),
                                        )); ?>
                                        <?php echo $form->errorSummary($model); ?>
                                        <div class="form-group">
                                            <label for="inputText" class="col-sm-4 control-label"><?php echo $form->labelEx($model,'banner'); ?></label>
                                            <div class="col-sm-8">
                                                    <?php if(!empty($model->banner)){?>
                                                    <?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/banner/'.$model->banner.'','banner',array("style"=>"width:93px;" ));}?>

                                                    <?php echo $form->fileField($model, 'banner');?>
                                                    <?php echo $form->error($model, 'banner');?>
                                            </div>
                                            <label for="inputText" class="col-sm-4 control-label"><?php echo $form->labelEx($model,'title'); ?></label>
                                            <div class="col-sm-8">
                                                   <?php echo $form->Textfield($model, 'title',array('required'=>'required','class'=>'form-control','style'=>'width:200px'));?>
                                                    <?php echo $form->error($model, 'title');?>
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