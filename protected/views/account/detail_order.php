		<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/js/jquery-2.1.3.min.js"></script>


<style>
	.grid-view {
		margin-left: 5px !important;
	}
	.summary {
		display: none !important;
	}
	.grid-view table {
		width: 100%;
	}
	.grid-view table th {
		color: #ffffff;
		padding: 3px 3px
	}
	.grid-view table td {
		padding: 3px 3px
	}
	.grid-view table.items [id*="order-grid"] {
		background: #696969 !important;
	}
	.grid-view table.items tr.odd {
		background: #EDE3E3 !important;
	}
	.grid-view table.items tr.even {
		background: #faeaea !important;
	}
	.grid-view table.items tr > td > a {
		text-decoration: none;
		color: black;
	}
	.grid-view table.items tr > td > a:hover {
		text-decoration: underline;
		color: #745151;
	}
</style>
<div class="breadcrumbs">
			<div class="container main">
				<ul>
					<li><a href="#">Home</a></li><li>&#47;</li><li><a href="<?php echo $this->createUrl('account/');?>">My Account</a></li>&#47;</li><li class="active"><a href="<?php echo $this->createUrl('account/orders');?>">Detail Orders</a></li>
				</ul>
			</div>	
		</div>	

		<div class="main_content">
			<div class="container main">
			<div class="row">
				<div class="span10 checkout_area">
					<h2 class="title-wrap">
						My Account
					</h2>
					<div class="line"></div>
					<div id="accordion">
					<div>
						<?php $this->renderPartial('_myaccount_menu');?>
					</div>
					<div class="row">
					<div class="delivery_details">
					
<div style="padding:5px 10px 0 0;margin:5px 5px 15px 5px; border:1px solid #CCC;text-align: justify;">
	<strong style="margin-left:4px;float:left;padding: 0 0 15px 0;">
		<h5><font color="#696969">Hallo </font></h5>
		<h5><font color="#689384" style="text-transform: uppercase;"><?php echo $dataOrder['customer_name']; ?>,</font></h5>
		<br><h5><font color="#696969">berikut data order anda dengan 
		Nomor Pemesanan </font><font color="#689384"><?php echo $dataOrder['order_code']; ?></font></h5></strong>

 		<!--/untuk informasi sudah dikonfirmasi atau belum-->
 <div style="clear: left;"></div>
	<!--data pemesan-->
	<table>
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><?php echo $dataOrder['customer_name']; ?></td>
		</tr>
		<tr>
			<td>Nomor Pemesanan</td>
			<td>:</td>
			<td><?php echo $dataOrder['order_code']; ?></td>
		</tr>
		
		<tr>
			<td>Tanggal Order</td>
			<td>:</td>
			<td><?php echo date('d F Y', strtotime($dataOrder['order_date'])); ?></td>
		</tr>
		<tr>
			<td>Bank Transfer</td>
			<td>:</td>
			<td><?php echo $dataOrder['bank_transfer']; ?></td>
		</tr>
		<tr>
			<td><font color="red">Nomor Resi Anda</font></td>
			<td>:</td>
			<td><?php if($dataOrder['payment_status']==1){
						if(empty($dataOrder['no_resi'])){
						 echo '--'; 
						}else{
						 	echo "<font color='red'>".$dataOrder['no_resi']."</font>";
						}
					}else{echo"-";}?></td>
		</tr>
	</table>	 
	<!--/data pemesan-->

	<div style="clear: both;">
		&nbsp;
	</div>
	<!--data detail order-->
	<div id="order-grid" class="grid-view">
		<table class="items">
			<thead>
				<tr>
					<th id="order-grid">No.</th>
					<th id="order-grid">Nama Produk</th>
					<th id="order-grid">Harga</th>
					<th id="order-grid">Jumlah</th>
					<th id="order-grid">Sub Total</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach($orderDetail as $key=>$detail):
				$class = ($key+1)%(2) ==0 ? 'even' : 'odd';
				$subtotal = $detail['price']*$detail['qty'];
				$grandtotal +=$subtotal; 
				?>
				<tr class="<?php echo $class; ?>">
					<td><?php echo $key + 1; ?></td>
					<td><?php echo $detail['name_product']; ?></td>
					<td align="left"><?php echo number_format($detail['price'], 0, '', '.'); ?></td> 
					<td align="left"><?php echo $detail['qty']; ?></td>
					<td align="left"><?php echo number_format($subtotal, 0, '', '.'); ?></td>
				</tr>
				<?php endforeach; ?>

			</tbody>
		</table>

	</div>
	<!--/data detail order-->
</div>
<div class="row total_cost" >
						<div class="total_cost_section" >
						<center>
							<div class="total_cart_cost">
								<div class="cart_level">
									Harga Barang (RP):<br>
									Harga Ongkir (RP):<br>
									Harga Total (RP):
								</div>
								<div class="cart_amount">
								<font color="#FB5757">
									<div id="barang"><?php echo $grandtotal; ?></div>
									<?php $ongkir="<div id='ongkir'>0</div>"; echo $ongkir;?>
									<div id="total">0</div>
								</font>
								</div>
							</div>
						</center>
			<div style="float: right; margin:-120px 70px 0 0;">
			<div style="margin-top:100px">
			<center><p style="color:#FF0000;font-size:10px;">*HARGA TOTAL MERUPAKAN BIAYA YANG HARUS ANDA BAYARKAN.<br>*ANDA BISA MENGHITUNG SENDIRI ONGKOS KIRIMNYA.</p></center>
			</div>
			</div>
			</div>
			</div>
<div style="padding:5px 10px 0 0;margin:5px 5px 15px 5px; border:1px solid #CCC;text-align: justify;">

			<h4>Hitung Ongkos Kirim</h4>
		<div class="row" style="margin-left:5px;">
			<div class="four columns">
				Asal<br/>
				<select id="oriprovince">
					<option>Provinsi</option>
				</select>
				*Lokasi Kami: Jawa Barat (Bandung)
				<br/>
				<select id="oricity">
					<option>Kota</option>
				</select>			
			</div>
			<div class="four columns">
				Tujuan<br/>
				<select id="desprovince">
					<option>Provinsi</option>
				</select>
				*Lokasi Anda
				<br/>
				<select id="descity">
					<option>Kota</option>
				</select> 
			</div>
			<div class="two columns">
				Layanan<br/>
				<select id="service">
					<option value="all">semua</option>
					<option value="jne">JNE</option>
					<option value="pos">POS</option>
					<option value="tiki">TIKI</option>
				</select> 
				<br/>
				Berat (gram)<br/>
				<input  style="width:100px" id="berat" type="number">
			</div>
			<div class="two columns">
				<br/>
				<button id="btncheck" onclick="cekHarga()" class="btn btn-danger">Cek Harga</button> <p>
				<div id="loading" style="margin-top:-43px;display:none;"><img src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/images/ajax-loader.gif" style="width:30px;height:20px;margin-left:80px"></div>
			</div>
							<?php $province="<div id='province'></div>"; echo $province;
								  $city="<div id='city'></div>"; echo $city;
				if($dataOrder['payment_status']==0){
				?>
				<!--link untuk konfirmasi pembayaran-->
				<a title="click to confirm payment" href="<?php echo $this->createUrl('account/orders',array('confirm'=>$dataOrder['order_code'],'city'=>$city));?>" style="text-decoration: none;" class="confirm_btn">Konfirmasi pembayaran</a>
				<?php }else{ ?>
				<a class="confirm_btn" disabled>Pembayaran telah dikonfirmasi</a>
				<?php } ?>	
			<div class="row total_cost" >
						<div class="total_cost_section" >

</div>
								<!--untuk informasi sudah dikonfirmasi atau belum-->
			</div>
		</div>
			<div id="order-grid" class="grid-view" style="margin-top:-250px">
			<font color="red">*Pilih Kurir !</font>
			<table class="items">
				<thead>
				<tr>
					<th id="order-grid">Kurir</th>
					<th id="order-grid">Servis</th>
					<th id="order-grid">Deskripsi Servis</th>
					<th id="order-grid">Lama Kirim (hari)</th>
					<th id="order-grid">Total Biaya (Rp)</th>
					<th id="order-grid">Pilih</th>
				</tr>
				</thead>
				<tbody id="resultsbox"></tbody>
			</table>
			</div>
		
	</div>


						</div>
				</div>
				</div>
				</div>
				<?php $this->renderPartial('_right_menu');?>		
			</div>	
			</div>
			
		</div>
	<script>
	$(function asaloricity() {
		$("#oricity").on("change", function() {
    	$("#city").text($("#oricity").val());
  		}).trigger("change");
	});
	function getTotalHarga()
         {
            var barang = parseInt($('#barang').html());
            var ongkir = parseInt($('#ongkir').html());
            return $('#total').html(barang+ongkir);
         }
	function totalOngkir()
         {
            var ongkir = $('input[name="pilihpaket"]:checked').val();
            // alert(ongkir);
            $('#ongkir').html(ongkir);
            getTotalHarga();
         }
         $(document).ready(function(){
            getTotalHarga();
    });

	$(document).ready(function(){
	loadProvinsi('#oriprovince');
	loadProvinsi('#desprovince');
	$('#oriprovince').change(function(){
		$('#oricity').show();
		var idprovince = $('#oriprovince').val();
		loadCity(idprovince,'#oricity')
	});
	$('#desprovince').change(function(){
		$('#descity').show();
		var idprovince = $('#desprovince').val();
		loadCity(idprovince,'#descity')
	});
});

function loadProvinsi(id){
	$('#oricity').hide();
	$('#descity').hide();
	$(id).html('loading...');
	$('#loading').show();
	$.ajax({
		 url:'<?php echo Yii::app()->request->baseUrl;?>/account/ongkir?act=showprovince',
		dataType:'json',
		success:function(response){
			$('#loading').hide();
			$(id).html('');
			province = '';
				$.each(response['rajaongkir']['results'], function(i,n){
					province = '<option value="'+n['province_id']+'">'+n['province']+'</option>';
					province = province + '';
					$(id).append(province);
				});
		},
		error:function(){
			$(id).html('ERRORRRR');
		}
	});
}
function loadCity(idprovince,id){
	$.ajax({
		 url:'<?php echo Yii::app()->request->baseUrl;?>/Account/Ongkir?act=showcity',
		dataType:'json',
		data:{province:idprovince},
		success:function(response){
			$(id).html('');
			city = '';
				$.each(response['rajaongkir']['results'], function(i,n){
					city = '<option value="'+n['city_id']+'">'+n['city_name']+'</option>';
					city = city + '';
					$(id).append(city);
				});
		},
		error:function(){
			$(id).html('ERROR');
		}
	});
}
function cekHarga(){
	var origin = $('#oricity').val();
	var destination = $('#descity').val();
	var weight = $('#berat').val();
	var courier = $('#service').val();
	$('#btncheck').attr({
			disabled : true,
	});
	 $('#loading').show();
	$.ajax({
		url:'<?php echo Yii::app()->request->baseUrl;?>/Account/Ongkir?act=cost',
		data:{origin:origin,destination:destination,weight:weight,courier:courier},
		success:function(response){
			$('#resultsbox').html(response);
			$('#btncheck').attr({
			disabled : false,
			});
			 $('#loading').hide();
		},
		error:function(){
			$('#resultsbox').html('ERROR');
		}
	});
}</script>