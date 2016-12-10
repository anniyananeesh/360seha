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
 <?php if(RTL):?>

  <style type="text/css">

      .SumoSelect > .optWrapper > .options li label
      {
        padding-right: 35px!important;
      }

  </style>

 <?php endif;?>

  <!--BODY CONTENT START-->

  <div id="about">
  	<div class="container">
    	<div class="row">

            <div class="col-lg-8">
            	<h1><?php echo lang('auto.list_your_health_company')?></h1>

              <form action="" name="contactUs" id="contactUs" class="contact-frm" method="post">

                  <?php if(isset($Error)):?>
                      <div class="alert <?php echo(isset($Error) && $Error == 'Y') ? 'alert-danger' : 'alert-success';?>">
                          <?php echo $MSG;?>
                          <a class="close" onclick="javascript:$(this).parent().remove();" >
                              <i class="ion-close-round"></i>
                          </a>
                      </div>
                    <div class="clearfix"></div>
                  <?php endif;?>


                  <div class="col-lg-12 row">


                      <div class="row form-group">

                          <div class="col-lg-12">

                              <label class="form-label"><?php echo lang('auto.company_name')?> <span class="required">*</span></label>
                              <input type="text" class="form-control form-control-text <?php echo (form_error('name_en')) ? 'error-border' : ''?>" placeholder="" name="name_en" id="name_en" data-toggle="tooltip" <?php echo (form_error('name_en')) ? 'title="'.form_error('name_en').'"' : ''?> value="<?php echo set_value('name_en')?>"/>
                              <div class="clearfix"></div>
                          </div>

                      </div>

                      <div class="clearfix"></div>

                      <div class="row form-group">

                          <div class="col-lg-12">
                              <label class="form-label"><?php echo lang('auto.company_name_ar')?> </label>
                              <input type="text" class="form-control form-control-text <?php echo (form_error('name_ar')) ? 'error-border' : ''?>" placeholder="" name="name_ar" id="name_ar" data-toggle="tooltip" <?php echo (form_error('name_ar')) ? 'title="'.form_error('name_ar').'"' : ''?> value="<?php echo set_value('name_ar')?>"/>
                              <div class="clearfix"></div>
                          </div>

                          <div class="clearfix"></div>

                      </div>

                      <div class="clearfix"></div>

                      <div class="row form-group">


                          <div class="col-lg-12">


                                <label class="form-label"><?php echo lang('auto.you_are_a')?> <span class="required">*</span></label>
                                <select class="form-control <?php echo (form_error('category')) ? 'error-border' : ''?>" name="category" <?php echo (form_error('category')) ? 'title="'.form_error('category').'"' : ''?> data-toggle="tooltip">
                                  <option value=""><?php echo lang('auto.choose')?></option>
                                  <?php foreach($category AS $key => $value):?>
                                    <option value="<?php echo $value->id_category?>" <?php echo set_select('category', $value->id_category)?>><?php echo $value->{name_.$lan}?></option>
                                  <?php endforeach;?>
                                </select>
                               <div class="clearfix"></div>

                          </div>

                          <div class="clearfix"></div>

                      </div>

                      <div class="clearfix"></div>

                      <div class="row form-group">

                          <div class="col-lg-12">

                                <label class="form-label"><?php echo lang('auto.having_depts_in')?> <span class="required">*</span></label>

                                <div class="clearfix"></div>

                                <select multiple="multiple" name="departments[]" id="departments" class="departments">
                                    <?php foreach($departments as $data):?>
                                      <option value="<?php echo $data->dept_title_en;?>" <?php echo (in_array($data->dept_title_en, $post['departments'])) ? 'selected' : '';?>><?php echo $data->{dept_title_.$lan}?></option>
                                    <?php endforeach;?>
                                </select>

                          </div>

                          <div class="clearfix"></div>

                          <script type="text/javascript">

                              $(function(){

                                $('.departments').SumoSelect({placeholder: 'Choose departments',csvDispCount: 5, search: true});

                              });

                          </script>

                      </div>

                      <div class="clearfix"></div>

                      <div class="row form-group">

                          <div class="col-lg-12">

                              <label class="form-label"><?php echo lang('auto.official_email_address')?> </label>
                              <input type="text" data-toggle="tooltip" class="form-control form-control-text <?php echo (form_error('email')) ? 'error-border' : ''?>" placeholder="" name="email" id="email" <?php echo (form_error('email')) ? 'title="'.form_error('email').'"' : ''?> value="<?php echo set_value('email')?>"/>

                              <div class="clear"></div>

                          </div>

                          <div class="clearfix"></div>

                      </div>

                      <div class="row form-group">

                          <div class="col-lg-12">

                                <label class="form-label"><?php echo lang('auto.contact_no')?> <span class="required">*</span></label>
                                <input type="text" data-toggle="tooltip" class="form-control form-control-text <?php echo (form_error('contact_no')) ? 'error-border' : ''?>" placeholder="" name="contact_no" id="contact_no" <?php echo (form_error('contact_no')) ? 'title="'.form_error('contact_no').'"' : ''?> value="<?php echo set_value('contact_no')?>"/>

                                <div class="clearfix"></div>

                          </div>

                          <div class="clearfix"></div>

                      </div>

                      <div class="clearfix"></div>

                      <div class="row form-group">


                          <div class="col-lg-12">

                              <label class="form-label"><?php echo lang('auto.share_your_location')?> <span class="required">*</span></label>
                              <button type="button" class="button button-share" id="share-lc"><?php echo lang('auto.share')?></button>
                              <div class="clearfix"></div>

                              <input type="hidden" name="latitude" id="_sj_latitude"/>
                              <input type="hidden" name="longitude" id="_sj_longitude"/>

                              <input type="hidden" name="country" id="country"/>
                              <input type="hidden" name="city" id="city"/>

                              <div class="block" id="location-info">

                              </div>

                              <script type="text/javascript">

                                $(function(){

                                  $(document).on('click','#share-lc', function(){

                                      $('#location-info').html('<div class="loader loader-sm"></div>');
                                      processGeolocation(function(_callback){

                                          if(_callback)
                                          {

                                            $('#_sj_latitude').val(_callback.coords.latitude);
                                            $('#_sj_longitude').val(_callback.coords.longitude);

                                            var geocodingAPI = "https://maps.googleapis.com/maps/api/geocode/json?latlng="+ _callback.coords.latitude +","+ _callback.coords.longitude +"";

                                            $.getJSON(geocodingAPI, function (json) {
                                                 if (json.status == "OK")
                                                 {
                                                     //Check result 0
                                                     var result = json.results[0]; console.log(result);
                                                     //look for locality tag and administrative_area_level_1
                                                     var city = "",state = "", country = "";
                                                     for (var i = 0, len = result.address_components.length; i < len; i++)
                                                     {
                                                        var ac = result.address_components[i];
                                                        if (ac.types.indexOf("administrative_area_level_1") >= 0) state = ac.long_name;
                                                        if (ac.types.indexOf("sublocality_level_1") >= 0) city = ac.long_name;
                                                        if (ac.types.indexOf("country") >= 0) country = ac.long_name;
                                                     }

                                                     if (state != '')
                                                     {
                                                        $('#location-info').html('');
                                                        $('#location-info').html("<i class='ion-location'></i> "+ city + ", " + state);

                                                        $('#country').val(country);
                                                        $('#city').val(state);
                                                     }

                                                 }

                                            });

                                          }
                                          else
                                          {
                                            alert('Unable to share your location : Device not supported');
                                            $('#location-info').html('');
                                          }

                                      });

                                  });

                                });


                                function processGeolocation(cb)
                                {
                                  navigator.geolocation.getCurrentPosition(function(position) { cb(position);}, function(error){cb(false);});
                                }

                              </script>

                              <div class="clear"></div>

                          </div>

                      </div>

                      <div class="clearfix"></div>

                      <div class="row form-group">

                          <div class="col-lg-12">
                              <label class="form-label"><?php echo lang('auto.tell_more_about_your_company')?></label>
                              <textarea class="form-control form-control-text form-control-textarea <?php echo (form_error('description_en')) ? 'error-border' : ''?>" placeholder="" name="description_en" id="description_en" data-toggle="tooltip" <?php echo (form_error('description_en')) ? 'title="'.form_error('description_en').'"' : ''?>></textarea>

                              <div class="clearfix"></div>
                          </div>

                          <div class="clearfix"></div>

                      </div>

                      <div class="clearfix"></div>

                      <div class="clearfix"></div>

                      <div class="form-group">
                        <button type="submit" class="btn btn-primary pull-left"><?php echo lang('auto.submit_registration')?></button>
                      </div>


                  </div>


              </form>

            </div>

        </div>
    </div>
  </div>

  <!--BODY CONTENT  END-->
