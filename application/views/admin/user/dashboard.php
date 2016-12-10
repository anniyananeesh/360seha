<section class="scrollable padder">
    
<section class="row m-b-md">
    <div class="col-sm-6">
      <h3 class="m-b-xs text-black">Dashboard</h3>
      <small>Welcome back, Administrator, <i class="fa fa-map-marker fa-lg text-primary"></i> United Arab Emirates</small>
    </div>

</section>

<div class="row">
    <div class="col-sm-6">
      <div class="panel b-a">
        <div class="row m-n">
          <div class="col-md-6 b-b b-r">
            <a href="<?php echo base_url()?>admin/user/unique_visits" class="block padder-v hover">
              <span class="i-s i-s-2x pull-left m-r-sm">
                <i class="i i-hexagon2 i-s-base text-danger hover-rotate"></i>
                <i class="i i-plus2 i-1x text-white"></i>
              </span>
              <span class="clear">
                <span class="h3 block m-t-xs text-danger"><?php echo count($ips)?></span>
                <small class="text-muted text-u-c">Unique Visits</small>
              </span>
            </a>
          </div>
          <div class="col-md-6 b-b">
            <a href="#" class="block padder-v hover">
              <span class="i-s i-s-2x pull-left m-r-sm">
                <i class="i i-hexagon2 i-s-base text-success-lt hover-rotate"></i>
                <i class="i i-users2 i-sm text-white"></i>
              </span>
              <span class="clear">
                <span class="h3 block m-t-xs text-success"><?php echo count($users)?></span>
                <small class="text-muted text-u-c">Users</small>
              </span>
            </a>
          </div>
          <div class="col-md-6 b-b b-r">
              <a href="<?php echo base_url()?>admin/category" class="block padder-v hover">
              <span class="i-s i-s-2x pull-left m-r-sm">
                <i class="i i-hexagon2 i-s-base text-info hover-rotate"></i>
                <i class="i i-location i-sm text-white"></i>
              </span>
              <span class="clear">
                <span class="h3 block m-t-xs text-info"><?php echo count($cats)?></span>
                <small class="text-muted text-u-c">Categories</small>
              </span>
            </a>
          </div>
          <div class="col-md-6 b-b">
            <a href="#" class="block padder-v hover">
              <span class="i-s i-s-2x pull-left m-r-sm">
                <i class="i i-hexagon2 i-s-base text-primary hover-rotate"></i>
                <i class="i i-alarm i-sm text-white"></i>
              </span>
              <span class="clear">
                <span class="h3 block m-t-xs text-primary"><?php echo count($subscribers);?></span>
                <small class="text-muted text-u-c">Subscribers</small>
              </span>
            </a>
          </div>
        </div>
      </div>
    </div>
    

    <!-- <div class="col-md-3 col-sm-6">
      <div class="panel b-a">
        <div class="panel-heading no-border bg-primary lt text-center">
          <a href="#">
            <i class="fa fa-facebook fa fa-3x m-t m-b text-white"></i>
          </a>
        </div>
        <div class="padder-v text-center clearfix">                            
          <div class="col-xs-6 b-r">
            <div class="h3 font-bold">42k</div>
            <small class="text-muted">Friends</small>
          </div>
          <div class="col-xs-6">
            <div class="h3 font-bold">90</div>
            <small class="text-muted">Feeds</small>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6">
      <div class="panel b-a">
        <div class="panel-heading no-border bg-info lter text-center">
          <a href="#">
            <i class="fa fa-twitter fa fa-3x m-t m-b text-white"></i>
          </a>
        </div>
        <div class="padder-v text-center clearfix">                            
          <div class="col-xs-6 b-r">
            <div class="h3 font-bold">27k</div>
            <small class="text-muted">Tweets</small>
          </div>
          <div class="col-xs-6">
            <div class="h3 font-bold">15k</div>
            <small class="text-muted">Followers</small>
          </div>
        </div>
      </div>
    </div>-->
 
  </div>  
    
  <?php $this->load->view('admin/user/partials/graph');?> 
    
    
</section>