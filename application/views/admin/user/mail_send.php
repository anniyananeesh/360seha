<!DOCTYPE html>
<html lang="en" class=" ">
<head>  
  <meta charset="utf-8" />
  <title><?php echo WEB_TITLE;?></title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  
  <link rel="stylesheet" href="<?php echo ACTIVE_THEME?>css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo ACTIVE_THEME?>css/animate.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo ACTIVE_THEME?>css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo ACTIVE_THEME?>css/icon.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo ACTIVE_THEME?>css/font.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo ACTIVE_THEME?>css/app.css" type="text/css" />  
  
  <!--[if lt IE 9]>
    <script src="<?php echo ACTIVE_THEME?>js/ie/html5shiv.js"></script>
    <script src="<?php echo ACTIVE_THEME?>js/ie/respond.min.js"></script>
    <script src="<?php echo ACTIVE_THEME?>js/ie/excanvas.js"></script>
  <![endif]-->
    
</head>
<body class="" style="background: url('<?php echo ACTIVE_THEME?>images/main_bdy_mplintl.jpg');">

  <section id="content" class="wrapper-md animated fadeIn">  
    
    <div class="container aside-2xl">
 
        <section class="m-b-lg">
         <header class="wrapper text-center">
 		  
 		  <h1><i class="h1 fa fa-send text-muted" style="font-size: 105px;"></i></h1>

         </header>
 
            <div class="row wrapper h4 font-thin" style="line-height: 32px;">
            
            	<p class="text-center">
                    <?php if($this->session->flashdata('message')):?>
                        <?php echo $this->session->flashdata('message');?>
                    <?php endif;?> 
            	</p>
            
            </div>
            
            <div class="text-center">
            	<button type="submit" class="btn btn-lg btn-success btn-rounded font-thin" onclick="javascript: window.location.href='<?php echo base_url()?>admin/login'">Sign me in</button>
            </div>
 
      </section>
      
    </div>
  </section>
  <!-- footer -->
  <footer id="footer">
    <div class="text-center padder text-muted">
      <p>
        <small>All Rights Reserved. <?php echo WEB_TITLE?> <br>&copy; <?php echo date('Y')?></small>
      </p>
    </div>
  </footer>

  <script src="<?php echo ACTIVE_THEME?>js/jquery.min.js"></script>
  <script src="<?php echo ACTIVE_THEME?>js/bootstrap.js"></script>

  <script src="<?php echo ACTIVE_THEME?>js/app.js"></script>
  <script src="<?php echo ACTIVE_THEME?>js/slimscroll/jquery.slimscroll.min.js"></script>
  <script src="<?php echo ACTIVE_THEME?>js/app.plugin.js"></script>
  <br/>
</body>
</html>