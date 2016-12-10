<!--SLIDER-->
      <div id="inner_slider">
          <div class="container">
              <div class="row">
                  <div class="col-lg-12">

                      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

                        <?php if($dataLeaderBoardAd):?>
                          <div class="carousel-inner" role="listbox">
                           
                              <div class="item active">

                                  <div class="col-lg-12 col-sm-12 nopads">
                                      <a href="<?php echo prep_url($dataLeaderBoardAd->url);?>" target="_blank">
                                        <img src="<?php echo ADS_SHOW_PATH.$dataLeaderBoardAd->image;?>" style="width: 100%; max-width: 728px;"/>
                                      </a>
                                  </div>
                              </div>
                              
                          </div>
                          <?php endif;?>
                     
                     </div>
                     
                     
                  </div>
              </div>
          </div>
      </div>
  <!--SLIDER-->
  
  
  
  <!--BODY CONTENT START-->
  
  <div id="about">
  	<div class="container">
    	<div class="row">
        	
            <div class="col-lg-12">
            	<h1><?php echo lang('auto.about_us')?></h1> 

    <strong>1. About the Site</strong>
    <p>Everything we offer on the Site is referred to in these Terms of Use collectively as the "Services". Some of what is on the Site is viewable without registering with us, but to actively participate or store your information, you must register as a member and authorize the use and disclosure of your personal and health information for purposes of allowing us to provide the Services and as otherwise disclosed in our Privacy Policy. You acknowledge that although some of the content, text, data, graphics, images, information, suggestions, guidance, and other material (collectively, “Information”) that is provided to you on the Site (including Information provided in direct response to your questions or postings) may be provided by individuals in the medical profession, the provision of such Information does not create a medical professional/patient relationship, and does not constitute an opinion, medical advice, or diagnosis or treatment of any particular condition, but is provided to assist you with locating appropriate medical care from a qualified practitioner.</p>

    <strong>2. We Do Not Provide Medical Advice</strong>
    <p>The Information that you obtain or receive from 360seha.com and its employees, contractors, partners, sponsors, advertisers, licensors or otherwise on the Site is for informational and scheduling purposes only. All medically related information comes from independent health care professionals and organizations. The information provided on the site and in any other communications from or provided through 360seha.com is not intended as a substitute for, nor does it replace, professional medical advice, diagnosis, or treatment.</p>
                
            </div>

        </div>
    </div>
  </div>
  
  <!--BODY CONTENT  END-->