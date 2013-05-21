/* REQUIRED
     jQuery v1.8.3
     jquery.validate() http://docs.jquery.com/Plugins/Validation
 *  */

    function formSubmit (form) {
        $(form).on('submit', function (event) {
            event.preventDefault();
            if ($(this).valid()) {
                $.post(
                        $(this).attr('action')+'&asynchrone=true',
                        $(this).serialize()
                    ).done(function(result) {
                        $(form).parent().prepend(result);
                        $(form)[0].reset();
                    }
                );
            }
        });
    }