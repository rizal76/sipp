<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

				<div class="menu-left">
					<div class="height-10"></div>
						<?php 
						    if(!Yii::app()->user->isGuest) {
						      
						        print("Welcome back ".Yii::app()->user->name."\n <hr>");
						         
						}
						?>
					<ul>
							<li><?php echo CHtml::link('Kenapa TRASPAC', array('/site/page', 'view'=>'kenapa')); ?></li>
							<li><a href="http://traspac.co.id/lowongan.php?url=info-lowongan">Info Lowongan</a></li>
							<?php 
							    if(!Yii::app()->user->isGuest) {
							      
							      echo "<li>"; echo CHtml::link('Data Diri', array('/site/page', 'view'=>'kenapa'));  echo "</li>";
							      echo "<li>"; echo CHtml::link('Pengumuman', array('/site/logout'));  echo "</li>";
							      echo "<li>"; echo CHtml::link('Logout', array('/site/logout'));  echo "</li>";
							     
							}
							?>
					</ul>	
							<?php $this->widget('application.extensions.login.XLoginPortlet',array(
							     'visible'=>Yii::app()->user->isGuest,
							));
							?>
															
				</div>
				<div class="content-right">
					<div class="margin-30">
						<div class="text-content">
							<?php echo $content; ?>
						</div>
						
					</div>
				</div>
				<div class="clear"></div>
				<div class="shad-left"></div>
				<div class="shad-right"></div>
<?php $this->endContent(); ?>