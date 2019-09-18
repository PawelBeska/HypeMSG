$body = $("body");
$crsf = $('meta[name="csrf-token"]').attr('content');


const Chats = ({id,name,message,avatar}) => `
            <li class="list-group-item" id="${id}">
                                    <figure class="avatar avatar-state-success">
                                        <img src="assets/images/avatar.png" class="rounded-circle">
                                    </figure>
                                    <div class="users-list-body">
                                        <h5>${name}</h5>
                                        <p>${message}</p>
                                        <div class="users-list-action">
                                            <div class="new-message-count">2</div>
                                        </div>
                                    </div>
                                </li>
                                `;
const Message = ({id,to,from,message,created_at}) => `
                        <div class="message-item  ${from==$('meta[name="me"]').attr('content') ? 'outgoing-message' : null} " id="${id}">
                            <div class="message-content">
                               ${$.trim(message.replace(/<\/?[^>]+(>|$)/g, ""))}
                            </div>
                            <div class="message-action">
                                ${created_at}
                            </div>
                        </div>`;
const Chat = ({id,name,avatar}) => `<div class="chat-header-user" id="${id}">
                        <figure class="avatar avatar-lg">
                            <img src="assets/images/avatar.png" class="rounded-circle">
                        </figure>
                        <div>
                            <h5>${name}</h5>
                            <small class="text-muted">
                                <i>Online</i>
                            </small>
                        </div>
                    </div>
                    <div class="chat-header-action">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="#" class="btn btn-success">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="btn btn-secondary" data-toggle="dropdown">
                                    <i class="ti-more"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="#" data-navigation-target="contact-information"
                                       class="dropdown-item">Profile</a>
                                    <a href="#" class="dropdown-item">Add to archive</a>
                                    <a href="#" class="dropdown-item">Delete</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item">Block</a>
                                </div>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="btn btn-secondary" id="close_action">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </a>
                            </li>
                        </ul>
                    </div>`;


$(document).on({
    ajaxStart: function(e) {
        $body.addClass("loading");
    },
    ajaxStop: function() {
        $body.removeClass("loading");
    }
});

function down(){
    var chat_body = $('.layout .content .chat .chat-body');
    chat_body.scrollTop(chat_body.get(0).scrollHeight, -1).niceScroll({
        cursorcolor: 'rgba(66, 66, 66, 0.20)',
        cursorwidth: "4px",
        cursorborder: '0px'
    });
}
function check() {
    if($("input#to").val()) {
        $.ajax({
            url: "/user/chats",
            type: 'GET',
            cache: false,
            global: false,
            data: {'_token': $crsf},
            success: function (data) {
                $('ul.list-group').html('').prepend(data.map(Chats).join(''));
            }
        });
        $.ajax({
            url: "/user/chat/messages",
            type: 'POST',
            data: {'id': $("input#to").val(),'_token': $crsf},
            cache: false,
            global: false,
            success: function (data) {
                $('.messages').html(``).prepend(data.map(Message).join(''));
                $('.chat-body').attr('style','overflow: hidden')
            }
        });
    }
}setInterval(check, 3000);
function sendMessage(data)
{
    $.ajax({
        url: "/user/chat",
        type: 'POST',
        data: data,
        cache: false,
        global: false,
        success: function (data) {
            down();

        }
    });
}
//TODO CLEAR THIS SHIT...
//GENEROWANIE CZATÓW
generateChats();
function generateChats() {
    $.ajax({
        url: "/user/chats",
        type: 'GET',
        data: {'_token': $crsf},
        success: function (data) {
            $('ul.list-group').html('').prepend(data.map(Chats).join(''));
            $('li.list-group-item').on('click',function (e) {
                //GENEROWANIE HEADERA KONWERSACJI
                let id = $(this).attr('id');
                $("input#to").val(id);
                $.ajax({
                    url: "/user/chat/header",
                    type: 'POST',
                    data: {'_token': $crsf, "id": id},
                    success: function (data) {
                        $('.chat-header').html(``).prepend(data.map(Chat).join(''));
                        $('#close_action').click(function () {
                            $('.chat').hide();
                            $('.no-message-container').show();
                            $('.chat-header').html();
                        });
                    }
                });
                //GENEROWANIE WIADOMOŚCI
                $.ajax({
                    url: "/user/chat/body",
                    type: 'POST',
                    data: {'_token': $crsf, "id": id},
                    success: function (data) {
                        $('.messages').html(``).prepend(data.map(Message).join(''));
                        down();
                    }
                });

                $('.chat').show();
                $('.no-message-container').hide();

            });
        }
    });
}

