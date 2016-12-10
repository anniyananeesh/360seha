<div class="clear"></div>

		<div class="setup-body container-fluid text-center bg-grayed">

			<?php $this->load->view('user/menu', array('isPublish' => $profileData->published));?>

			<div class="content-body block">

				<?php $this->load->view('user/status', array('isPublish' => $profileData->published));?>

				<div class="setup-form block">

					<p class="h2 block strong"><?php echo lang('auto.location_info')?></p>
					<p class="h3 block"><?php echo lang('auto.setup_subhead')?></p>

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

							<div class="col-5">
								<div class="setup-form-group block">
									<label class="setup-form-label block"><?php echo lang('auto.country')?></label>
									<select class="setup-form-control setup-form-control-sm block <?php echo (form_error('country')) ? 'error-border' : ''?>" id="country" name="country" <?php echo (form_error('country')) ? 'title="'.form_error('country').'"' : ''?>>
										<option value=""><?php echo lang('auto.choose')?></option>
										<?php foreach($country AS $key => $value):?>
											<option value="<?php echo $value->id?>" <?php echo ($profileData->subs_country == $value->id) ? 'selected' : ''?>><?php echo $value->{name_.$lan}?></option>
										<?php endforeach;?>
									</select>
								</div>
								<div class="clear"></div>
							</div>

							<div class="col-5 nopad">
								<div class="setup-form-group block">
									<label class="setup-form-label block"><?php echo lang('auto.city')?></label>
									<select class="setup-form-control setup-form-control-sm block <?php echo (form_error('city')) ? 'error-border' : ''?>" id="city" name="city" <?php echo (form_error('city')) ? 'title="'.form_error('city').'"' : ''?>>
										<option value=""><?php echo lang('auto.choose')?></option>
										<?php foreach($city AS $key => $value):?>
											<option value="<?php echo $value->id?>" <?php echo ($profileData->subs_state == $value->id) ? 'selected' : ''?>><?php echo $value->{name_.$lan}?></option>
										<?php endforeach;?>
									</select>
								</div>
							</div>

							<div class="clear"></div>

							<div class="col-5">
								<div class="setup-form-group block">
									<label class="setup-form-label block"><?php echo lang('auto.full_address_english')?></label>
									<textarea class="setup-form-control setup-form-control-sm block <?php echo (form_error('address_en')) ? 'error-border' : ''?>" name="address_en" rows="3" id="address_en" <?php echo (form_error('address_en')) ? 'title="'.form_error('address_en').'"' : ''?>><?php echo $profileData->address_en?></textarea>
								</div>
							</div>

							<div class="col-5 nopad">
								<div class="setup-form-group block">
									<label class="setup-form-label block"><?php echo lang('auto.full_address_arabic')?></label>
									<textarea class="setup-form-control setup-form-control-sm block <?php echo (form_error('address_ar')) ? 'error-border' : ''?>" name="address_ar" id="address_ar" rows="3" <?php echo (form_error('address_ar')) ? 'title="'.form_error('address_en').'"' : ''?>><?php echo $profileData->address_ar?></textarea>
								</div>
							</div>

							<div class="clear"></div>

							<!-- <div class="clear"></div>

							<div class="col-5">
								<div class="setup-form-group block">
									<label class="setup-form-label block"><?php echo lang('auto.parking')?></label>
									<textarea class="setup-form-control setup-form-control-sm block <?php echo (form_error('parking_en')) ? 'error-border' : ''?>" name="parking_en" rows="3" id="parking_en" <?php echo (form_error('parking_en')) ? 'title="'.form_error('parking_en').'"' : ''?>><?php echo $profileData->parking_en?></textarea>
								</div>
							</div>

							<div class="col-5 nopad">
								<div class="setup-form-group block">
									<label class="setup-form-label block"><?php echo lang('auto.parking_ar')?></label>
									<textarea class="setup-form-control setup-form-control-sm block <?php echo (form_error('parking_ar')) ? 'error-border' : ''?>" name="parking_ar" rows="3" id="parking_ar" <?php echo (form_error('parking_ar')) ? 'title="'.form_error('parking_ar').'"' : ''?>><?php echo $profileData->parking_ar?></textarea>
								</div>
							</div>

							<div class="clear"></div>

							<div class="col-5">
								<div class="setup-form-group block">
									<label class="setup-form-label block"><?php echo lang('auto.bus_station')?></label>
									<textarea class="setup-form-control setup-form-control-sm block <?php echo (form_error('bus_station_en')) ? 'error-border' : ''?>" name="bus_station_en" rows="3" id="bus_station_en" <?php echo (form_error('bus_station_en')) ? 'title="'.form_error('bus_station_en').'"' : ''?>><?php echo $profileData->bus_station_en?></textarea>
								</div>
							</div>

							<div class="col-5 nopad">
								<div class="setup-form-group block">
									<label class="setup-form-label block"><?php echo lang('auto.bus_station_ar')?></label>
									<textarea class="setup-form-control setup-form-control-sm block <?php echo (form_error('bus_station_ar')) ? 'error-border' : ''?>" name="bus_station_ar" id="bus_station_ar" rows="3" <?php echo (form_error('bus_station_ar')) ? 'title="'.form_error('bus_station_ar').'"' : ''?>><?php echo $profileData->bus_station_ar?></textarea>
								</div>
							</div>

							<div class="clear"></div>

							<div class="col-5">
								<div class="setup-form-group block">
									<label class="setup-form-label block"><?php echo lang('auto.metro')?></label>
									<textarea class="setup-form-control setup-form-control-sm block <?php echo (form_error('metro_en')) ? 'error-border' : ''?>" name="metro_en" rows="3" id="metro_en" <?php echo (form_error('metro_en')) ? 'title="'.form_error('metro_en').'"' : ''?>><?php echo $profileData->metro_en?></textarea>
								</div>
							</div>

							<div class="col-5 nopad">
								<div class="setup-form-group block">
									<label class="setup-form-label block"><?php echo lang('auto.metro_ar')?></label>
									<textarea class="setup-form-control setup-form-control-sm block <?php echo (form_error('metro_ar')) ? 'error-border' : ''?>" name="metro_ar" rows="3" id="metro_ar" <?php echo (form_error('metro_ar')) ? 'title="'.form_error('metro_ar').'"' : ''?>><?php echo $profileData->metro_ar?></textarea>
								</div>
							</div>-->

							<div class="clear"></div>

							<div class="col-5">
								<div class="setup-form-group block">
									<label class="setup-form-label block">Latitude</label>
									<input type="text" class="setup-form-control setup-form-control-sm block <?php echo (form_error('_lat')) ? 'error-border' : ''?>" id="_lat" name="_lat" <?php echo (form_error('_lat')) ? 'title="'.form_error('_lat').'"' : ''?> value="<?php echo $profileData->subs_lat_id?>"/>
								</div>
							</div>

							<div class="col-5 nopad">
								<div class="setup-form-group block">
									<label class="setup-form-label block">Longitude</label>

									<input type="text" class="setup-form-control setup-form-control-sm block <?php echo (form_error('_long')) ? 'error-border' : ''?>" id="_long" name="_long" <?php echo (form_error('_long')) ? 'title="'.form_error('_long').'"' : ''?> value="<?php echo $profileData->subs_long_id?>"/>
								</div>
							</div>

							<div class="clear"></div>


							<div class="col-10 m-t-lg">

								<div class="setup-form-group block">
									<div class="block">
										<label class="setup-form-label block left"><?php echo lang('auto.google_maps')?></label>
										<label class="setup-form-label block right">
											<input type="checkbox" id="verify_location" name="verify_location" />&nbsp;&nbsp;<?php echo lang('auto.verified_my_location')?>
										</label>
									</div>
									<div class="clear"></div>
									<div class="block m-t-sm">

										<div id="gmapCanvas" class="setup-gmap"></div>

									</div>

								</div>

							</div>

							<button class="button button-primary" type="submit" id="submitLocationBtn"><i class="ion-checkmark-round"></i>&nbsp;&nbsp;<?php echo lang('auto.save')?></button>
							&nbsp;&nbsp;
							<button class="button button-green" type="button" onclick="javascript: window.location.href='<?php echo HOST_URL.$nextUrl?>'"><?php echo lang('auto.next')?> &nbsp;&nbsp;<i class="ion-arrow-right-c"></i></button>
							<div class="clear"></div>

						</div>

						<!-- <input type="hidden" id="_lat" name="_lat" value="<?php echo $_lat?>"/>
						<input type="hidden" id="_long" name="_long" value="<?php echo $_long?>"/>-->

						<div class="clear"></div>

					</form>

					<div class="clear"></div>

				</div>

				<div class="clear"></div>

			</div>

			<div class="clear"></div>

		</div>

		<script type="text/javascript" src="http://maps.google.com/maps/api/js"></script>

		<script type="text/javascript">

			$(function(){

				$(document).on('change','#country',function(){

					var countryID = $(this).val();

					$.get('<?php echo HOST_URL?>/async/city/'+countryID, function(res){

						$('#city').html('');
						if(res.code == 200)
						{
							$.each(res.data, function(key, value) {
								$('#city')
						      		.append($("<option></option>")
						   			.attr("value",value.id)
						        	.text(value.name_<?php echo $lan?>));
							});

						}else{
							alert('Error reading data: Redo action');
						}

					},'json');

				});

				$(document).on('click','#submitLocationBtn',function(){

					if($("#verify_location").is(':checked'))
					{
						return true;
					}else{
						if(confirm('Do you want to set this as your business location?'))
						{
							return true;
						}else{
							return false;
						}
					}

					return false;

				});

			})

			var geocoder = new google.maps.Geocoder();

			function initialize()
			{
			    var latLng = new google.maps.LatLng(<?php echo $_lat?>, <?php echo $_long?>);

  				var map = new google.maps.Map(document.getElementById('gmapCanvas'), {
		          	zoom: 12,
		         	center: latLng,
			       	mapTypeId: google.maps.MapTypeId.ROADMAP
			 	});

		     	map.setCenter(latLng);

		    	var marker = new google.maps.Marker({
		         	position: latLng,
		         	title: 'Point A',
		          	map: map,
		          	draggable: true
		      	});

		      	google.maps.event.addListener(marker, 'dragend', function() {
		        	updateMarkerPosition(marker.getPosition());
		      	});

		    }

		    function updateMarkerPosition(latLng)
		    {
		        $("#_lat").val(latLng.lat());
		        $("#_long").val(latLng.lng());
		    }

		     //Initializing the google maps here on...!
    		google.maps.event.addDomListener(window, 'load', initialize);

		</script>
