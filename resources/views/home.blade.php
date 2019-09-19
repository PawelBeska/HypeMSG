@extends('layouts.app')

@section('content')

    <!-- disconnected modal -->
    <div class="modal fade" id="disconnected" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-zoom" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="connection-error">
                        <h4 class="text-center">Application disconnected...</h4>
                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="862.899px" height="862.9px"
                             viewBox="0 0 862.899 862.9" style="enable-background:new 0 0 862.899 862.9;"
                             xml:space="preserve">
                        <g>
                            <g>
                                <circle cx="385.6" cy="656.1" r="79.8"></circle>
                                <path d="M561.7,401c-15.801-10.3-32.601-19.2-50.2-26.6c-39.9-16.9-82.3-25.5-126-25.5c-44.601,0-87.9,8.9-128.6,26.6
                                    c-39.3,17-74.3,41.3-104.1,72.2L253.5,545c34.899-36.1,81.8-56,132-56c49,0,95.1,19.1,129.8,53.8l25.4-25.399L493,469.7L561.7,401
                                    z"></path>
                                <path d="M385.6,267.1c107.601,0,208.9,41.7,285.3,117.4l98.5-99.5c-50-49.5-108.1-88.4-172.699-115.6
                                    c-66.9-28.1-138-42.4-211.101-42.4c-73.6,0-145,14.4-212.3,42.9c-65,27.5-123.3,66.8-173.3,116.9l99,99
                                    C175.5,309.299,277.3,267.1,385.6,267.1z"></path>
                                <polygon points="616.8,402.5 549.7,469.599 639.2,559.099 549.7,648.599 616.8,715.7 706.3,626.2 795.8,715.7 862.899,648.599
                                    773.399,559.099 862.899,469.599 795.8,402.5 706.3,492 		"></polygon>
                            </g>
                        </g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                    </svg>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-primary btn-lg">Reconnect</button>
                </div>
            </div>
        </div>
    </div>
    <!-- ./ disconnected modal -->

    <!-- call modal -->
    <div class="modal call fade show" id="call" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-zoom" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="call">
                        <div class="call-background" style="background: url(./dist/media/img/call-bg.png)"></div>
                        <div>
                            <figure class="mb-4 avatar avatar-xl">
                                <img src="{{\Illuminate\Support\Facades\Auth::user()->getAvatar()}}" class="rounded-circle">
                            </figure>
                            <h4 class="text-center">Jennica Kindred calling ...</h4>
                            <div class="action-button">
                                <button type="button" class="btn btn-danger btn-floating btn-lg" data-dismiss="modal">
                                    <i class="ti-close"></i>
                                </button>
                                <button type="button" class="btn btn-success btn-pulse btn-floating btn-lg">
                                    <i class="fa fa-phone"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ./ call modal -->

    <!-- add friends modal -->
    <div class="modal fade" id="addFriends" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-zoom" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="ti-user"></i> Dodaj znajomego
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="ti-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="form-errors">
                        <div class="alert alert-info">Wyślij zaproszenie.</div>
                    </div>
                    {!! Form::open(['class'=>'send-invitation']) !!}
                    <form class="send-invitation">
                        <div class="form-group">
                            {!! Form::label('email',"Adres email",['class'=>'col-form-label']) !!}
                            {!! Form::text('email',null,['class'=>"form-control"]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('message',"Wiadomość") !!}
                            {!! Form::textarea('message',null,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group float-lg-right">
                        {!! Form::submit('Wyślij',['class'=>'btn btn-primary']) !!}
                        </div>

                    </form>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <!-- ./ add friends modal -->

    <!-- new group modal -->
    <div class="modal fade" id="newGroup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-zoom" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fa fa-users"></i> New Group
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="ti-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="group_name" class="col-form-label">Group name</label>
                            <input type="text" class="form-control" id="group_name">
                        </div>
                        <div class="form-group">
                            <label for="users" class="col-form-label">Users</label>
                            <input type="text" class="form-control" id="users" placeholder="Find user">
                        </div>
                        <div class="form-group">
                            <div class="avatar-group">
                                <figure class="avatar">
                                    <span class="avatar-title bg-success rounded-circle">E</span>
                                </figure>
                                <figure class="avatar">
                                    <img src="{{URL::asset('assets/images/avatar.png')}}" class="rounded-circle">
                                </figure>
                                <figure class="avatar">
                                    <span class="avatar-title bg-danger rounded-circle">S</span>
                                </figure>
                                <figure class="avatar">
                                    <img src="./dist/media/img/man_avatar2.jpg" class="rounded-circle">
                                </figure>
                                <figure class="avatar">
                                    <span class="avatar-title bg-info rounded-circle">C</span>
                                </figure>
                                <a href="#">
                                    <figure class="avatar">
                                        <span class="avatar-title bg-primary rounded-circle">+</span>
                                    </figure>
                                </a>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-form-label">Description</label>
                            <textarea class="form-control" id="description"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Create Group</button>
                </div>
            </div>
        </div>
    </div>
    <!-- ./ new group modal -->

    <!-- setting modal -->
    <div class="modal fade" id="settingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-zoom" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="ti-settings"></i> Settings
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="ti-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#account" role="tab" aria-controls="account"
                               aria-selected="true">Account</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#notification" role="tab"
                               aria-controls="notification" aria-selected="false">Notification</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
                               aria-selected="false">Security</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="account" role="tabpanel">
                            <div class="form-item custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" checked="" id="customSwitch1">
                                <label class="custom-control-label" for="customSwitch1">Allow connected contacts</label>
                            </div>
                            <div class="form-item custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" checked="" id="customSwitch2">
                                <label class="custom-control-label" for="customSwitch2">Confirm message requests</label>
                            </div>
                            <div class="form-item custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" checked="" id="customSwitch3">
                                <label class="custom-control-label" for="customSwitch3">Profile privacy</label>
                            </div>
                            <div class="form-item custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch4">
                                <label class="custom-control-label" for="customSwitch4">Developer mode options</label>
                            </div>
                            <div class="form-item custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" checked="" id="customSwitch5">
                                <label class="custom-control-label" for="customSwitch5">Two-step security
                                    verification</label>
                            </div>
                        </div>
                        <div class="tab-pane" id="notification" role="tabpanel">
                            <div class="form-item custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" checked="" id="customSwitch6">
                                <label class="custom-control-label" for="customSwitch6">Allow mobile notifications</label>
                            </div>
                            <div class="form-item custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch7">
                                <label class="custom-control-label" for="customSwitch7">Notifications from your
                                    friends</label>
                            </div>
                            <div class="form-item custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch8">
                                <label class="custom-control-label" for="customSwitch8">Send notifications by email</label>
                            </div>
                        </div>
                        <div class="tab-pane" id="contact" role="tabpanel">
                            <div class="form-item custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch9">
                                <label class="custom-control-label" for="customSwitch9">Suggest changing passwords every
                                    month.</label>
                            </div>
                            <div class="form-item custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" checked="" id="customSwitch10">
                                <label class="custom-control-label" for="customSwitch10">Let me know about suspicious
                                    entries to your account</label>
                            </div>
                            <div class="form-item">
                                <p>
                                    <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
                                       aria-controls="collapseExample">
                                        <span class="ti-plus btn-icon"></span> Security Questions
                                    </a>
                                </p>
                                <div class="collapse" id="collapseExample">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Question 1">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Question 2">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
    <!-- ./ setting modal -->

    <!-- edit profile modal -->
    <div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-zoom" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="ti-pencil"></i> Edycja profilu
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="ti-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#personal" role="tab"
                               aria-controls="personal" aria-selected="true">Personal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#about" role="tab" aria-controls="about"
                               aria-selected="false">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#social-links" role="tab"
                               aria-controls="social-links" aria-selected="false">Social Links</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="personal" role="tabpanel">
                            {!! Form::open(['']) !!}
                                <div class="form-group">
                                    {!! Form::label('name','Nazwa użytkownika',['class'=>'col-form-label']) !!}
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="ti-user"></i>
                                        </span>
                                        </div>
                                        {!! Form::text('name',null,['class'=>'form-control']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Avatar</label>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <figure class="avatar mr-3 item-rtl">
                                                <img src="./dist/media/img/man_avatar3.jpg" class="rounded-circle">
                                            </figure>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="city" class="col-form-label">City</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="ti-map-alt"></i>
                                        </span>
                                        </div>
                                        <input type="text" class="form-control" id="city">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="phone" class="col-form-label">Phone</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="ti-mobile"></i>
                                        </span>
                                        </div>
                                        <input type="text" class="form-control" id="phone" placeholder="(555) 555 55 55">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="website" class="col-form-label">Website</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="ti-link"></i>
                                        </span>
                                        </div>
                                        <input type="text" class="form-control" id="website">
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>
                        <div class="tab-pane" id="about" role="tabpanel">
                            <form action="">
                                <div class="form-group">
                                    <label for="about-text" class="col-form-label">Write a few words that describe
                                        you</label>
                                    <textarea class="form-control" id="about-text"></textarea>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" checked="" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">View profile</label>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="social-links" role="tabpanel">
                            <form action="">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                    <span class="input-group-text bg-facebook">
                                        <i class="ti-facebook"></i>
                                    </span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Username">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                    <span class="input-group-text bg-twitter">
                                        <i class="ti-twitter"></i>
                                    </span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Username">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                    <span class="input-group-text bg-instagram">
                                        <i class="ti-instagram"></i>
                                    </span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Username">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                    <span class="input-group-text bg-linkedin">
                                        <i class="ti-linkedin"></i>
                                    </span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Username">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                    <span class="input-group-text bg-dribbble">
                                        <i class="ti-dribbble"></i>
                                    </span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Username">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                    <span class="input-group-text bg-youtube">
                                        <i class="ti-youtube"></i>
                                    </span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Username">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                    <span class="input-group-text bg-google">
                                        <i class="ti-google"></i>
                                    </span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Username">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                    <span class="input-group-text bg-whatsapp">
                                        <i class="fa fa-whatsapp"></i>
                                    </span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Username">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
    <!-- ./ edit profile modal -->
    <div class="layout">

        <!-- navigation -->
        <nav class="navigation">
            <div class="nav-group">
                <ul>
                    <li>
                        <a class="logo" href="#">
                            <i class="fa fa-3x fa-bolt"></i>
                        </a>
                    </li>
                    <li>
                        <a data-navigation-target="chats" class="active" href="#">
                            <i class="ti-comment-alt"></i>
                        </a>
                    </li>
                    <li>
                        <a data-navigation-target="friends" href="#" class="notifiy_badge">
                            <i class="ti-user"></i>
                        </a>
                    </li>
                    <li data-navigation-target="favorites" class="brackets">
                        <a href="#">
                            <i class="ti-star"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" data-toggle="modal" data-target="#editProfileModal">
                            <i class="ti-pencil"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" data-toggle="modal" data-target="#settingModal">
                            <i class="ti-settings"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('logout')}}">
                            <i class="ti-power-off"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- ./ navigation -->

        <!-- content -->
        <div class="content">

            <!-- sidebar group -->
            <div class="sidebar-group">

                <!-- Chats sidebar -->
                <div id="chats" class="sidebar active">
                    <header>
                        <span>Czaty</span>
                        <ul class="list-inline">
                            <li class="list-inline-item" data-toggle="tooltip" title="" data-original-title="Nowa grupa">
                                <a class="btn btn-light" href="#" data-toggle="modal" data-target="#newGroup">
                                    <i class="fa fa-users"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="btn btn-light" data-toggle="tooltip" title="" href="#"
                                   data-navigation-target="friends" data-original-title="Nowy czat">
                                    <i class="ti-comment-alt"></i>
                                </a>
                            </li>
                            <li class="list-inline-item d-lg-none d-sm-block">
                                <a href="#" class="btn btn-light sidebar-close">
                                    <i class="ti-close"></i>
                                </a>
                            </li>
                        </ul>
                    </header>
                    <form action="">
                        <input type="text" class="form-control" placeholder="Szukaj czatu">
                    </form>
                    <div class="sidebar-body" tabindex="3" style="overflow: hidden; outline: none;">
                        <ul class="list-group list-group-flush">





                        </ul>
                    </div>
                </div>
                <!-- ./ Chats sidebar -->

                <!-- Friends sidebar -->
                <div id="friends" class="sidebar">
                    <header>
                        <span>Znajomi</span>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a class="btn btn-light" href="#" data-toggle="modal" data-target="#addFriends">
                                    <i class="ti-plus btn-icon"></i> Dodaj znajomego
                                </a>
                            </li>
                            <li class="list-inline-item d-lg-none d-sm-block">
                                <a href="#" class="btn btn-light sidebar-close">
                                    <i class="ti-close"></i>
                                </a>
                            </li>
                        </ul>
                    </header>
                    <form action="">
                        <input type="text" class="form-control" placeholder="Search chat">
                    </form>
                    <div class="sidebar-body" style="overflow: hidden; outline: none;" tabindex="4">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div>
                                    <figure class="avatar">
                                        <img src="{{URL::asset('assets/images/avatar.png')}}" class="rounded-circle">
                                    </figure>
                                </div>
                                <div class="users-list-body">
                                    <h5>Harrietta Souten</h5>
                                    <p>Lorem ipsum dolor sitsdc sdcsdc sdcsdcs</p>
                                    <div class="users-list-action action-toggle">
                                        <div class="dropdown">
                                            <a data-toggle="dropdown" href="#">
                                                <i class="ti-more"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">Open</a>
                                                <a href="#" data-navigation-target="contact-information"
                                                   class="dropdown-item">Profile</a>
                                                <a href="#" class="dropdown-item">Add to archive</a>
                                                <a href="#" class="dropdown-item">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div>
                                    <figure class="avatar">
                                        <span class="avatar-title bg-success rounded-circle">A</span>
                                    </figure>
                                </div>
                                <div class="users-list-body">
                                    <h5>Aline McShee</h5>
                                    <p>Lorem ipsum dolor sitsdc sdcsdc sdcsdcs</p>
                                    <div class="users-list-action action-toggle">
                                        <div class="dropdown">
                                            <a data-toggle="dropdown" href="#">
                                                <i class="ti-more"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">Open</a>
                                                <a href="#" data-navigation-target="contact-information"
                                                   class="dropdown-item">Profile</a>
                                                <a href="#" class="dropdown-item">Add to archive</a>
                                                <a href="#" class="dropdown-item">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div>
                                    <figure class="avatar">
                                        <img src="{{URL::asset('assets/images/avatar.png')}}" class="rounded-circle">
                                    </figure>
                                </div>
                                <div class="users-list-body">
                                    <h5>Brietta Blogg</h5>
                                    <p>Lorem ipsum dolor sitsdc sdcsdc sdcsdcs</p>
                                    <div class="users-list-action action-toggle">
                                        <div class="dropdown">
                                            <a data-toggle="dropdown" href="#">
                                                <i class="ti-more"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">Open</a>
                                                <a href="#" data-navigation-target="contact-information"
                                                   class="dropdown-item">Profile</a>
                                                <a href="#" class="dropdown-item">Add to archive</a>
                                                <a href="#" class="dropdown-item">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div>
                                    <figure class="avatar">
                                        <img src="{{URL::asset('assets/images/avatar.png')}}" class="rounded-circle">
                                    </figure>
                                </div>
                                <div class="users-list-body">
                                    <h5>Karl Hubane</h5>
                                    <p>Lorem ipsum dolor sitsdc sdcsdc sdcsdcs</p>
                                    <div class="users-list-action action-toggle">
                                        <div class="dropdown">
                                            <a data-toggle="dropdown" href="#">
                                                <i class="ti-more"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">Open</a>
                                                <a href="#" data-navigation-target="contact-information"
                                                   class="dropdown-item">Profile</a>
                                                <a href="#" class="dropdown-item">Add to archive</a>
                                                <a href="#" class="dropdown-item">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div>
                                    <figure class="avatar">
                                        <img src="./dist/media/img/man_avatar2.jpg" class="rounded-circle">
                                    </figure>
                                </div>
                                <div class="users-list-body">
                                    <h5>Jillana Tows</h5>
                                    <p>Lorem ipsum dolor sitsdc sdcsdc sdcsdcs</p>
                                    <div class="users-list-action action-toggle">
                                        <div class="dropdown">
                                            <a data-toggle="dropdown" href="#">
                                                <i class="ti-more"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">Open</a>
                                                <a href="#" data-navigation-target="contact-information"
                                                   class="dropdown-item">Profile</a>
                                                <a href="#" class="dropdown-item">Add to archive</a>
                                                <a href="#" class="dropdown-item">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div>
                                    <figure class="avatar">
                                        <span class="avatar-title bg-info rounded-circle">AD</span>
                                    </figure>
                                </div>
                                <div class="users-list-body">
                                    <h5>Alina Derington</h5>
                                    <p>Lorem ipsum dolor sitsdc sdcsdc sdcsdcs</p>
                                    <div class="users-list-action action-toggle">
                                        <div class="dropdown">
                                            <a data-toggle="dropdown" href="#">
                                                <i class="ti-more"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">Open</a>
                                                <a href="#" data-navigation-target="contact-information"
                                                   class="dropdown-item">Profile</a>
                                                <a href="#" class="dropdown-item">Add to archive</a>
                                                <a href="#" class="dropdown-item">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div>
                                    <figure class="avatar">
                                        <span class="avatar-title bg-warning rounded-circle">S</span>
                                    </figure>
                                </div>
                                <div class="users-list-body">
                                    <h5>Stevy Kermeen</h5>
                                    <p>Lorem ipsum dolor sitsdc sdcsdc sdcsdcs</p>
                                    <div class="users-list-action action-toggle">
                                        <div class="dropdown">
                                            <a data-toggle="dropdown" href="#">
                                                <i class="ti-more"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">Open</a>
                                                <a href="#" data-navigation-target="contact-information"
                                                   class="dropdown-item">Profile</a>
                                                <a href="#" class="dropdown-item">Add to archive</a>
                                                <a href="#" class="dropdown-item">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div>
                                    <figure class="avatar">
                                        <img src="{{URL::asset('assets/images/avatar.png')}}" class="rounded-circle">
                                    </figure>
                                </div>
                                <div class="users-list-body">
                                    <h5>Stevy Kermeen</h5>
                                    <p>Lorem ipsum dolor sitsdc sdcsdc sdcsdcs</p>
                                    <div class="users-list-action action-toggle">
                                        <div class="dropdown">
                                            <a data-toggle="dropdown" href="#">
                                                <i class="ti-more"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">Open</a>
                                                <a href="#" data-navigation-target="contact-information"
                                                   class="dropdown-item">Profile</a>
                                                <a href="#" class="dropdown-item">Add to archive</a>
                                                <a href="#" class="dropdown-item">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div>
                                    <figure class="avatar">
                                        <img src="{{URL::asset('assets/images/avatar.png')}}" class="rounded-circle">
                                    </figure>
                                </div>
                                <div class="users-list-body">
                                    <h5>Gloriane Shimmans</h5>
                                    <p>Lorem ipsum dolor sitsdc sdcsdc sdcsdcs</p>
                                    <div class="users-list-action action-toggle">
                                        <div class="dropdown">
                                            <a data-toggle="dropdown" href="#">
                                                <i class="ti-more"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">Open</a>
                                                <a href="#" data-navigation-target="contact-information"
                                                   class="dropdown-item">Profile</a>
                                                <a href="#" class="dropdown-item">Add to archive</a>
                                                <a href="#" class="dropdown-item">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div>
                                    <figure class="avatar">
                                        <span class="avatar-title bg-secondary rounded-circle">B</span>
                                    </figure>
                                </div>
                                <div class="users-list-body">
                                    <h5>Bernhard Perrett</h5>
                                    <p>Lorem ipsum dolor sitsdc sdcsdc sdcsdcs</p>
                                    <div class="users-list-action action-toggle">
                                        <div class="dropdown">
                                            <a data-toggle="dropdown" href="#">
                                                <i class="ti-more"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">Otwórz</a>
                                                <a href="#" data-navigation-target="contact-information"
                                                   class="dropdown-item">Profil</a>
                                                <a href="#" class="dropdown-item">Zarchiwizuj</a>
                                                <a href="#" class="dropdown-item">Usuń</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- ./ Friends sidebar -->

                <!-- Favorites sidebar -->
                <div id="favorites" class="sidebar">
                    <header>
                        <span>Ulubione</span>
                        <ul class="list-inline">
                            <li class="list-inline-item d-lg-none d-sm-block">
                                <a href="#" class="btn btn-light sidebar-close">
                                    <i class="ti-close"></i>
                                </a>
                            </li>
                        </ul>
                    </header>
                    <form action="">
                        <input type="text" class="form-control" placeholder="Search favorites">
                    </form>
                    <div class="sidebar-body" style="overflow: hidden; outline: none;" tabindex="5">
                        <ul class="list-group list-group-flush users-list">
                            <li class="list-group-item">
                                <div class="users-list-body">
                                    <h5>Jennica Kindred</h5>
                                    <p>I know how important this file is to you. You can trust me ;)</p>
                                    <div class="users-list-action action-toggle">
                                        <div class="dropdown">
                                            <a data-toggle="dropdown" href="#">
                                                <i class="ti-more"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">View Chat</a>
                                                <a href="#" class="dropdown-item">Forward</a>
                                                <a href="#" class="dropdown-item">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="users-list-body">
                                    <h5>Marvin Rohan</h5>
                                    <p>Lorem ipsum dolor sitsdc sdcsdc sdcsdcs</p>
                                    <div class="users-list-action action-toggle">
                                        <div class="dropdown">
                                            <a data-toggle="dropdown" href="#">
                                                <i class="ti-more"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">View Chat</a>
                                                <a href="#" class="dropdown-item">Forward</a>
                                                <a href="#" class="dropdown-item">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="users-list-body">
                                    <h5>Frans Hanscombe</h5>
                                    <p>Lorem ipsum dolor sitsdc sdcsdc sdcsdcs</p>
                                    <div class="users-list-action action-toggle">
                                        <div class="dropdown">
                                            <a data-toggle="dropdown" href="#">
                                                <i class="ti-more"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">View Chat</a>
                                                <a href="#" class="dropdown-item">Forward</a>
                                                <a href="#" class="dropdown-item">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="users-list-body">
                                    <h5>Karl Hubane</h5>
                                    <p>Lorem ipsum dolor sitsdc sdcsdc sdcsdcs</p>
                                    <div class="users-list-action action-toggle">
                                        <div class="dropdown">
                                            <a data-toggle="dropdown" href="#">
                                                <i class="ti-more"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">View Chat</a>
                                                <a href="#" class="dropdown-item">Forward</a>
                                                <a href="#" class="dropdown-item">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- ./ Stars sidebar -->

            </div>
            <!-- ./ sidebar group -->

            <!-- no-message-container -->
            <div class="no-message-container">
                <div class="no-message-text">
                    <i class="fa fa-comments-o"></i>
                    <p>Wybierz z kim chcesz rozmawiać!</p>

                </div>
            </div>
            <!-- no-message-container -->

            <!-- loading-container -->


            <div class="message-loading"></div>
            <!-- loading container -->


            <!-- chat -->
            <div class="chat" style="display: none">
                <div class="chat-header"></div>
                <div class="chat-body" tabindex="2"> <!-- .no-message -->
                    <div class="messages"></div>
                </div>
                <div class="chat-footer">
                    {!! Form::open(['class'=>'send-message']) !!}
                        <input type="hidden" id="to" name="to">
                        <input type="text" id="message" name="message" class="form-control" placeholder="Wiadomość"
                               aria-label="Wiadomość" aria-describedby="button-addon2">
                        <div class="form-buttons">
                            <button class="btn btn-light btn-floating" type="button">
                                <i class="fa fa-paperclip"></i>
                            </button>
                            <button class="btn btn-light btn-floating" type="button">
                                <i class="fa fa-microphone"></i>
                            </button>
                            <button class="btn btn-primary btn-floating" type="submit">
                                <i class="fa fa-send"></i>
                            </button>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <!-- ./ chat -->

            <div class="sidebar-group">
                <div id="contact-information" class="sidebar">
                    <header>
                        <span>Informacje</span>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="#" class="btn btn-light sidebar-close">
                                    <i class="ti-close"></i>
                                </a>
                            </li>
                        </ul>
                    </header>
                    <div class="sidebar-body" style="overflow: hidden; outline: none;" tabindex="6">
                        <div class="pl-4 pr-4 text-center">
                            <figure class="avatar avatar-state-danger avatar-xl mb-4">
                                <img src="{{URL::asset('assets/images/avatar.png')}}" class="rounded-circle">
                            </figure>
                            <h5 class="text-primary">Frans Hanscombe</h5>
                            <p class="text-muted">Ostatnio widziany: Dzisiaj</p>
                        </div>
                        <hr>
                        <div class="pl-4 pr-4">
                            <h6>O mnie</h6>
                            <p class="text-muted">Lubie czytać, szczególnie nago.</p>
                        </div>
                        <hr>
                        <div class="pl-4 pr-4">
                            <h6>Telefon</h6>
                            <p class="text-muted">(555) 555 55 55</p>
                        </div>
                        <hr>
                        <div class="pl-4 pr-4">
                            <h6>Media</h6>
                            <div class="files">
                                <ul class="list-inline" style="overflow: hidden; outline: none;" tabindex="1">
                                    <li class="list-inline-item">
                                        <a href="#">
                                            <figure class="avatar avatar-lg">
                                        <span class="avatar-title bg-warning">
                                            <i class="fa fa-file-pdf-o"></i>
                                        </span>
                                            </figure>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#">
                                            <figure class="avatar avatar-lg">
                                                <img src="{{URL::asset('assets/images/avatar.png')}}">
                                            </figure>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#">
                                            <figure class="avatar avatar-lg">
                                                <img src="{{URL::asset('assets/images/avatar.png')}}">
                                            </figure>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#">
                                            <figure class="avatar avatar-lg">
                                                <img src="{{URL::asset('assets/images/avatar.png')}}">
                                            </figure>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#">
                                            <figure class="avatar avatar-lg">
                                        <span class="avatar-title bg-success">
                                            <i class="fa fa-file-excel-o"></i>
                                        </span>
                                            </figure>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#">
                                            <figure class="avatar avatar-lg">
                                        <span class="avatar-title bg-info">
                                            <i class="fa fa-file-text-o"></i>
                                        </span>
                                            </figure>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <hr>
                        <div class="pl-4 pr-4">
                            <h6>Skąd</h6>
                            <p class="text-muted">Germany / Berlin</p>
                        </div>
                        <hr>
                        <div class="pl-4 pr-4">
                            <h6>Strona</h6>
                            <p>
                                <a href="#">www.franshanscombe.com</a>
                            </p>
                        </div>
                        <hr>
                        <div class="pl-4 pr-4">
                            <h6>Znajdź mnie tutaj:</h6>
                            <ul class="list-inline social-links">
                                <li class="list-inline-item">
                                    <a href="#" class="btn btn-sm btn-floating btn-facebook">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="btn btn-sm btn-floating btn-twitter">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="btn btn-sm btn-floating btn-dribbble">
                                        <i class="fa fa-dribbble"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="btn btn-sm btn-floating btn-whatsapp">
                                        <i class="fa fa-whatsapp"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="btn btn-sm btn-floating btn-linkedin">
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="btn btn-sm btn-floating btn-google">
                                        <i class="fa fa-google"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="btn btn-sm btn-floating btn-behance">
                                        <i class="fa fa-behance"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="btn btn-sm btn-floating btn-instagram">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <hr>
                        <div class="pl-4 pr-4">
                            <div class="form-group">
                                <div class="form-item custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch11">
                                    <label class="custom-control-label" for="customSwitch11">Zablokuj</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-item custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" checked="" id="customSwitch12">
                                    <label class="custom-control-label" for="customSwitch12">Wycisz</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-item custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch13">
                                    <label class="custom-control-label" for="customSwitch13">Otrzymuj powiadomienia</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- ./ content -->

    </div>

    <style>
        .message-loading {
            display:    none;
            z-index:    1000;
            top:        0;
            left:       0;
            height: 100%;
            position: relative;
            width: 100%;
            font-size: 29px;
            text-align: center;
            background:   url('{{URL::asset('assets/images/loading.gif')}}')
            50% 50%
            no-repeat;
        }

        /* When the body has the loading class, we turn
           the scrollbar off with overflow:hidden */
        body.loading .message-loading {
            overflow: hidden;
        }
        body.loading .chat {
            overflow: hidden;
        }

        /* Anytime the body has the loading class, our
           modal element will be visible */
        body.loading .message-loading {
            display: block;
        }


    </style>


@endsection
