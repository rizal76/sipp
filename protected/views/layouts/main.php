<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title><?php echo Yii::app()->name;  ?></title>
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/style-r.css" rel="stylesheet">
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/style-b.css" rel="stylesheet">
</head><!--/head-->

<body data-spy="scroll" data-target="#navbar" data-offset="0">
	<div class="all-content">
		<div id="header" role="banner">
			<div class="container">
				<div id="navbar" class="navbar navbar-default">
					<div class="navbar-header">
						<a class="navbar-brand" href="<?php echo Yii::app()->request->baseUrl; ?>"></a>
					</div>
				</div>
			</div>
		</div><!--/#header-->
		<div class="content-warp">
			<div class="container">
				<div class="content">
					<?php echo $content; ?>
					
				</div>
			</div>
		</div>
		<div class="footer">
		</div>
	</div>
</body>
</html>