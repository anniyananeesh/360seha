<!-- Plugins loaded and strapped here -->
<link rel="stylesheet" href="<?php echo PLUGINS_DIR?>weekline/plugin.css" type="text/css" />
<script type="text/javascript" src="<?php echo PLUGINS_DIR?>weekline/plugin.min.js"></script>
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
    });
</script>
<style>
    a[href="#remove"] { display: none !important; }
</style>

<div class="choose_hours m-t-sm">
    <div class="col-md-6"> 
      <label>From</label>
      <input type="text" autocomplete="off" class="form-control timepicker-input" placeholder="XX : XX AM" name="open_time" id="open_time" value=""/>
    </div>
    <div class="col-md-6">
      <label>To</label>
      <input type="text" autocomplete="off" class="form-control timepicker-input m-n" placeholder="XX : XX PM" name="close_time" id="close_time" value=""/>
    </div>
    <div class="clearfix"></div>
    
</div>

<div class="clearfix"></div>

<div id="weekCal" class="weekDays-dark"></div>

<input type="hidden" id="chosen_weekdays" name="chosen_weekdays" value=""/>

<div class="clearfix"></div>
<div class="col-md-12 m-t-sm">
    <button class="btn btn-default" type="button" id="add_weekday_hrs">Add</button>
  <button class="btn" type="button" id="close_hours">Cancel</button>
</div>
<div class="clearfix"></div>