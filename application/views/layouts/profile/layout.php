
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php if(RTL):?> <?php echo $usr->subs_title_ar?> <?php else:?> <?php echo $usr->subs_title?> <?php endif;?> </title>

<link href="<?php echo ACTIVE_THEME?>assets/lib/css/bootstrap.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo PROFILE_THEME?>css/main.css">
<link href="<?php echo ACTIVE_THEME?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<script src="<?php echo PROFILE_THEME?>js/jquery.min.js"></script>
<!-- Add mousewheel plugin (this is optional) -->
<script type="text/javascript" src="<?php echo ACTIVE_THEME?>assets/fbx/lib/jquery.mousewheel-3.0.6.pack.js"></script>
<!-- Add fancyBox main JS and CSS files -->
<script type="text/javascript" src="<?php echo ACTIVE_THEME?>assets/fbx/source/jquery.fancybox.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo ACTIVE_THEME?>assets/fbx/source/jquery.fancybox.css" media="screen" />

<script src="<?php echo PLUGINS_DIR?>bxslider/jquery.bxslider.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo PLUGINS_DIR?>bxslider/jquery.bxslider.css" media="screen" />

<!-- <link href="http://fonts.googleapis.com/earlyaccess/droidarabicnaskh.css" rel="stylesheet" type="text/css" />-->
<style type="text/css" media="screen" rel="stylesheet">
    body{
        font-family: <?php echo lang("font-family");?>, "Arial" !important;
    } 
</style>

<script language="javascript" type="text/javascript">
  function resizeIframe(obj) {
    obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
  }
</script>

<script type="text/javascript">

$(function(){

	var IframeSwitcher = $("#IframeSwitcher a");

	IframeSwitcher.on('click', doIframeSwitch);

});
	
	function doIframeSwitch()
	{
		var IframeSwitcher = $("#IframeSwitcher a"),
			ChildView = $("#ChildView");

		IframeSwitcher.removeClass('active');
		$(this).addClass('active');

		var iframeSrc = $(this).attr('href');
			ChildView.attr('src',iframeSrc);
		return false;
	}

</script>

</head>
<body onload="initialize()" class="<?php if(RTL):?>inned-rtl<?php else:?> inned<?php endif;?>" <?php if(RTL):?> dir="rtl"<?php endif;?>>

	<div id="fb-root"></div>
	<script>
	(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.3&appId=669686323054727";
		  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
	</script>

	<div class="container contant">

		<div class="row">

			<div class="site-overlay"></div>

			<div class="top-header">
				<?php $this->load->view(PROFILE_VIEW.'partials/top-header');?>
			</div>
			<div class="clearfix"></div>
			
			<!-- Left column-->
			<div class="col-md-3 mobile_none sidebar <?php if(RTL):?> sidebar-rtl pull-right<?php else:?> sidebar-ltr pull-left<?php endif;?>">
				<?php $this->load->view(PROFILE_VIEW.'partials/left-content');?>
			</div>

			<!--content-->
			<div class="col-md-9 basic <?php if(RTL):?> pull-left<?php else:?> pull-right<?php endif;?>">

				<?php $this->load->view(PROFILE_VIEW.'partials/header', array('usr' => $usr, 'services'=> $services));?>
			 
			 	<div class="page-holder-profile">
			 		<iframe src="<?php echo base_url().$profile?>/page/home" id="ChildView" name="ChildViewSrc" class="ChildViewStyle" frameborder="0" scrolling="no" onload='javascript:resizeIframe(this);'></iframe>
			 	</div>

			</div>
		</div>
	</div>

	<!-- Modal for following button partial-->
	<div class="modal fade" id="show-follow" tabindex="-1" role="dialog" aria-labelledby="show-follow" aria-hidden="true">
	    <div class="modal-dialog m-auto mobile-overlay-register" style="width: 500px; display: block;">
	        <div class="modal-content">
	            <span class="glyphicon glyphicon-refresh spinning text-center loader"></span>
	        </div> 
	    </div>
	</div>
 

 	<!-- Modal for async error partial-->
 	<?php $this->load->view(PROFILE_VIEW.'partials/error-async');?>

 	<!-- Modal for signin partial-->
 	<?php $this->load->view(PROFILE_VIEW.'partials/signin');?>
 
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCsbzuJDUEOoq-jS1HO-LUXW4qo0gW9FNs"></script>
	
	<script src="<?php echo PROFILE_THEME?>js/all_scr.js"></script>
	<script src="<?php echo PROFILE_THEME?>js/bootstrap.min.js"></script> 
	<script type="text/javascript" src="<?php echo PROFILE_THEME?>js/infobox.js"></script>
	<script src="<?php echo ACTIVE_THEME?>assets/js/readmore.min.js"></script>

	<script type="text/javascript">


		function initialize() {

		    //Map parametrs
		    var mapOptions_place = {
		        zoom: 13,
		        center: new google.maps.LatLng(<?php echo $usr->subs_lat_id?>, <?php echo $usr->subs_long_id?>),
		        mapTypeId: google.maps.MapTypeId.ROADMAP,

		        mapTypeControl: false,
		        mapTypeControlOptions: {
		            style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
		            position: google.maps.ControlPosition.BOTTOM_CENTER
		        },
		        panControl: false,
		        panControlOptions: {
		            position: google.maps.ControlPosition.TOP_RIGHT
		        },
		        zoomControl: false,
		        zoomControlOptions: {
		            style: google.maps.ZoomControlStyle.LARGE,
		            position: google.maps.ControlPosition.TOP_RIGHT
		        },
		        scaleControl: false,
		        scaleControlOptions: {
		            position: google.maps.ControlPosition.TOP_LEFT
		        },
		        streetViewControl: false,
		        streetViewControlOptions: {
		            position: google.maps.ControlPosition.LEFT_TOP
		                },
		                styles: [{"featureType":"poi","stylers":[{"visibility":"off"}]},{"stylers":[{"saturation":-70},{"lightness":37},{"gamma":1.15}]},{"elementType":"labels","stylers":[{"gamma":0.26},{"visibility":"off"}]},{"featureType":"road","stylers":[{"lightness":0},{"saturation":0},{"hue":"#ffffff"},{"gamma":0}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"visibility":"off"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"lightness":50},{"saturation":0},{"hue":"#ffffff"}]},{"featureType":"administrative.province","stylers":[{"visibility":"on"},{"lightness":-50}]},{"featureType":"administrative.province","elementType":"labels.text.stroke","stylers":[{"visibility":"off"}]},{"featureType":"administrative.province","elementType":"labels.text","stylers":[{"lightness":20}]}]
		            };
		        


		    //map
		    var map_place = new google.maps.Map(document.getElementById("map_place"), mapOptions_place);
 

		    //positions
		    var point_place = new google.maps.LatLng(<?php echo $usr->subs_lat_id?>, <?php echo $usr->subs_long_id?>);

		    //markers
 
		    var marker_place = new google.maps.Marker({
		        position: point_place,
		        map: map_place,
		        category: '',
		        icon: '<?php echo $cat_icon?>',
		        title: "point_place"
		    });
		};
 
	</script>
 
</body>
</html>