<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <meta charset="utf-8" />
  <title><?php echo WEB_TITLE?></title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <link rel="stylesheet" href="<?php echo ACTIVE_THEME?>css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo ACTIVE_THEME?>css/animate.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo ACTIVE_THEME?>css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo ACTIVE_THEME?>css/icon.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo ACTIVE_THEME?>css/font.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo ACTIVE_THEME?>css/app.css" type="text/css" />  
  <link rel="stylesheet" href="<?php echo ACTIVE_THEME?>js/calendar/bootstrap_calendar.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo ACTIVE_THEME?>js/datepicker/datepicker.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo ACTIVE_THEME?>js/bx/jquery.bxslider.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo ACTIVE_THEME?>js/chosen/chosen.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo ACTIVE_THEME?>js/spinner/jquery.bootstrap-touchspin.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo ACTIVE_THEME?>js/auto-complete/jquery.autocomplete.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo ACTIVE_THEME?>sortable/sortable.css" type="text/css" />
  
  <link rel="stylesheet" href="<?php echo ACTIVE_THEME?>js/timepicker/jquery.timepicker.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo ACTIVE_THEME?>js/alert/alert.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo ACTIVE_THEME?>js/_upld/fileuploader.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo ACTIVE_THEME?>assets/css/tag.min.css" type="text/css" />
  
  <script type="text/javascript" src="<?php echo ACTIVE_THEME?>assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular.min.js"></script>
  <script type="text/javascript" src="<?php echo ACTIVE_THEME?>assets/js/jquery.counter.min.js"></script>
  <script type="text/javascript" src="<?php echo ACTIVE_THEME?>assets/js/tag.min.js"></script>
  
  <!--[if lt IE 9]>
    <script src="<?php echo ACTIVE_THEME?>js/ie/html5shiv.js"></script>
    <script src="<?php echo ACTIVE_THEME?>js/ie/respond.min.js"></script>
    <script src="<?php echo ACTIVE_THEME?>js/ie/excanvas.js"></script>
  <![endif]-->
  
</head>

<body class="">

    <script type="text/javascript" src="<?php echo base_url().'/'.EDITOR_URL?>tinyMCE/tiny_mce.js"></script>
  <script type="text/javascript">
    tinyMCE.init({
        mode : "specific_textareas",
        editor_selector : "editor",
        elements : "ajaxfilemanager",
        theme : "advanced",
        plugins : "autolink,lists,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
        
        theme_advanced_buttons1 : "newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
        theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,bullist,numlist,|,outdent,indent,|,undo,redo,|,link,unlink,anchor,image,cleanup,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
        theme_advanced_buttons3 : "tablecontrols,|,removeformat,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,ltr,rtl,|,fullscreen",
        theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak",
      
        theme_advanced_buttons3_add_before : "",
        //theme_advanced_font_sizes: "10px,12px,13px,14px,16px,18px,20px",

        theme_advanced_buttons3_add : "media",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        extended_valid_elements : "hr[class|width|size|noshade]",
        paste_use_dialog : false,
        theme_advanced_resizing : true,
        theme_advanced_resize_horizontal : true,
        apply_source_formatting : true,
        force_br_newlines : true,
        force_p_newlines : false, 
        relative_urls : false,
        inline_styles : true

      }); 
  </script>
  <style>
      .editor-container table{
          width: 100%;
      }
      .editor-container table td{
          padding: 0px !important;
      }
  </style>
 
    <section class="vbox">
        
            <header class="bg-white header header-md navbar navbar-fixed-top-xs box-shadow">
      <div class="navbar-header aside-md dk">
        <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html">
          <i class="fa fa-bars"></i>
        </a>
        <a href="index.html" class="navbar-brand">
 
          <span class="hidden-nav-xs">360Seha.com</span>
        </a>
        <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user">
          <i class="fa fa-cog"></i>
        </a>
      </div>
                
      <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user user">
 
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
 
            Administrator <b class="caret"></b>
          </a>
          <ul class="dropdown-menu animated fadeInRight">            
 
            <li class="divider"></li>
            <li>
              <a href="<?php echo base_url().ADMIN_URL?>user/logout">Logout</a>
            </li>
          </ul>
        </li>
      </ul>      
    </header>
        
    <section>
        <section class="hbox stretch">
 
        <aside class="bg-black aside-md hidden-print hidden-xs" id="nav">          
          <section class="vbox">
            <section class="w-f scrollable">
              <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">
                <div class="clearfix wrapper dk nav-user hidden-xs">
                  <div class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <span class="thumb avatar pull-left m-r">                        
                        <img src="<?php echo ACTIVE_THEME?>images/a0.png" class="dker" alt="...">
                        <i class="on md b-black"></i>
                      </span>
                      <span class="hidden-nav-xs clear">
                        <span class="block m-t-xs">
                          <strong class="font-bold text-lt">Administrator</strong> 
                          <b class="caret"></b>
                        </span>
                        <span class="text-muted text-xs block">Master Administrator</span>
                      </span>
                    </a> 
                  </div>
                </div>                


                <?php $this->load->view('admin/menu')?>

              </div>
            </section>
 
          </section>
        </aside>
            
        <section id="content">
           <section class="vbox stretch">
           
              <?php $this->load->view($content);?>
                    
            </section>
        </section>   
      </section> 
    </section>   
  </section>

  <!-- Bootstrap -->
  <script src="<?php echo ACTIVE_THEME?>js/bootstrap.js"></script>
  <!-- App -->
  <script src="<?php echo ACTIVE_THEME?>js/app.js"></script>  
  <script src="<?php echo ACTIVE_THEME?>js/slimscroll/jquery.slimscroll.min.js"></script>
  <script src="<?php echo ACTIVE_THEME?>js/charts/easypiechart/jquery.easy-pie-chart.js"></script>
  <script src="<?php echo ACTIVE_THEME?>js/charts/sparkline/jquery.sparkline.min.js"></script>
  <script src="<?php echo ACTIVE_THEME?>js/charts/flot/jquery.flot.min.js"></script>
  <script src="<?php echo ACTIVE_THEME?>js/charts/flot/jquery.flot.tooltip.min.js"></script>
  <script src="<?php echo ACTIVE_THEME?>js/charts/flot/jquery.flot.spline.js"></script>
  <script src="<?php echo ACTIVE_THEME?>js/charts/flot/jquery.flot.pie.min.js"></script>
  <script src="<?php echo ACTIVE_THEME?>js/charts/flot/jquery.flot.resize.js"></script>
  <script src="<?php echo ACTIVE_THEME?>js/charts/flot/jquery.flot.grow.js"></script>
  <script src="<?php echo ACTIVE_THEME?>js/charts/flot/jquery.flot.time.js"></script>
  <script src="<?php echo ACTIVE_THEME?>js/charts/flot/demo.js"></script>

  <script src="<?php echo ACTIVE_THEME?>js/calendar/bootstrap_calendar.js"></script>
  <script src="<?php echo ACTIVE_THEME?>js/datepicker/bootstrap-datepicker.js"></script>
  <script src="<?php echo ACTIVE_THEME?>js/calendar/demo.js"></script>

  <script src="<?php echo ACTIVE_THEME?>sortable/sortable-min.js"></script>
  <script src="<?php echo ACTIVE_THEME?>sortable/sort-categories.js"></script>
  
  <!-- file input -->  
  <script src="<?php echo ACTIVE_THEME?>js/file-input/bootstrap-filestyle.min.js"></script>
  <!-- wysiwyg -->
  <script src="<?php echo ACTIVE_THEME?>js/wysiwyg/jquery.hotkeys.js"></script>
  <script src="<?php echo ACTIVE_THEME?>js/wysiwyg/bootstrap-wysiwyg.js"></script>
  <script src="<?php echo ACTIVE_THEME?>js/wysiwyg/demo.js"></script>
  <!-- markdown -->
  <script src="<?php echo ACTIVE_THEME?>js/markdown/epiceditor.min.js"></script>
  <script src="<?php echo ACTIVE_THEME?>js/markdown/demo.js"></script>

  <script src="<?php echo ACTIVE_THEME?>js/chosen/chosen.jquery.min.js"></script>
  <script src="<?php echo ACTIVE_THEME?>js/spinner/jquery.bootstrap-touchspin.min.js"></script>

  <script src="<?php echo ACTIVE_THEME?>js/timepicker/jquery.timepicker.min.js"></script>
  <script src="<?php echo ACTIVE_THEME?>js/alert/alert.js"></script>
  <script src="<?php echo ACTIVE_THEME?>js/app.plugin.js"></script> 

  <script type="text/javascript">

    $(function(){

        $(document).on('click', '.delete_entry', function(){
            
           var href = $(this).attr('href');
           jConfirm("By deleting this entry, the entry is completly removed from storage" , "Dear! you want to delete this entry ?", function(res){
               
               if(res){
                   
                   location.href = href;
               }else{
                   
                   return false;
               }
               
           }); 
           return false;
        });
        
        $(document).on('click', '#find_gmap', function(){
            
           $("#gmap_canvas").css({'top': '0px'}).slideDown(350).fadeIn(200);           
           return false;
        }); 
 
        $(document).on('click', '.menu_access', function(){
           
           var parent = $(this).parent().parent();
           if($(this).is(':checked'))
           {
               parent.addClass('btn-success').removeClass('btn-default');
           }else{
               parent.addClass('btn-default').removeClass('btn-success');
           }
           
        }); 
        
        //Place up the google map canvas 
        var width = $(window).width();
        var height = $(window).height();
        
        var n_height = (parseInt(height) * .8) + 20;
        $("#gmap_canvas").css({'top': -n_height+'px', 'width': width+'px'});
        

        $(document).on('click', '.reset_pwd', function(){
            
            var href = $(this).attr('href');
            jConfirm("By allowing this, you are going to reset the password" , "BANGGGGGGG !!! RESET PASSWORD ?", function(res){
                
                if(res){
                    
                    location.href = href;
                }else{
                    
                    return false;
                }
                
            }); 
            return false;
         });
         
         $(document).on('click', '.set_featured', function(){
            
            var href = $(this).attr('href');
            jConfirm("Change featured status of this subscriber" , "Change the featured status ?", function(res){
                
                if(res){
                    
                    location.href = href;
                }else{
                    
                    return false;
                }
                
            }); 
            return false;
         });

    });

    function _doConfirmBack(title, message){
 
        jConfirm(message , title, function(res){
               
           if(res)
               $("#save_room_lock").submit();
               
        }); 
        return false;
    }

  </script>

</body>
</html>

