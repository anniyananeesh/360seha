<link rel="stylesheet" href="<?php echo PLUGINS_DIR?>/weekline/plugin.css" type="text/css" />
<script type="text/javascript" src="<?php echo PLUGINS_DIR?>/weekline/plugin.min.js"></script>

<script type="text/javascript">
 
    $(function(){
 
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

<div class="modal block">
	
	<div class="modal-header block">
		Business Timings

		<button class="button-clear right" onclick="Custombox.close();">
			<i class="ion-close-round"></i>
		</button>
	</div>

	<form action="" method="post" id="sendMessageFrm" name="sendMessageFrm" class="nomargins nopad">

		<div class="modal-body block">
		
			<div class="block">
				<div class="col-5 normal">From</div>
				<div class="col-5 normal">To</div>
			</div>

			<div class="clear"></div>

			<div id="weekCal" class="weekDays-dark"></div>
			<input type="hidden" id="chosen_weekdays" name="chosen_weekdays" value=""/>

		</div>

		<div class="modal-footer block">
			<button class="button button-primary button-sm" type="button" id="sendMessageBtn">Send</button>
		</div>

	</form>

</div>