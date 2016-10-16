                        <?php
                        /*digunakan untuk membuat breadcrumbs*/
                            $this -> breadcrumbs = array('Product',$a );
                            ?>
                        <div class="col-md-1"></div>

                        <div class="col-md-10">
                            <div class="panel panel-white">
                                <div class="panel-heading clearfix">
                                    <h4 class="panel-title"><?php echo $a ?></h4>
                                </div>
                                <div class="form panel-body">
                                    <?php $form=$this->beginWidget('CActiveForm', array(
                                        'id'=>'product-form',
                                        'enableAjaxValidation'=>true,
                                        'htmlOptions' => array(
                                        'class' => 'form-horizontal',
                                        'enctype' => 'multipart/form-data',
                                     ),
                                        )); ?>
                                        <?php echo $form->errorSummary($model); ?>
                                        <div class="form-group">
                                            <label for="inputText" class="col-sm-2 control-label"><?php echo $form->labelEx($model,'name_product'); ?></label>
                                            <div class="col-sm-8">
                                                 <?php echo $form->textField($model,'name_product',array('class'=>'form-control','maxlength'=>555)); ?>
                                                 <?php echo $form->error($model,'name_product'); ?>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                           <label for="inputText" class="col-sm-2 control-label"><?php echo $form->labelEx($model,'id_category'); ?></label>
                                           <div class="col-sm-8">
                                           <?php echo $form->dropDownList($model,'id_category', CHtml::listData(Category::model()->findAll(), 'id_category', 'name_category'), array('empty'=>'--please select--','class'=>'js-states form-control','required'));?>
                                           <?php echo $form->error($model,'id_category'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputText" class="col-sm-2 control-label"><?php echo $form->labelEx($model,'price'); ?></label>
                                            <div class="col-sm-8">
                                                 <?php echo $form->textField($model,'price',array('class'=>'form-control')); ?>
                                                 <?php echo $form->error($model,'price'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputText" class="col-sm-2 control-label"><?php echo $form->labelEx($model,'description'); ?></label>
                                            <div class="col-sm-8">
                                                
                                                  <?php echo $form->textArea($model,'description',array('class'=>'summernote')); ?>
                                                 <?php echo $form->error($model,'description'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputText" class="col-sm-2 control-label">Image</label>
                                            <div class="col-sm-8">
                                                
                                                    <?php if($a=='Update'){?>
                                                    <?php
                                                    /*digunakan untuk menampilkan semua image berdasarkan id_product*/
                                                    $sql = "SELECT id_product,filename FROM tb_images LEFT OUTER JOIN tb_product on tb_product.id_image=tb_images.id_image WHERE tb_product.id_image='$image_id'";
                                                    /*digunakan untuk mengkoneksikan ke databse*/
                                                    $conncection = Yii::app() -> db;
                                                    /*membuat command/query*/
                                                    $command = $conncection -> createCommand($sql);
                                                    /*membaca query dan akan dapat di tampilkan semua
                                                     datanya*/
                                                    $image = $command -> queryAll();

                                                        foreach ($image as $images){?>
                                                          <?php echo CHtml::image(Yii::app() -> request -> baseUrl . '/images/products/'.$images['id_product'].'/' . $images['filename'] . '', '',array('style'=>'height:50px;width:50px;')); ?>
                                                        <?php } }?>
                                                        
                                                    <?php
                                                        $this->widget('CMultiFileUpload', array(
                                                            'model'=>$fileimage,
                                                            'name' => 'images',
                                                            'max'=>5,
                                                            'accept' =>'jpg|png|gif',
                                                            'duplicate' => 'Duplicate file!', 
                                                            'denied' => 'Invalid file type',
                                                            'htmlOptions' => array( 'multiple' => 'multiple' ),
                                                        ));  
                                                         echo $form->error($fileimage,'image'); 
                                                    ?>
                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <div class="checkbox">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                        <div class="col-sm-9"></div>
                                             <div class="col-sm-1">
                                                <?php echo CHtml::link('Cancel',array('product/admin'),array('class'=>'btn btn-success'));?>
                                            </div>
                                            <div class="col-sm-2">
                                                <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-success')); ?> 
                                            </div>
                                        </div>
                                    <?php $this->endWidget(); ?>
                                </div>
                            </div>
                        </div>