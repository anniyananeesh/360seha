<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <meta charset="utf-8" />
  <title><?php echo WEB_SUBSCRIBER_TITLE?></title>
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
  <link rel="stylesheet" href="<?php echo ACTIVE_THEME?>js/chosen/chosen.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo ACTIVE_THEME?>js/timepicker/jquery.timepicker.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo ACTIVE_THEME?>js/alert/alert.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo ACTIVE_THEME?>css/h.css" type="text/css" />  
  
  <script src="<?php echo ACTIVE_THEME?>js/jquery.min.js"></script>
  
  <!--[if lt IE 9]>
    <script src="<?php echo ACTIVE_THEME?>js/ie/html5shiv.js"></script>
    <script src="<?php echo ACTIVE_THEME?>js/ie/respond.min.js"></script>
    <script src="<?php echo ACTIVE_THEME?>js/ie/excanvas.js"></script>
  <![endif]-->

</head>

<style type="text/css">
  #gmap_canvas{
    top: 0px;
    left: 0px;
    position: absolute;
    width: 100%;
  }
</style>
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
        relative_urls : false

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
	<?php $this->load->view('subscribers/header', array('user_details' => $user_details, 'root_login' => $root_login, 'access' => $menu_access));?>
    <section>
      <section class="hbox stretch" style=" background: #f2f4f8;">
        <!-- .aside -->
        <?php $this->load->view('subscribers/user/partials/aside', array('user_details' => $user_details));?>
        <!-- /.aside -->
        <section id="content">
          <section class="vbox">
            <section class="scrollable padder">
 
                <div class="col-md-12">
 				
                        
                    <?php if($root_login):?>
                                      
                      <div class="alert alert-warning m-b-none text-center" style="padding:5px;margin-top:10px;">
                        
                          <p class="h5 font-thin">
                              
                              Subscriber account of <strong><?php echo $user_details->subs_title?></strong> is now being accessed from root account 
                              
                              <a href="<?php echo base_url().ADMIN_URL?>subscribers/" class="btn btn-success btn-rounded font-thin m-l-lg btn-xs text-uppercase">Admin Account</a>
                          </p>
                                          
                      </div>
                                      
                    <?php endif;?>
                    <div class="clearfix"></div>

                    <div class="padder" style="margin-top: 25px; padding: 20px 20px 80px 20px;">
 
                        <?php $this->load->view($content);?>
                        
                    </div>
                
                </div>

            </section>
              
          </section>
            
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
          
        </section>
        
      </section>
        
    </section>
      
  </section>
 
  <!-- Bootstrap -->
  <script src="<?php echo ACTIVE_THEME?>js/bootstrap.js"></script>
  <!-- App -->
  <script src="<?php echo ACTIVE_THEME?>js/app.js"></script> 

  <script src="<?php echo ACTIVE_THEME?>js/calendar/bootstrap_calendar.js"></script>
  <script src="<?php echo ACTIVE_THEME?>js/datepicker/bootstrap-datepicker.js"></script>
  <script src="<?php echo ACTIVE_THEME?>js/calendar/demo.js"></script>
 
  <script src="<?php echo ACTIVE_THEME?>js/chosen/chosen.jquery.min.js"></script>
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

        $(document).on('click', "#closeMap", closePopUpMap);
 
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
        
        var n_height = (parseInt(height) * .8) + 10;
        $("#gmap_canvas").css({'top': -n_height+'px'});

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
        
    })
    
    function _doConfirmBack(title, message){
 
        jConfirm(message , title, function(res){
               
           if(res)
               $("#save_room_lock").submit();
               
        }); 
        return false;
    }

    function closePopUpMap()
    {
      $("#gmap_canvas").css({'top': -n_height+'px', 'width': width+'px'});
    }

</script>
</body>
</html>