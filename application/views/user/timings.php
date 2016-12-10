<div class="clear"></div>

		<div class="setup-body container-fluid text-center bg-grayed">

			<?php $this->load->view('user/menu', array('isPublish' => $published));?>

			<div class="content-body block">
 
				<?php $this->load->view('user/status', array('isPublish' => $published));?>
 
				<div class="setup-form block">
					
					<p class="h2 block strong"><?php echo lang('auto.business_timings')?></p>
					<p class="h3 block"><?php echo lang('auto.timings_subhead')?></p>

					<form action="" method="post" class="m-t-lg">
						
						<?php if(isset($Error)):?>
		                    <div class="flashmessage <?php echo(isset($Error) && $Error == 'Y') ? 'flashmessage-warning' : 'flashmessage-info';?>">
		                        <?php echo $MSG;?>
		                        <a class="close" onclick="javascript:$(this).parent().remove();" >
		                            <i class="ion-close-round"></i>
		                        </a>
		                    </div>
		              		<div class="clear"></div>
		           		<?php endif;?>

		           		<?php if($this->session->flashdata('message')):?>

							<div class="flashmessage flashmessage-info">
			                 	<?php echo $this->session->flashdata('message');?>
			                 	<a class="close" onclick="javascript:$(this).parent().remove();" >
			                    	<i class="ion-close-round"></i>
			               		</a>
			             	</div>
			            	<div class="clear"></div>
						    
						<?php endif;?>
	           		
						<div class="col-60">
							 
 							<div class="block timing-heads">
 								 
 								<a href="#" class="<?php echo ((isset($post['type'])) && $post['type'] == 1) ? 'active': '';?>" data-id="1"><i class="ion-checkmark-round"></i> <?php echo lang('auto.always_open')?></a>
 								<a href="#" class="<?php echo ((isset($post['type'])) && $post['type'] == 3) ? 'active': '';?>" data-open="true" data-id="3"><i class="ion-checkmark-round"></i> <?php echo lang('auto.open_for_selected_hours')?></a>

 								<input type="hidden" name="type" id="type" value="<?php echo ($post['type'] != NULL) ? $post['type'] : ''?>"/>

 							</div>

							<div class="clear"></div>

							<div id="openHours" class="<?php echo ((isset($post['type'])) && $post['type'] == 3) ? 'visible': 'hidden';?>">
 
								<div class="add-time-shifts block">
									
									<link rel="stylesheet" href="<?php echo PLUGINS_DIR?>/weekline/plugin.css" type="text/css" />
									<link rel="stylesheet" href="<?php echo PLUGINS_DIR?>/timepicker/jquery.timepicker.css" type="text/css" />
									<script type="text/javascript" src="<?php echo PLUGINS_DIR?>/weekline/plugin.min.js"></script>
									<script type="text/javascript" src="<?php echo PLUGINS_DIR?>/timepicker/jquery.timepicker.min.js"></script>

									<script type="text/javascript">
									 
									    $(function(){
									 	
									 		$('#open_time').timepicker(); 
       										$('#close_time').timepicker();

									        var weekCal = $("#weekCal").weekLine({
									            startDate: 0,
									            dayLabels: ["Sat", "Sun", "Mon", "Tue", "Wed", "Thu", "Fri"],
									            onChange: function () {
									                $("#chosen_weekdays").val(
									                    $(this).weekLine('getSelected', 'descriptive')
									                );
									            }
									        });

									        $(document).on('click','.delete-timing',function(e){

									        	e.preventDefault();
									        	$(this).parent().parent().remove();
        										return false;

									        });


									        $(document).on('click', '#addWeekDays', function(evt){

									        	evt.preventDefault();

									        	var weekDays = $('#chosen_weekdays').val(),
										            weekDays = cleanArray(weekDays.split(',')),
										            openTime = $('#open_time').val(),
										            closeTime = $('#close_time').val(),
										            error = false;
 
										        if(weekDays.length === 0)
										        {
										            error = 'Choose weekdays';
										        }

										        if(openTime === "" || closeTime === "")
										        {
										            error = 'Choose Timings and save';
										        }
        
										        if(!error || error === "")
										        {
										            var html = '';
										            for(i=0; i<weekDays.length; i++)
										            {
										 
														var wkDay = weekDays[i].split('-');
										                	html += '<tr> <td><input type="hidden" name="from_weekday[]" value="'+dayOfWeekAsInteger(wkDay[0])+'"/>'+wkDay[0].trim();

										                if(wkDay[1])
										                {
										                    html += ' - <input type="hidden" name="to_weekday[]" value="'+dayOfWeekAsInteger(wkDay[1])+'"/>'+wkDay[1].trim()+'</td> ';
										                }
										                html += '<td><input type="hidden" name="open_time[]" value="'+openTime+'"/>'+openTime+' - <input type="hidden" name="close_time[]" value="'+closeTime+'"/>'+closeTime+'</td>\n\
										<td><a class="left icon-delete block delete-timing" href="#"><i class="ion-close-round"></i></a></td></tr>';
										                
										            }

										            $('#timingList').append(html); 
										            //$('#chosen_weekdays').val('');

										        }else{
										            alert('Choose timings and weekdays ');
										        }

									        });

									    });

									    function cleanArray(actual)
									    {
									        var newArray = new Array();
									        for(var i = 0; i<actual.length; i++){
									            if (actual[i]){
									                newArray.push(actual[i]);
									            }
									        }
									        return newArray;
									    } 
									 
									    function dayOfWeekAsInteger(day)
									    {
									        switch(day.trim())
									        {
									            case "Sun":
									                return '1';
									            break;
									            case "Mon":
									                return '2';
									            break;
									            case "Tue":
									                return '3';
									            break;
									            case "Wed":
									                return '4';
									            break;
									            case "Thu":
									                return '5';
									            break;
									            case "Fri":
									                return '6';
									            break;
									            case "Sat":
									                return '0';
									            break;
									            default:
									                return '0';
									        }

									    }

									</script>

									<div class="block">

										<div class="col-5">
											<label class="setup-form-label block"><?php echo lang('auto.opening_time')?></label>
											<input type="text" class="setup-form-control setup-form-control-xs" id="open_time" name="open_time" />
										</div>

										<div class="col-5">
											<label class="setup-form-label block"><?php echo lang('auto.closing_time')?></label>
											<input type="text" class="setup-form-control setup-form-control-xs" id="close_time" name="close_time" />
										</div>
										<div class="clear"></div>

									</div>

									<div class="clear"></div>

									<div id="weekCal" class="weekDays-dark left"></div>
									<input type="hidden" id="chosen_weekdays" name="chosen_weekdays" value=""/>

									<div class="clear"></div>

									<button type="button" class="button button-sm button-secondary-hollow left button-clear" id="addWeekDays">
										<i class="ion-plus-round"></i>&nbsp;&nbsp;<?php echo lang('auto.add_shift')?>
									</button>

									<div class="clear"></div>

								</div>

								<div class="clear"></div>

								<div class="user-timings block">
 
									<table class="table table-striped" id="timingList">
										 
										<?php if($timings):?>
                                                
                                                <?php foreach($timings as $time):?>
                                                <tr> 
                                                    <td>

                                                        <?php if(isset($time->start_weekday) && $time->start_weekday != NULL):?>
                                                            <input type="hidden" name="from_weekday[]" value="<?php echo $time->start_weekday?>"/>
                                                            <?php echo $this->time_service->getWeekdayName($time->start_weekday,true)?>
                                                        <?php endif;?>
                                                        <?php if(isset($time->end_weekday) && $time->end_weekday != NULL):?>
                                                            - <input type="hidden" name="to_weekday[]" value="<?php echo $time->end_weekday?>"/>
                                                            <?php echo $this->time_service->getWeekdayName($time->end_weekday,true)?>
                                                        <?php endif;?>

                                                    </td>
                                                    <td><input type="hidden" name="open_time[]" value="<?php echo date('h:i A', strtotime($time->open_time))?>"/>
                                                        <input type="hidden" name="close_time[]" value="<?php echo date('h:i A', strtotime($time->close_time))?>"/>
                                                        <?php echo date('h:i A', strtotime($time->open_time))?> - <?php echo date('h:i A', strtotime($time->close_time))?>
                                                    </td>
                                                    <td> 
                                                        <a class="left icon-delete block delete-timing" href="#"><i class="ion-close-round"></i></a> 
                                                    </td>

                                                </tr>
                                                <?php endforeach;?>
                                            <?php endif;?>

									</table>

								</div> 

							</div>

							<script type="text/javascript">
								
								$(function(){

									$(document).on('click', '.timing-heads a', function(){

										$('.timing-heads a').removeClass('active');

										var attr = $(this).attr('data-open'),
											type = $(this).attr('data-id'),
											elem = $('#openHours');

										$(this).addClass('active');

										$('#type').val(type);

										if (typeof attr !== typeof undefined && attr !== false)
										{
										    elem.fadeIn(250).slideDown(250);
										}else{
											elem.slideUp(250).fadeOut(250);
											$("#openHours").removeClass('visible');
										}

										return false;

									});

									$(document).on('click', '#showWeekDays', function(evt){

										$('.add-time-shifts').fadeIn(250);
						            	evt.preventDefault();

									});

								})

							</script>

							<div class="clear"></div>

							<button class="button button-primary" type="submit"><i class="ion-checkmark-round"></i>&nbsp;&nbsp;<?php echo lang('auto.save')?></button>
							&nbsp;&nbsp;
							<button class="button button-green" type="button" onclick="javascript: window.location.href='<?php echo HOST_URL.$nextUrl?>'"><?php echo lang('auto.next')?> &nbsp;&nbsp;<i class="ion-arrow-right-c"></i></button>
							<div class="clear"></div>

						</div>

					</form> 

					<div class="clear"></div>

				</div>

				<div class="clear"></div>

			</div>

			<div class="clear"></div>

		</div>