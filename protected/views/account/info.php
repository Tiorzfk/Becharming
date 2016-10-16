<div class="breadcrumbs">
			<div class="container main">
				<ul>
					<li><a href="#">Home</a></li><li>&#47;</li><li><a href="<?php echo $this->createUrl('account/');?>">My Account</a></li>&#47;</li><li class="active"><a href="<?php echo $this->createUrl('account/info');?>">Info Akun</a></li>
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
					<h5 >Akun anda</h5><p>
					<table width="166" height="50">
						<tr>
							<td>Nama</td>
							<td>:</td>
							<td><?php echo Yii::app()->user->customerName;?></td>
						</tr>
						<tr>
							<td>Email</td>
							<td>:</td>
							<td><?php echo Yii::app()->user->customerEmail;?></td>
						</tr>
					</table>	

				</div>	
				</div>
				</div>
				</div>
				<?php $this->renderPartial('_right_menu');?>
			</div>	
			</div>
			
		</div>