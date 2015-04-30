
                        <div class="col-md-6">
                            <div class="panel panel-white">
                                <div class="panel-heading clearfix">
                                    <h4 class="panel-title">Create</h4>
                                </div>
                                <div class="panel-body">
                                    <form action="" method="post" id="myForm">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama</label>
                                            <input type="text" name="nama" class="form-control" placeholder="Enter nama">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Alamat</label>
                                            <textarea type="textarea" name="alamat" class="form-control" placeholder="Alamat"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">No Telp</label>
                                            <input type="text" name="telp" class="form-control" placeholder="Enter telp">
                                        </div>
                                        <div id="idcreate">
                                        <input type="button" class="btn btn-primary" id="create" value="Create">
                                        </div>
                                </div>
                            </div>
                     </form>
<script>
$(document).ready(function(){
    //jika tombol create diklik maka jalankan
    $('#create').click(function(){
        /*set tombol create menjadi disable dan 
        dan bertuliskan loading..*/
        $('#create').attr({
            value : 'loading..',
            disabled : true,
        });
        //tampung data dari form yang berlemen id "myForm"
        var myFormData = $("#myForm").serialize();
        //function ajax
        $.ajax({
            //kirim data dengan type POST
            type:'POST',
            //url yang akan dijalankan localhost/page/create
            url : '<?php echo Yii::app()->request->baseUrl;?>/page/create',
            //data dari myFormData
            data:myFormData,
            //Sukses function dijalankan
            success:function(data){
                //load url localhost/yiinigo/page/table
                $('#table').load('<?php echo Yii::app()->request->baseUrl;?>/page/table');
                   /*set tombol create kembali ke semula (enable 
                   dan bertuliskan Create)*/
                $('#create').attr({
                    value : 'Create',
                    disabled : false,
                });
                //kosongkan form yang berelemen id "myForm"
                $('#myForm')[0].reset();
            }
        });
        return false;
    });
});
</script>

                                </div>
                            </div>
                        </div>

