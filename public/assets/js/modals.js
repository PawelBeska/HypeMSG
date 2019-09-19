$('form.send-invitation').on('submit', function (e) {
    e.preventDefault();
    $.ajax({
        url: "/user/friends/add",
        type: 'POST',
        cache: false,
        global: false,
        data: $(this).serialize(),
        success: function (data) {
            errors(data);
            generateChats();
        },
        error: function (data) {
            errors(data);
        }
    });
});
#programming #laungage #code #time #coding #javascript #skills #job #instacode #instaskills #programmer #php #frontend #backend #codinglife #webprogramming #mysql #js #website #websitedesign #websitedesigner
function errors(data) {
    $('#form-errors').empty();
    const error = ({alert, message}) => `<div class="alert alert-sm alert-border-left ${alert} alert-dismissable">
                                               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> 
                                               <i class="fa fa-info pr10"></i> ${message} </div>`;

    if (data['error'])
        $('#form-errors').prepend(error({'alert': 'alert-danger', 'message': data['error']}));
    else if (data['success'])
        $('#form-errors').prepend(error({'alert': 'alert-success', 'message': data['success']}));
    else {
        var l = JSON.parse(data.responseText);
        var i = 0;
        $.each(l['errors'], function (heading, text) {
            i++;
            $('#form-errors').prepend(error({'alert': 'alert-danger', 'message': text}));
        });
    }
}