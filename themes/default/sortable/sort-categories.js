$(function  () {
    var group = $("ol.plholder").sortable({
        group: 'plholder',
        onDrop: function (item, container, _super) {
            //first we execute the normal plugins behaviour
            _super(item, container);

            //where we drop the category
            var parent = $(item).parent();

            //values of the list
            val = $(parent).sortable().sortable('serialize').get();
            val = val[0].split(',');

            //how deep are we? we don't need it we process it in the php
            var deep = $(item).parentsUntil($("ol.plholder"),'ol')['length'];  

            //building data to send
            var data = {
                  "id_category" : $(item).data('id'),
                  "id_category_parent" : $(parent).data('id'),
                  "order" : $.inArray($(item).attr('id'),val),
                  "deep" : deep,
                  "brothers" : val,
                };

            //saving the order
            $.ajax({
                type: "POST",
                url: $('#ajax_result').data('url'),
                beforeSend: function(text) {
                    $('div.alert').text('Saving').removeClass().addClass("alert alert-warning");
                    $("ol.plholder").sortable('disable');
                    $('ol.plholder').animate({opacity: '0.5'});
                },
                data: data,
                success: function(text) {
                    $('div.alert').text(text).removeClass().addClass("alert alert-success");
                    $("ol.plholder").sortable('enable');
                    $('ol.plholder').animate({opacity: '1'});
                }               
            });
             
        },
        serialize: function (parent, children, isContainer) {
             return isContainer ? children.join() : parent.attr("id");
        },

    })
})

$(function(){
    $('.index-delete').click(function(event) {
          
          $this = $(this);
          if (confirm($this.data('text')))
          {
              $('#'+$this.data('id')).hide("slow");
                return true;
          }
          else event.preventDefault();

    });
});