/* REQUIRED
 jQuery v1.8.3
 JQuery UI (dialog())
 *  */
function dataDelete (target) {
    $(target).on('click','[data-delete]',function(event)
    {
        event.preventDefault();
        var url     =   $(target).attr('data-src');
        var data    =   {id: $(this).attr('data-delete')};
        var row     =   $(this).parents('.item');

        var window  =   document.createElement('div');
        $(window).attr('id','dialog-delete')
            .attr('class','dialog-content')
            .dialog({
                title: 'Voulez vous supprimer cet élément ?',
                buttons: [
                    {
                        text: 'Supprimer',
                        click: function () {
                            $(this).dialog('close');
                            $.post(url+'&action=delete&asynchrone=true',data).fail(function (error) {
                                console.log(error);
                            }).done(function () {
                                    $(row.children()).slideToggle(
                                        'slow',
                                        function () {
                                            $(row).remove();
                                        }
                                    );
                                });
                        }
                    },{
                        text: 'Annuler',
                        click: function () {
                            $(this).dialog('close');
                        }
                    }
                ],
                beforeClose: function () {
                    $(window).remove();
                }
            });
    });
}
