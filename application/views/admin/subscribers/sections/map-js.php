<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
    
    var geocoder = new google.maps.Geocoder();

    function HomeControl(controlDiv, map) {

        controlDiv.style.padding = '0px 0px 40px 0px';
        var controlUI = document.createElement('div');
        controlUI.style.cursor = 'pointer';
        controlUI.style.textAlign = 'center';
        controlUI.title = 'Set this as my location';
        controlDiv.appendChild(controlUI);
        var controlText = document.createElement('div');
        controlText.innerHTML = '<button class="btn btn-success btn-rounded font-thin btn-lg"><i class="fa fa-map-marker"></i> &nbsp;&nbsp;Pick this location</button>';
        controlUI.appendChild(controlText);
        google.maps.event.addDomListener(controlUI, 'click', function() {
            navigator.geolocation.getCurrentPosition(function(position) {

                var latLng = new google.maps.LatLng($("#latitude").val(), $("#longitude").val());
                geocoder.geocode( { 'latLng': latLng }, function(r){
                    $("#place_info").val(r[0].address_components[1].long_name+' , '+r[0].address_components[4].long_name);
                });
            });                                    
            $("#gmap_canvas").slideUp(300);
         
        });

    }
    
    function geocodePosition(pos) {
        geocoder.geocode({
            latLng: pos
        }, function(responses) {
            if (responses && responses.length > 0) {
              updateMarkerAddress(responses[0].formatted_address);
            } else {
              jAlert("Cannot determine position :(");
            }
        });
    }

    function updateMarkerPosition(latLng) {
        $("#latitude").val(latLng.lat());
        $("#longitude").val(latLng.lng());
    }
    
    function initialize() {

        if(navigator.geolocation) {

            navigator.geolocation.getCurrentPosition(function(position) {

                var latLng = new google.maps.LatLng(position.coords.latitude,
                                           position.coords.longitude);

                var map = new google.maps.Map(document.getElementById('gmap_canvas'), {
                    zoom: 18,
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

                geocoder.geocode( { 'latLng': latLng }, function(r){
                    $("#place_info").val(r[0].address_components[1].long_name+' , '+r[0].address_components[4].long_name);
                });

                var homeControlDiv = document.createElement('div');
                var homeControl = new HomeControl(homeControlDiv, map);

                homeControlDiv.index = 1;
                map.controls[google.maps.ControlPosition.BOTTOM_CENTER].push(homeControlDiv);

                google.maps.event.addListener(marker, 'drag', function() {
                    updateMarkerPosition(marker.getPosition());
                });

                google.maps.event.addListener(marker, 'dragend', function() {
                    geocodePosition(marker.getPosition());
                });

            });

        }else{
            var latLng = new google.maps.LatLng(-34.397, 150.644);
        } 
 
    }
    
    //Initializing the google maps here on...!
    google.maps.event.addDomListener(window, 'load', initialize);

</script>