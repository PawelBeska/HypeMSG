@extends('layouts.auth')

@section('content')


    <div class="form-wrapper">

        <!-- logo -->
        <div class="logo">
            <i class="fa fa-3x fa-bolt"></i>
        </div>
        <!-- ./ logo -->

        <h5>Zaloguj się</h5>

        <!-- form -->
        {!! Form::open(['url'=>route('login')]) !!}
        @if($errors->any())
            @foreach ($errors->all() as $error)
                <h6>{{ $error }}</h6>
            @endforeach
        @endif
            <div class="form-group input-group-lg">
                {!! Form::email('email',null,['class'=>'form-control','placeholder'=>'Email','required','autofocus']) !!}

            </div>
            <div class="form-group input-group-lg">
                {!! Form::password('password',['class'=>'form-control','placeholder'=>'Hasło','required']) !!}
            </div>
            <div class="form-group d-flex justify-content-between">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" checked="" id="remember">
                    <label class="custom-control-label" for="remember">Zapamiętaj mnie</label>
                </div>
                <a href="{{route('password.request')}}">Zapomniałeś hasła?</a>
            </div>
        {!! Form::submit('Zaloguj się',['class'=>'btn btn-primary btn-lg btn-block']) !!}
            <hr>
            <p class="text-muted">Zaloguj się ze swoim kontem społecznościowym.</p>
            <ul class="list-inline">
                <li class="list-inline-item">
                    <a href="#" class="btn btn-floating btn-facebook">
                        <i class="fa fa-facebook"></i>
                    </a>
                </li>
            </ul>
            <hr>
            <p class="text-muted">Nie masz konta?</p>
            <a href="{{route('register')}}" class="btn btn-outline-light btn-sm">Zarejestruj się!</a>
        {!! Form::close() !!}
        <!-- ./ form -->

    </div>

@endsection



