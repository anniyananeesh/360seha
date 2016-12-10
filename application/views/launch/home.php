<style type="text/css">
	.BannerTop{
		width: 728px;
		height: 90px;
		display: block;
		position: relative;
		margin: 10px auto 0px auto;
	}
</style>
<div class="container">
 	
 	<div class="BannerTop">
 		
 		<?php if($banner_top->is_adsense):?>
		    <?php echo $banner_top->adsense_script?>
		<?php else:?>
		    
		<?php $_id = $this->encrypt->encode($banner_top->id);?>

		    <a href="#" target="_blank">
		        <img src="<?php echo base_url();?>uploads/ads/<?php echo $banner_top->image?>" style="margin-top: 10px;"/>
		    </a>

		<?php endif;?>
		<div class="clearfix"></div>

 	</div>

	<div class="top-header">
		<img src="<?php echo LAUNCH_THEME?>images/logo.svg" width="330"/>
		<div class="clearfix"></div>
		<a href="<?php echo base_url()?>join/" class="get-listed">
			Get Listed With Us
		</a>
	</div>
 
</div>

<div class="bottom-footer">

	<div class="container">

		<div class="pull-left stores-sm">
			<p class="text-left">We are now on</p>
			<div class="content left">
				<a href="https://play.google.com/store/apps/details?id=com.dgweb.seha" target="_blank">
					<img src="<?php echo LAUNCH_THEME?>images/play-store.png" class="pull-left"/>
				</a>
				<a href="https://itunes.apple.com/us/app/360seha/id1018589032?l=ar&ls=1&mt=8" target="_blank">
					<img src="<?php echo LAUNCH_THEME?>images/app-store.png" class="pull-left"/>
				</a>
			</div>
		</div>

		<div class="pull-right social-media-sm">
			<p class="text-right">Follow us on</p>
			<div class="content right">
			
				<a href="https://www.linkedin.com/360seha" target="_blank">
					<img src="<?php echo LAUNCH_THEME?>images/linked.png" class="pull-right"/>
				</a>

				<a href="https://instagram.com/360seha/" target="_blank">
					<img src="<?php echo LAUNCH_THEME?>images/inst.jpg" class="pull-right"/>
				</a>

				<a href="https://twitter.com/360seha" target="_blank">
					<img src="<?php echo LAUNCH_THEME?>images/twitter.png" class="pull-right"/>
				</a>

				<a href="https://www.facebook.com/360seha" target="_blank">
					<img src="<?php echo LAUNCH_THEME?>images/fb.png" class="pull-right"/>
				</a>

			</div>
		</div>
		<div class="clearfix"></div>
		<!-- <div class="footer">
			<a href="<?php echo base_url()?>" class="text-lgt-blue"><?php echo lang("auto.home");?></a>  .   
       		<a href="<?php echo base_url()?>about" class="text-lgt-blue"><?php echo lang("auto.about_us");?></a>   .  
       		<a href="<?php echo base_url()?>terms" class="text-lgt-blue"><?php echo lang("auto.terms_of_use");?></a>  .     
          	<a href="<?php echo base_url()?>contact" class="text-lgt-blue"><?php echo lang("auto.contact_us");?></a>
		</div>-->

	</div>

</div>