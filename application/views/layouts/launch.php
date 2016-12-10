<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="<?php echo ACTIVE_THEME?>assets/img/favico.ico" rel="icon" type="image/x-icon" />
<title><?php echo WEB_LAUNCH_TITLE?></title>
 
<link href="<?php echo LAUNCH_THEME?>css/reset.css" rel="stylesheet" type="text/css" /> 
<link href="<?php echo LAUNCH_THEME?>css/styles.css" rel="stylesheet" type="text/css" /> 
<link href="<?php echo LAUNCH_THEME?>css/media.css" rel="stylesheet" type="text/css" />

</head>

<body class="bg-launch">

	<?php $this->load->view($content);?> 

</body>
</html>
