<?php
/*digunakan untuk membuat breadcrumbs*/
$this -> breadcrumbs = array('Banner', );
?>
                      <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div class="panel panel-white">
                                <div class="panel-heading clearfix">
                                    <h4 class="panel-title">Banner Table</h4>
                                </div>
                                <div class="panel-heading clearfix">
                                <?php echo CHtml::link('Add',array('banner/create'),array('class'=>'btn btn-success btn-rounded btn-sm'));?>
                                </div><br>                                              
                                <div class="panel-body">
                                <div id="loading" style="display:none;"><img src="<?php echo Yii::app()->request->baseUrl;?>/images/loading.gif">.</div>
                                    <div class="table-responsive">
                                        <table id="example" class="display table">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Banner</th>
                                                    <th width="30%">Option</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($model as $banner){
                                            $no=1;?>
                                                <tr>
                                                    <td><?php echo $banner->id;?></td>
                                                    <td><?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/banner/'.$banner['banner'].'','banner',array("style"=>"width:93px;" ));?></td>
                                                    <td>
                                                    <div class="btn-group m-b-sm">
                                                    <a href="<?php echo $this->createUrl('update',array('id'=>$banner->id));?>" class="deletee<?php echo $banner->id;?> btn btn-success btn-sm">Update</a>
                                                    <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    <span class="caret"></span>
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li><a href="<?php echo $this->createUrl('update',array('id'=>$banner->id));?>">Update</a></li>
                                                        <li><a href="#" class="delete" id="<?php echo $banner->id;?>"onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">Delete</a></li>
                                                    </ul>
                                                    </div>
                                                    </td>
                                                </tr>
                                            <?php $no++;}?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

<script src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/backend/plugins/jquery/jquery-2.1.3.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/backend/plugins/datatables/js/jquery.datatables.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/backend/js/pages/table-data.js"></script>

<script>
//delete / jika linkdelete dklik
        $('.delete').click(function(){
          /*dapatkan id produk*/
        var id =$(this).attr('id'); 
              
        $(".deletee"+id).html("Proses..."); 
        $("#loading").show();
          
        /*fungsi ajax dimainkan*/
        $.ajax({
           /*kirim bermetod post*/
           type:'POST',
           /*load url localhost/ajax/delete/$id*/   
             url:'<?php echo Yii::app()->request->baseUrl;?>/Banner/delete/'+id,
             /*fungsi sukses*/
             success:function(data){
             	 $("#loading").hide();
             	  $(".deletee"+id).html("Berhasil..."); 
                /*load url localhost/ajax/indexproduk*/
              $('#data').load('<?php echo Yii::app()->request->baseUrl;?>/Banner/admintable');
             }
          });
          return false;
        });
</script>
