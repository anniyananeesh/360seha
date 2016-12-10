<section class="scrollable padder">
    <div class="m-b-md">
        <h3 class="m-b-none font-thin"><i class="fa fa-plus-circle"></i> <?php echo $title;?></h3>
        <button class="btn btn-default btn-rounded" style="float: right; margin-top: -30px;" onclick="javascript: window.location.href='<?php echo $ctrlUrl?>'"><i class="i i-list2"></i> Back</button>
    </div>
    
    <section class="panel panel-default">
        
        <header class="panel-heading" style="font-size: 15px;">
          <?php echo $sub_title;?>
        </header>
        
                <div class="panel-body">
                    
                    <form class="form-horizontal" method="post" enctype="multipart/form-data"> 

                    <div class="form-group">
                        <label class="col-sm-2 control-label"><strong>Title <span class="required-txt">*</span></strong></label>
                      <div class="col-sm-4">
                          <input type="text" autofocus autocomplete="off" class="form-control" name="title" id="title" value="<?php echo $record->title;?>"/>
                          
                          <?php if(form_error('title')):?>
                            <div class="error_info">
                                                                
                                <?php echo form_error('title');?> ...
                            </div>
                          <?php else:?>
                          
                            <span class="help-block m-b-none text-muted">Eg:- Nike Ads (728 X 90), Personal...</span>
                          <?php endif;?>
                      </div>
                    </div>
                      
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label"><strong>Title (Arabic)<span class="required-txt">*</span></strong></label>
                      <div class="col-sm-4">
                          <input type="text" autofocus autocomplete="off" class="form-control" name="title_ar" id="title_ar" value="<?php echo $record->title_ar;?>"/>
                          
                          <?php if(form_error('title_ar')):?>
                            <div class="error_info">
                                                                
                                <?php echo form_error('title_ar');?> ...
                            </div> 
                          <?php endif;?>
                      </div>
                    </div>
                      
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label"><strong>Google Adsense Ad</strong></label>
                      <div class="col-sm-4">
                          
                          <div class="col-sm-12">
                            <label class="switch left">
                                <input type="checkbox" value="1" name="is_google_adsense" id="is_google_adsense" <?php if($record->is_adsense == 1):?> checked <?php endif;?>>
                               <span></span>
                            </label> 
                            
                          </div>
                          
                      </div>
                    </div>
                    
                    <div id="show_img_ad_upld" <?php if($record->is_adsense == 1):?> style="display: none;"<?php else:?> style="display: block;"<?php endif;?>>
                        
                        <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                        <div class="form-group">

                            <label class="col-sm-2 control-label"><strong>Image</strong></label>
                          <div class="col-sm-10">
                              
                            <?php if(isset($record->image) && $record->image != NULL):?>
                                <img src="<?php echo base_url()?>uploads/ads/<?php echo $record->image?>" class="m-b-md b b-success"/>                         
                            <?php endif;?>
                                
                            <input type="file" class="filestyle" name="userfile" data-icon="false" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s">
                            <div class="help-block">
                                Upload the Ad Image file | Allowed *.jpg, *.png                        
                            </div>

                            <?php if(isset($error)):?>
                                <div class="error_info">

                                    <?php echo $error;?> ...
                                </div> 
                            <?php endif;?> 

                          </div>

                        </div>
                        
                        <div class="line line-dashed b-b line-lg pull-in"></div>
                        
                        <div class="form-group">
                        <label class="col-sm-2 control-label"><strong>Advert URL <span class="required-txt">*</span></strong></label>
                        <div class="col-sm-4">
                          <input type="text" autofocus autocomplete="off" class="form-control" name="url" id="url" value="<?php echo $record->url;?>"/>
                          
                          <?php if(form_error('url')):?>
                            <div class="error_info">
                                                                
                                <?php echo form_error('url');?> ...
                            </div> 
                          <?php endif;?>
                      </div>
                    </div>
                        
                    </div>
                    
                    <div id="show_google_adsense_scrpt" <?php if($record->is_adsense == 1):?> style="display: block;"<?php else:?> style="display: none;"<?php endif;?>>
                        
                        <div class="line line-dashed b-b line-lg pull-in"></div> 

                        <div class="form-group">
                            
                          <label class="col-sm-2 control-label"><strong>Google Adsense Code</strong></label>
                          <div class="col-sm-10">

                              <textarea  name="script" id="script" class="form-control" style="overflow:scroll;height:150px;max-height:150px"><?php echo $record->adsense_script ;?></textarea>
                              <?php if(form_error('script')):?>
                                    <div class="error_info">

                                      <?php echo form_error('script');?> ...
                                    </div> 
                                <?php endif;?>
                            </div>
                          
                        </div>
                        
                    </div>
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="input-id-1"><strong>Where to place this ad? <span class="required-txt">*</span></strong></label>
                      <div class="col-sm-4"> 
                          
                        <div class="row">

                            <div class="col-md-6"> 
                                <select style="width:260px" class="chosen-select" name="ad_area" id="ad_area"/>
                                    <option value="">Choose Position</option>
                                    <option value="1" <?php if($record->ad_area == 1):?> selected<?php endif;?>>Home Page Top ( 728 X 90 )</option>
                                    <option value="2" <?php if($record->ad_area == 2):?> selected<?php endif;?>>Sub Page Left ( 300 X 250 )</option>
                                    <option value="3" <?php if($record->ad_area == 3):?> selected<?php endif;?>>Mobile Ads ( 300x250, 250x250, 200x200 , 320x100, 320x50 )</option>
                                    <option value="4" <?php if($record->ad_area == 4):?> selected<?php endif;?>>Map Banner (320 X 50)</option>
                                </select>
                                <?php if(form_error('ad_area')):?>
                                    <div class="error_info">

                                       <?php echo form_error('ad_area');?> ...
                                    </div> 
                                <?php endif;?>
                                
                            </div>
 
                        </div> 
                           
                      </div>
                      
                    </div>
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label"><strong>Show this ad?</strong></label>
                      <div class="col-sm-4">
                          
                          <div class="col-sm-12">
                            <label class="switch left">
                                <input type="checkbox" value="1" name="show_status" id="show_status" <?php if($record->show_status == 1):?> checked <?php endif;?>>
                               <span></span>
                            </label> 
                            
                          </div>
                          
                      </div>
                    </div>
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                      <div class="col-sm-4 col-sm-offset-2">
                        <button type="button" class="btn btn-default btn-rounded" onclick="javascript: location.href='<?php echo $ctrlUrl?>'">Cancel</button>
                        <button type="submit" class="btn btn-success btn-rounded m-l-sm">Save changes</button>
                      </div>
                    </div>
                  </form>
                </div>
              </section>
    
</section>

<script type="text/javascript">
    
    $(function(){
        $(document).on('click', '#is_google_adsense', toggleDivs);
    })    
    
    function toggleDivs()
    {
        if($('#is_google_adsense').is(":checked"))
        {
            $('#show_google_adsense_scrpt').show();
            $('#show_img_ad_upld').hide();
        }else{
            
            $('#show_google_adsense_scrpt').hide();
            $('#show_img_ad_upld').show();
        }
    }
    
</script>