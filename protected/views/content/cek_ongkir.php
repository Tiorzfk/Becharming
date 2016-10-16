		<div class="breadcrumbs">
			<div class="container main">
				<ul>
					<li><a href="<?php echo $this->createUrl('./');?>">Home</a></li><li>&#47;</li><li class="active"><a href="<?php echo $this->createUrl('content/about_us');?>">Shipping Delivery</a></li>
				</ul>
			</div>	
		</div>	
	
		<div class="main_content">
			<div class="container main">
				<div class="row">
				
					<div class="span12 comment_area">
					<h2 class="title-wrap">
						Cek Ongkir
					</h2>
						<div class="line"></div>
						<div class="comment_contentp">	
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
