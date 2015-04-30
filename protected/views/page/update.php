
                        <div class="col-md-6">
                            <div class="panel panel-white">
                                <div class="panel-heading clearfix">
                                    <h4 class="panel-title">Update</h4>
                                </div>
                                <div class="panel-body">
                                    <form action="" method="post" id="myForm">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama</label>
                                            <input type="text" name="nama" class="form-control" value="<?php echo $pegawai['nama'];?>" placeholder="Enter nama">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Alamat</label>
                                            <textarea type="textarea" name="alamat" class="form-control" placeholder="Alamat"><?php echo $pegawai['alamat'];?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">No Telp</label>
                                            <input type="text" name="telp" class="form-control" value="<?php echo $pegawai['telp'];?>" placeholder="Enter telp">
                                        </div>
                                        <input type="button" id="save" class="btn btn-primary" value="Update">
                                        <input type="hidden" id="id" value="<?php echo $pegawai['id'];?>" />
                                    </form>
                                </div>
                            </div>
                        </div>
<script>
$(document).ready(function(){   
    /*jika tombol save diklik*/
    $('#save').click(function(){
        /*ambil id */
        var id = $('#id').val();
        /*set disable tombol save dan berlable loading..*/
        $('#save').attr({
            value : 'loading..',
            disabled : true,
        });
        
        /*ambil data dari form*/
        var myFormData = $("#myForm").serialize();
        
        /*fungsi ajax dimainkan*/
        $.ajax({
            /*bertype POST*/
            type:'POST',
            /*gunakan url localhost/yiinigo/ajax/update/$id*/
            url : '<?php echo Yii::app()->request->baseUrl;?>/page/update/'+id,
            /*bawa data dari form*/
            data:myFormData,
            /*sukses*/
            success:function(data){
                /*load url localhost/yiinigo/ajax/indexpegawai*/
                $('#table').load('<?php echo Yii::app()->request->baseUrl;?>/page/table');
                /*set tombol save kembali enable dan berlabel update*/
                $('#save').attr({
                    value : 'Update',
                    disabled : false,
                });
                /*load kembali form create data*/
                $("#form").load('<?php echo Yii::app()->request->baseUrl;?>/page/create');
            }
            
        });
        /*agar browser tidak refresh*/
        return false;
    });
    
    
});
    
</script> 

