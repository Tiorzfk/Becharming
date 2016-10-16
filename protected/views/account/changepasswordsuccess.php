		<div class="breadcrumbs">
			<div class="container main">
				<ul>
					<li><a href="#">Home</a></li><li>&#47;</li><li><a href="<?php echo $this->createUrl('account/');?>">My Account</a></li>&#47;</li><li class="active"><a href="<?php echo $this->createUrl('account/changepassword');?>">Change Password</a></li>
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
							<div>
								<div class="delivery_details">
								<?php
									foreach(Yii::app()->user->getFlashes() as $key=>$message){
										echo "<div style='margin-left:5px;' class='flash-".$key."'>".$message;
										echo ", <a href='".$this->createUrl('account/logout')."'>untuk mencoba silahkan login kembali!</a>";
										echo "</div>";
									}
								?>
								</div>	
							</div>

						</div>	

				</div>
				<?php $this->renderPartial('_right_menu');?>	
			</div>	
			</div>
			
		</div>