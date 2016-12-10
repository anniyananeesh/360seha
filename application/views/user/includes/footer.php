	</div>

	<script type="text/javascript">
		
		$(function(){

			$('#main-sidebar').simplerSidebar({
           		opener: '.collapsable-btn',
             	top: 0,
          		sidebar: {
              		align: 'left',
               		closingLinks: '.close-sb'
          		}
         	});


		})

	</script>

	<div id="main-sidebar" class="main-sidebar main-sidebar-left">
            
            <div id="main-sidebar-wrapper" class="main-sidebar-wrapper">

            	<div class="menu-head">
                    <p>Hi Sharjah Holistic Health Centre</p> 
                </div>
                <nav>
                    <ul>
                    	
                    	<li><a href="<?php echo HOST_URL?>/account/settings"><i class="ion-gear-a"></i>&nbsp;&nbsp;Account Settings</a></li>
                    	<li><a href="<?php echo HOST_URL?>/account/logo"><i class="ion-image"></i>&nbsp;&nbsp;Upload Logo</a></li> 
                    	<li><a href="<?php echo HOST_URL?>/account/logout"><i class="ion-power"></i>&nbsp;&nbsp;Logout</a></li>

                    </ul>
               </nav>

            </div>

    </div>

</body>
</html>