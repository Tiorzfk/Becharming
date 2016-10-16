<?php
/*digunakan untuk membuat breadcrumbs*/
$this -> breadcrumbs = array('Product', );
?>
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-heading clearfix">
                                    <h4 class="panel-title">Product Table</h4>
                                </div>
                                <div class="panel-heading clearfix">
                                <?php echo CHtml::link('Add',array('product/create'),array('class'=>'btn btn-success btn-rounded btn-sm'));?>
                                </div><br>
                                <div class="panel-body">
                                 <div id="loading" style="display:none;"><img src="<?php echo Yii::app()->request->baseUrl;?>/images/loading.gif">.</div>
                                    <div class="table-responsive">
                                        <table id="example" class="display table">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Product</th>
                                                    <th>Category</th>
                                                    <th>Price</th>
                                                    <th>Image</th>
                                                    <th width="30%">Option</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($model as $product){?>
                                                <tr>
                                                    <td><?php echo $product->id_product;?></td>
                                                    <td><?php echo $product->name_product;?></td>
                                                    <td><?php echo $product->category->name_category;?></td>
                                                    <td><?php echo $product->price_product;?></td>
                                                    <td>
                                                    <?php
                                                        $sql = "SELECT id_product,filename FROM tb_images LEFT OUTER JOIN tb_product on tb_product.id_image=tb_images.id_image WHERE tb_product.id_image='$product->id_image'";
                                                        /*digunakan untuk mengkoneksikan ke databse*/
                                                        $conncection = Yii::app() -> db;
                                                        /*membuat command/query*/
                                                        $command = $conncection -> createCommand($sql);
                                                        /*membaca query dan akan dapat di tampilkan semua
                                                         datanya*/
                                                        $model2 = $command -> queryAll();

                                                        foreach ($model2 as $image){?>
                                                          <?php echo CHtml::image(Yii::app() -> request -> baseUrl . '/images/products/'.$image['id_product'].'/' . $image['filename'] . '', '',array('style'=>'height:50px;width:50px;')); ?>
                                                        <?php } ?>
                                                    </td>
                                                   <td>
                                                    <div class="btn-group m-b-sm">
                                                    <a href="<?php echo $this->createUrl('desc',array('id'=>$product['id_product']));?>" class="deletee btn btn-success btn-sm">Detail</a>
                                                    <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    <span class="caret"></span>
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li><a href="<?php echo $this->createUrl('update',array('id'=>$product->id_product));?>">Update</a></li>
                                                        <li><a href="<?php echo $this->createUrl('delete',array('id'=>$product->id_product));?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">Delete</a></li>
                                                    </ul>
                                                    </div>
                                                    </td>
                                                </tr>
                                            <?php }?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
<script src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/backend/plugins/jquery/jquery-2.1.3.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/backend/plugins/datatables/js/jquery.datatables.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/backend/js/pages/table-data.js"></script>
