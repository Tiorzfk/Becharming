
                     
                        <div class="col-md-6">
                            <div class="panel panel-white">
                                <div class="panel-heading clearfix">
                                    <h4 class="panel-title">Tabel</h4><br>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nama</th>
                                                    <th>Alamat</th>
                                                    <th>No Telp</th>
                                                    <th>&nbsp;</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($dataPegawai as $pegawai){?>
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td><?php echo $pegawai -> nama;?></td>
                                                    <td><?php echo $pegawai -> alamat;?></td>
                                                    <td><?php echo $pegawai -> telp;?></td>
                                                    <td>
                                                    <a href="#" class="update btn btn-info" id="<?php echo $pegawai->id;?>">Update</a>
                                                    <a href="#" class="delete btn btn-info" id="<?php echo $pegawai->id;?>">Delete</a>
                                                    </tr>
                                            <?php }?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
<script>
    $(document).ready(function(){

        //update, ketika link update diklik
        $('.update').click(function(){
            /*ambil nilai dari attribute id yang ada di link 
              update*/
            var id =$(this).attr('id'); 
            /*load form update dengan parampeter id
            http://localhost/yiinigo/ajax/update/$id*/      
             $('#form').load('<?php echo Yii::app()->request->baseUrl;?>/page/update/'+id);
            return false;
        });
        
        //delete / jika linkdelete dklik
        $('.delete').click(function(){
          /*dapatkan id produk*/
        var id =$(this).attr('id'); 
        /*fungsi ajax dimainkan*/
        $.ajax({
           /*kirim bermetod post*/
           type:'POST',
           /*load url localhost/ajax/delete/$id*/   
             url:'<?php echo Yii::app()->request->baseUrl;?>/page/delete/'+id,
             /*fungsi sukses*/
             success:function(data){
                /*load url localhost/ajax/indexproduk*/
              $('#table').load('<?php echo Yii::app()->request->baseUrl;?>/page/table');
             }
          });
          return false;
        });

    });
</script>
