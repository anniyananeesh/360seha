<script type="text/javascript">
	
	$(function(){
            drawGraph(7);
	});
        
        function drawGraph(range)
        {
             //Load sync the graph details
		  $.get('<?php echo base_url()?>async/async_load_graph/'+range, {}, function(r){

			  var d1 = [];
			  for (var i = 0; i < r.length; i++) {
 
			  	  d1.push([r[i][0], r[i][1]]);
			  }
			  
			  $("#flot-1ine").length && $.plot($("#flot-1ine"), 

					  [
					    {
	 
					        data: d1,
					        color: "#6783b7"
					    }
					  ], 
			      {
			        series: {
			            lines: {
			                show: true,
			                lineWidth: 1,
			                fill: true,
			                fillColor: {
			                    colors: [{
			                        opacity: 0.3
			                    }, {
			                        opacity: 0.3
			                    }]
			                }
			            },
			            points: {
			                radius: 3,
			                show: true
			            },
			            grow: {
			              active: true,
			              steps: 50
			            }, 
			            shadowSize: 2
			        },
			        grid: {
			            hoverable: true,
			            clickable: true,
			            tickColor: "#f0f0f0",
			            borderWidth: 1,
			            color: '#f0f0f0'
			        },
			        colors: ["#1bb399"],

			        xaxis: {
			            mode: "time",
			            timeformat: "%b %d"
			        },
			        yaxis: {
			          ticks: 6
			        },
			        tooltip: true,
			        tooltipOpts: {
			          content: "%y.0 subscriber(s) registered on %x",
			          defaultTheme: false,
			          shifts: {
			            x: 0,
			            y: 20
			          }
			        }
			      }
			  );
				
		  }, 'json');
        }
        
        function redrawGraph()
        {
            var range = $('#show-range').text();
            
            switch(range)
            {
                case 'Month':
                    range = 30;
                break;
                
                case 'Week':
                    range = 7;
                break;
                
                case 'Last 3 days':
                    range = 3;
                break;
                
            }
            
            drawGraph(range);
        }

</script>
<div class="row bg-light dk m-b">
    <div class="col-md-12 dker">
      <section>
        <header class="font-bold padder-v">
          <div class="pull-right">
            <div class="btn-group">
              <button data-toggle="dropdown" class="btn btn-sm btn-rounded btn-default dropdown-toggle">
                <span class="dropdown-label" id="show-range">Week</span> 
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu dropdown-select">
                  <li><a href="#"><input type="radio" name="b">Month</a></li>
                  <li><a href="#"><input type="radio" name="b">Week</a></li>
                  <li><a href="#"><input type="radio" name="b">Last 3 days</a></li>
              </ul>
            </div>
              <a href="#" class="btn btn-default btn-icon btn-rounded btn-sm" onclick="javascript: redrawGraph();">Go</a>
          </div>
          Statistics
        </header>
        <div class="panel-body">
          <div id="flot-1ine" style="height:210px"></div>
        </div>
        <div class="row text-center no-gutter">
          <div class="col-xs-3">
              <span class="h4 font-bold m-t block"><?php echo number_format(count($drs))?></span>
            <small class="text-muted m-b block">Doctors</small>
          </div>
          <div class="col-xs-3">
              <span class="h4 font-bold m-t block"><?php echo number_format(count($mcs))?></span>
            <small class="text-muted m-b block">Medical Centers</small>
          </div>
          <div class="col-xs-3">
              <span class="h4 font-bold m-t block"><?php echo number_format(count($comps))?></span>
            <small class="text-muted m-b block">Companies</small>
          </div>
          <div class="col-xs-3">
              <span class="h4 font-bold m-t block"><?php echo number_format(count($patients))?></span>
            <small class="text-muted m-b block">Patients</small>                        
          </div>
        </div>
      </section>
    </div>

  </div>