<section class="scrollable padder">
    <div class="m-b-md">
        <h3 class="m-b-none font-thin"><?php echo $title;?></h3>
    </div>

    <?php if(isset($message)):?>
    
        <div class="alert alert-success">
 
            <i class="fa fa-ok-sign"></i>
            <?php echo $message;?>
        </div>
    
    <?php endif;?>
 
    
    <section class="panel panel-default">
        
                <header class="panel-heading" style="font-size: 15px;">
                  Settings
                </header>
        
                <div class="panel-body">
                    
                  <form class="form-horizontal" method="post"> 
 
                    <div class="row wrapper padder">
                        
                        <label class="col-sm-2 control-label"><strong>Choose Subscribers to be included <span class="required-txt">*</span></strong></label>
                        <div class="col-sm-5">
                            
                            <div class="panel panel-default">
 
                                <div>
 
                                    <table class="table table-striped b-t b-light small-table">
 
                                        <thead>
                                            
                                            <tr>
                                              <th width="40">
                                                  <label class="checkbox m-l m-t-none m-b-none i-checks">
                                                      <input type="checkbox"><i></i>
                                                  </label>
                                              </th>
                                              <th width="180">Subscriber Name</th>
                                              <th>Email</th>
                                            </tr>
                                            
                                        </thead>
                                        
                                        <?php foreach($subscribers as $subs):?>
                                            
                                            <tr>
                                              <td width="40">
                                                  <label class="checkbox m-l m-t-none m-b-none i-checks">
                                                      <input type="checkbox" name="subscriber[]" value="<?php echo $subs->user_id?>"><i></i>
                                                  </label>
                                                  <?php $_id = $this->encrypt->encode($subs->user_id);?>
                                              </td>
                                              <td width="180"><?php echo $subs->subs_title?></td>
                                              <td><?php echo $subs->subs_email?></td>
                                            </tr>
                                        
                                        <?php endforeach;?>
 
                                    </table>
                                    
                                    <div class="clearfix"></div>
                                     
                                </div>

                            </div>
                            
                            <?php if(form_error('subscriber')):?>
                                <div class="error_info">

                                    <?php echo form_error('subscriber');?> ...
                                </div> 
                            <?php endif;?>
                            
                        </div>
                          
                    </div>
                      
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                    <div class="form-group">
                        
                      <label class="col-sm-2 control-label"><strong>From</strong></label>
                      <div class="col-sm-4">
                          
                          <input type="text" autofocus autocomplete="off" class="form-control" name="from_name" id="from_name" value="<?php echo $config['from_nl_name']['value'];?>"/>
                          <?php if(form_error('from_name')):?>
                            <div class="error_info">
                                                                
                                <?php echo form_error('from_name');?> ...
                            </div> 
                          <?php endif;?>
                      </div>
                    </div>
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label"><strong>From the email:</strong></label>
                      <div class="col-sm-4">
                          
                          <input type="text" autofocus autocomplete="off" class="form-control" name="from_email" id="from_email" value="<?php echo $config['from_nl_mail']['value'];?>"/>
                          <?php if(form_error('from_email')):?>
                            <div class="error_info">
                                                                
                                <?php echo form_error('from_email');?> ...
                            </div> 
                          <?php endif;?>
                      </div>
                    </div>
                    
                    <?php if($config['nl_server']['value'] == 'MailChimp'):?>
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                      
                    <div class="form-group">
                        
                      <label class="col-sm-2 control-label" for="input-id-1"><strong>Newsletter Server</strong></label>
                      
                      <div class="col-sm-10"> 
                          
                        <div class="row">

                            <div class="col-md-12">
                                
                                <select style="width:260px" class="chosen-select" name="nl_server" id="nl_server"/>
 
                                    <option value="Localhost" <?php if($config['nl_server']['value'] == 'Localhost'):?> selected<?php endif;?>>Local Server</option>
                                    <option value="MailChimp" <?php if($config['nl_server']['value'] == 'MailChimp'):?> selected<?php endif;?>>Mail Chimp</option>
                                </select>
                                <div class="help-block text-success">
                                   You have enabled your MailChimp Account . If you want to send thru MailChimp or your Web server please choose.                                   
                                </div>
                                
                            </div>
 
                        </div> 
                           
                      </div>
                      
                    </div>
                    
                    <?php endif;?> 
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                      
                    <div class="form-group">
                        
                      <label class="col-sm-2 control-label" for="input-id-1"><strong>Contact List <span class="required-txt">*</span></strong></label>
                      
                      <div class="col-sm-10"> 
                          
                        <div class="row">

                            <div class="col-md-12">
                                
                                <select style="width:260px" class="chosen-select" name="c_list" id="c_list"/>
                                    
                                    <option value="">Choose Contact List</option>
                                    <?php foreach($clists as $cl):?>
                                        
                                        <?php $_id = $this->encrypt->encode($cl->id);?>
                                        <option value="<?php echo $_id;?>" <?php echo set_select('c_list', $_id)?>><?php echo $cl->list_title.'  ('.$cl->contacts_count.')';?></option>
                                    <?php endforeach;?>
                                    
                                </select>
                                
                            </div>
 
                        </div>
                          
                        <?php if(form_error('c_list')):?>
                          
                            <div class="error_info">
                                                                
                                <?php echo form_error('c_list');?> ...
                            </div> 
                        <?php endif;?>
                           
                      </div>
                      
                    </div>
                    <input type="hidden" name="nl_tpl" value="general"/>
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label"><strong>Subject <span class="required-txt">*</span></strong></label>
                      <div class="col-sm-4">
                          
                          <input type="text" autofocus autocomplete="off" class="form-control" name="nl_subject" id="nl_subject" value=""/>
                          <?php if(form_error('nl_subject')):?>
                            <div class="error_info">
                                                                
                                <?php echo form_error('nl_subject');?>
                            </div> 
                          <?php endif;?>
                      </div>
                    </div>
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label"><strong>Additional Content at the bottom of newsletter</strong></label>
                      <div class="col-sm-10">
                        <div class="btn-toolbar m-b-sm btn-editor" data-role="editor-toolbar" data-target="#editor">
                          <div class="btn-group">
                            <a class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" title="Font"><i class="fa fa-font"></i><b class="caret"></b></a>
                              <ul class="dropdown-menu">
                              </ul>
                          </div>
                          <div class="btn-group">
                            <a class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="fa fa-text-height"></i>&nbsp;<b class="caret"></b></a>
                              <ul class="dropdown-menu">
                              <li><a data-edit="fontSize 5"><font size="5">Huge</font></a></li>
                              <li><a data-edit="fontSize 3"><font size="3">Normal</font></a></li>
                              <li><a data-edit="fontSize 1"><font size="1">Small</font></a></li>
                              </ul>
                          </div>
                          <div class="btn-group">
                            <a class="btn btn-default btn-sm" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
                            <a class="btn btn-default btn-sm" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>
                            <a class="btn btn-default btn-sm" data-edit="strikethrough" title="Strikethrough"><i class="fa fa-strikethrough"></i></a>
                            <a class="btn btn-default btn-sm" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="fa fa-underline"></i></a>
                          </div>
                          <div class="btn-group">
                            <a class="btn btn-default btn-sm" data-edit="insertunorderedlist" title="Bullet list"><i class="fa fa-list-ul"></i></a>
                            <a class="btn btn-default btn-sm" data-edit="insertorderedlist" title="Number list"><i class="fa fa-list-ol"></i></a>
                            <a class="btn btn-default btn-sm" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="fa fa-dedent"></i></a>
                            <a class="btn btn-default btn-sm" data-edit="indent" title="Indent (Tab)"><i class="fa fa-indent"></i></a>
                          </div>
                          <div class="btn-group">
                            <a class="btn btn-default btn-sm" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="fa fa-align-left"></i></a>
                            <a class="btn btn-default btn-sm" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="fa fa-align-center"></i></a>
                            <a class="btn btn-default btn-sm" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="fa fa-align-right"></i></a>
                            <a class="btn btn-default btn-sm" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="fa fa-align-justify"></i></a>
                          </div>
                          <div class="btn-group">
                            <a class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="fa fa-link"></i></a>
                            <div class="dropdown-menu">
                              <div class="input-group m-l-xs m-r-xs">
                                <input class="form-control input-sm" placeholder="URL" type="text" data-edit="createLink"/>
                                <div class="input-group-btn">
                                  <button class="btn btn-default btn-sm" type="button">Add</button>
                                </div>
                              </div>
                            </div>
                            <a class="btn btn-default btn-sm" data-edit="unlink" title="Remove Hyperlink"><i class="fa fa-cut"></i></a>
                          </div>
                          
                          <div class="btn-group hide">
                            <a class="btn btn-default btn-sm" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="fa fa-picture-o"></i></a>
                            <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" />
                          </div>
                          <div class="btn-group">
                            <a class="btn btn-default btn-sm" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
                            <a class="btn btn-default btn-sm" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
                          </div>
                        </div>
                          <textarea id="editor" name="content" class="form-control" style="overflow:scroll;height:250px;max-height:250px"></textarea>
                      </div>
                    </div>
 
                    <div class="line line-dashed b-b line-lg pull-in m-t-lg"></div>
                    
                    <div class="form-group">
                      <div class="col-sm-4 col-sm-offset-2">
                        <button type="submit" class="btn btn-success btn-lg btn-rounded font-thin">Send this newsletter</button>
                      </div>
                    </div>
                    
                  </form>
                    
                </div>
        
              </section>
    
</section>

<script type="text/javascript">
    
    $(function(){
       
       $(document).on('change', '#nl_server', showEnableMailChimpKey);
        
    });
    
    function showEnableMailChimpKey()
    {
        
        var server = $(this).val();

        if(server === 'Localhost')
        {
            $("#mailchimp_id").attr('disabled','disabled');
        }else if(server === 'MailChimp')
        {
            $("#mailchimp_id").removeAttr('disabled');            
        }
        
    }
    
</script>