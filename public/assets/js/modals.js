$('form.send-invitation').on('submit',function(e) {
    e.preventDefault();
    $.ajax({
        url: "/user/friends/add",
        type: 'POST',
        data: $(this).serialize(),
        success: function (data) {
            console.log(data);
        },
        error: function (data) {
            errorsHtml = '<div class="alert alert-danger"><ul>';

            $.each( errors.error, function( key, value ) {
                errorsHtml += '<li>'+ value[0] + '</li>'; //showing only the first error.
            });
            errorsHtml += '</ul></div>';

            $( '#form-errors' ).html( errorsHtml ); //appending to a <div id="form-errors"></div> inside form

        }
    });
});