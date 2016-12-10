<!DOCTYPE html>
<html lang="en" class=" ">
<head>  
  <meta charset="utf-8" />
  <title><?php echo WEB_TITLE;?> : Admin Login</title>
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
    <div class="container aside-xl">
      <a class="navbar-brand block" href="<?php echo base_url()?>admin/login"><?php echo WEB_TITLE?></a>
      <section class="m-b-lg">
        <header class="wrapper text-center">
          <strong>Admin Login</strong>
        </header>
 
            <?php echo form_open(base_url().'adminlogin');?>
              
            <?php if(isset($message)):?>
            
            	<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">Ã—</button>
                    <i class="fa fa-ok-sign"></i>
                    <?php echo $message;?>
                </div>
              
            <?php endif;?>
                
            <?php if($this->session->flashdata('message')):?>

                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">Ã—</button>
                    <i class="fa fa-ok-sign"></i>
                    <?php echo $this->session->flashdata('message');?>
                </div>

            <?php endif;?>
            <div class="text-center">
            	<h1><i class="h1 fa fa-unlock-alt text-muted" style="font-size: 105px;"></i></h1>
            </div>
            <div class="list-group">
              <div class="list-group-item">
                  <input type="text" placeholder="Username" name="username" class="form-control no-border">
              </div>
              <div class="list-group-item">
                  <input type="password" placeholder="Password" name="password" class="form-control no-border">
              </div>
            </div>
            <div class="text-center">
            	<button type="submit" class="btn btn-lg btn-primary btn-rounded font-thin">Sign in</button>
            </div>
            <div class="text-center m-t m-b">
                <a href="<?php echo base_url()?>admin/user/forgot_password"><small>Forgot password?</small></a>
            </div>
 
        <?php echo form_close();?>
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
  
  <br/><br/><br/><br/><br/><br/>

  <script src="<?php echo ACTIVE_THEME?>js/jquery.min.js"></script>
  <script src="<?php echo ACTIVE_THEME?>js/bootstrap.js"></script>

  <script src="<?php echo ACTIVE_THEME?>js/app.js"></script>
  <script src="<?php echo ACTIVE_THEME?>js/slimscroll/jquery.slimscroll.min.js"></script>
  <script src="<?php echo ACTIVE_THEME?>js/app.plugin.js"></script>
  
</body>
</html>