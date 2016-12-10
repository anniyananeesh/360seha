<script type="text/javascript">
    $(function(){

        $(document).on('blur', '#title', getProfileUrlFromTitle);
        $(document).on('blur', '#subs_public_profile', getProfileUrlCheck);
        
        $(document).on('click', '#add_hrs', ShowAddHoursTemplate);
        $(document).on('click', '#close_hours', CloseShowHrsPanel);
        $(document).on('click', '#add_weekday_hrs', SetWeekDayHours);
        $(document).on('click', '.RmTmEntry', RmTmEntry);
        
        $('#description').textareaCount( {  
            'maxCharacterSize': 360,  
            'originalStyle': 'originalDisplayInfo',  
            'warningStyle': 'warningDisplayInfo',  
            'warningNumber': 40,  
            'displayFormat': '#input Characters | #left Characters Left | #words Words'  
        });
        
        $('#description_ar').textareaCount( {  
            'maxCharacterSize': 360,  
            'originalStyle': 'originalDisplayInfo',  
            'warningStyle': 'warningDisplayInfo',  
            'warningNumber': 40,  
            'displayFormat': '#input Characters | #left Characters Left | #words Words'  
        });

        $("#service_tags").tagsManager({
            prefilled: [<?php echo ($service_tags) ? $service_tags: '';?>]
        });

        $("#service_tags_ar").tagsManager({
            prefilled: [<?php echo ($service_tags_ar) ? $service_tags_ar: '';?>]
        });

    });

    function getProfileUrlFromTitle()
    {

        $(document).css({'cursor': 'wait'});
        var title = $('#title').val(),
            title = title.toLowerCase(), 
            result = title.replace(/([.*+?^=!:${}()|\[\]\/\\])/g, "-")
            result = result.replace(/ /g, "");

        $.get('<?php echo base_url()?>async/has_profile_url/'+result, {}, function(r){
            if(!r.error){
                $('.ajx_rst_ldr').html('<i class="glyphicon glyphicon-ok-sign text-success" style="padding-top: 10px;" title="'+r.message+'"></i>');
            }else{
                $('.ajx_rst_ldr').html('<i class="glyphicon glyphicon-minus-sign text-danger" style="padding-top: 10px;" title="'+r.message+'"></i>');
            }

            $(document).css({'cursor': 'default'});

        }, 'json');
        $('#subs_public_profile').val(result);
    }

    function getProfileUrlCheck()
    {   
        var title = $(this).val();
        $.get('<?php echo base_url()?>async/has_profile_url/'+title, {}, function(r){
            if(!r.error){
                $('.ajx_rst_ldr').html('<i class="glyphicon glyphicon-ok-sign text-success" style="padding-top: 10px;" title="'+r.message+'"></i>');
            }else{
                $('.ajx_rst_ldr').html('<i class="glyphicon glyphicon-minus-sign text-danger" style="padding-top: 10px;" title="'+r.message+'"></i>');
            }

        }, 'json');

    }   
    
    function ShowOpenHours(type)
    {
        if(type === 3)
        {
            $('.hours_handler').fadeIn(350); 
        }else{
            $('.hours_handler').hide(); 
            CloseShowHrsPanel();
        }
    }
    function CloseShowHrsPanel(){
        $('.show_hours').hide(); 
        $('.show_hours').html(''); 
    }
    
    function ShowAddHoursTemplate()
    {
        $('.show_hours').load('<?php echo base_url().ADMIN_URL?>async/show_hours_template', function(){
           $('.show_hours').show(); 
        });
    }
    
    function RmTmEntry(){
        $(this).parent().parent().remove();
        return false;
    }
    
    function SetWeekDayHours()
    {
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
            for(i=0; i<weekDays.length; i++){
 
                var wkDay = weekDays[i].split('-');
                html += '<tr> <td><input type="hidden" name="from_weekday[]" value="'+dayOfWeekAsInteger(wkDay[0])+'"/>'+wkDay[0].trim();
                if(wkDay[1])
                {
                    html += ' - <input type="hidden" name="to_weekday[]" value="'+dayOfWeekAsInteger(wkDay[1])+'"/>'+wkDay[1].trim()+'</td> ';
                }
                html += '<td><input type="hidden" name="open_time[]" value="'+openTime+'"/>'+openTime+' - <input type="hidden" name="close_time[]" value="'+closeTime+'"/>'+closeTime+'</td> \n\
<td> <a class="btn btn-danger btn-xs delete_entry RmTmEntry" href="#">Delete</a> </td> </tr>';
                
            }
            $('.hours_handler').find('table').append(html); 
            $('#chosen_weekdays').val('');
            CloseShowHrsPanel();
        }else{
            alert('Choose timings and weekdays ');
        }
    }
    
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
 
    function dayOfWeekAsInteger(day) {
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