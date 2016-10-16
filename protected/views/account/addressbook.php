<div class="breadcrumbs">
			<div class="container main">
				<ul>
					<li><a href="#">Home</a></li><li>&#47;</li><li><a href="<?php echo $this->createUrl('account/');?>">My Account</a></li>&#47;</li><li class="active"><a href="<?php echo $this->createUrl('account/addressbook');?>">Address Book</a></li>
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
					<button type="button" onclick="window.location='<?php echo Yii::app()->request->baseUrl; ?>/account/addressbook?add=addressbook'" class="confirm_btn">Tambahkan Alamat Baru</button></h3>
					
					<div class="delivery_details">
					<?php
						/*untuk menampilkan setflash*/
						foreach(Yii::app()->user->getFlashes() as $key=>$message){
							echo "<div style='margin:5px 5px 0 5px;' class='flash-".$key."'>".$message."</div>";
						}
					?>
					<div style="padding:5px 10px 0 0;margin:5px 5px 15px 5px; solid #CCC;text-align: justify;">
					<?php 
						/*foreach data alamat dan ditampilkan*/
						$i=1;foreach($model as $address):
						/*untuk membuat class css buat clear left*/
						($i%3===0) ? $div ='<div style="clear:left;"></div>':$div='';
					?>
					<h5>
					<div style="float: left;margin:5px 0 0 5px;border:solid 1px #CCC;">
					<table width="166" height="100">
						<tr>
							<td valign="top">Nama</td>
							<td valign="top">:</td>
							<td valign="top"><?php echo $address->name;?></td>
						</tr>
						<tr>
							<td valign="top">Telp./Hp</td>
							<td valign="top">:</td>
							<td valign="top"><?php echo $address->phone_number;?></td>
						</tr>
						<tr>
							<td valign="top">Alamat</td>
							<td valign="top">:</td>
							<td valign="top"><?php echo $address->address;?></td>
						</tr>
						<tr>
							<td valign="top">Provinsi</td>
							<td valign="top">:</td>
							<td valign="top"><?php echo $address->province;?></td>
						</tr>
						<tr>
							<td valign="top">Kota</td>
							<td valign="top">:</td>
							<td valign="top"><?php echo $address->city;?></td>
						</tr>
						<tr>
							</h5> 
							<td colspan="3" align="right">
								<!--membuat link untuk update data alamat-->
								<h5><a href="<?php echo $this->createUrl('account/addressbook',array('edit'=>$address->id_address));?>" class="confirm_btn">Edit</a></h5>
							</td>
						</tr>
					</table>
					</div>
					<?php 
					echo $div;
					$i++;
					endforeach;
					?>
				</div>
				</div>
				</div>
				</div>
				</div>
				<?php $this->renderPartial('_right_menu');?>
			</div>	
			</div>
			
		</div>