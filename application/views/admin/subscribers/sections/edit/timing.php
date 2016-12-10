<div class="form-group">
    <label class="col-sm-2 control-label" for="input-id-1"><strong>Open Timings</strong></label>
    <div class="col-sm-10">
 
        <div class="row">

            <label class="m-r-md"><input type="radio" name="open_hrs" onclick="javascript: ShowOpenHours(0)" value="0" <?php if($post["open_hrs"] == 0):?>  checked<?php endif;?> value="0"> No Hours Available</label>
            <label class="m-r-md"><input type="radio" name="open_hrs" onclick="javascript: ShowOpenHours(1)" value="1" <?php if($post["open_hrs"] == 1):?>  checked<?php endif;?> value="0"> Always Open</label>
            <label class="m-r-md"><input type="radio" name="open_hrs" onclick="javascript: ShowOpenHours(2)" value="2" <?php if($post["open_hrs"] == 2):?>  checked<?php endif;?> value="0"> Permanently Closed</label>
            <label class="m-r-md"><input type="radio" name="open_hrs" onclick="javascript: ShowOpenHours(3)" value="3" <?php if($post["open_hrs"] == 3):?>  checked<?php endif;?> value="0"> Open For Selected Hours</label>
 
            <div class="clearfix"></div>
            <div class="hours_handler col-md-4 m-t-md" <?php if($post["open_hrs"] == 3):?> style="display: block;"<?php endif;?>>
                
                <table class="table table-striped b-t b-light m-b-md">
                        
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
                                    <a class="btn btn-danger btn-xs delete_entry RmTmEntry" href="#">Delete</a> 
                                </td>

                            </tr>
                            <?php endforeach;?>
                        <?php endif;?> 
 
                </table>

                <div class="clearfix"></div>
                <button class="btn" type="button" id="add_hrs">Add Hours</button>

            </div>

            <div class="clearfix"></div>
            <div class="show_hours m-t-md"></div>

        </div>

    </div>
                      
</div>  