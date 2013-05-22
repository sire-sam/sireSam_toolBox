/**
 * @param filterSort
 */
function dataSortable()
{
    $('[data-sortable]').on('click', function (event)
    {
        event.preventDefault();
        var target =    $(this).data('sortable');
        var url    =    $(this).data('action');
        if ($(this).attr('data-active') == '0') {

            $(this).addClass('active')
                .attr('data-active',1);

            $(target).removeClass('table-bordered')
                .addClass('well');

            $(target+' tbody').sortable(
                {
                    placeholder: 'span ui-state-highlight',
                    cursor: 'move',
                    axis: 'y',
                    update: function(event, ui) {
                        var newOrder = $(target+' tbody').sortable('toArray',{attribute:'data-id'});
                        $.ajax({
                            url: url,
                            type: 'post',
                            cache: false,
                            data: {sort:newOrder},
                            error: function (a) {
                                console.log(a);
                            }
                        });
                    }
                }
            );

        } else {
            $(this).removeClass('active')
                .data('active',0);

            $(target).addClass('table-bordered')
                .removeClass('well');

            $(target+' [data-search]').prop('disabled',false);
            $(target+' tbody').sortable('destroy');
        }
    });
}
