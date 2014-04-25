<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

<div class="menu-left">
					
						<ul>
							<li><?php echo CHtml::link('Kenapa TRASPAC', array('/site/page', 'view'=>'kenapa')); ?></li>
							<li class="active"><a href=<?php echo Yii::app()->request->baseUrl; ?>>Info Lowongan</a></li>
							<?php 
							/////////////////MENU UNTUK MASING MASING ROLE ////////////
							if(!Yii::app()->user->isGuest) {
							      
							    // MENU FOR SUPER ADMIN ////
							     if(Yii::app()->user->isSuperAdmin()) {
							     	echo "<li>"; echo CHtml::link('Manage Admin', array('/user/admin'));  echo "</li>";
							     	echo "<li>"; echo CHtml::link('Lowongan', array('/site/page', 'view'=>'daftarlowongan'));  echo "</li>";
							     	echo "<li>"; echo CHtml::link('Pelamar', array('/pelamar/admin'));  echo "</li>";
							     	echo "<li>"; echo CHtml::link('Logout', array('/site/logout'));  echo "</li>";

							     }
							    // MENU FOR ADMIN ////
							    else if(Yii::app()->user->isAdmin()) {
							    	echo "<li>"; echo CHtml::link('Lowongan', array('/site/page', 'view'=>'daftarlowongan'));  echo "</li>";
							     	echo "<li>"; echo CHtml::link('Pelamar', array('/pelamar/admin'));  echo "</li>";
							     	echo "<li>"; echo CHtml::link('Logout', array('/site/logout'));  echo "</li>";
							    }
							    else {
							    	  // MENU FOR MEMBER////
							    	//cek kalo user belum buat data diri maka create
							    	$id = Pelamar::model()->findByPk(Yii::app()->user->id);
							    	if($id==null){
							    		  	echo "<li>"; echo CHtml::link('Data Diri', array('/pelamar/create'));  echo "</li>";
							    	} else {
							    			  	echo "<li>"; echo CHtml::link('Data Diri', array('/pelamar/view',  'id'=>Yii::app()->user->id));  echo "</li>";
							    	
							    	}
								    echo "<li>"; echo CHtml::link('Pengumuman', array('/site/page', 'view'=>'pengumuman'));  echo "</li>";
								    echo "<li>"; echo CHtml::link('Logout', array('/site/logout'));  echo "</li>";
							    }
							  
							     
							} 
							?>
					</ul>	
					
							<?php $this->widget('application.extensions.login.XLoginPortlet',array(
							     'visible'=>Yii::app()->user->isGuest,
							));
							?>
					
					
</div>
					<div class="contents">

						<div class="content-right">
							<?php echo $content; ?>
							
						</div>
					</div>
				
<?php $this->endContent(); ?>