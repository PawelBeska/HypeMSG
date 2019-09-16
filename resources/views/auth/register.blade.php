@extends('layouts.auth')

@section('content')
    <div class="form-wrapper">

        <!-- logo -->
        <div class="logo">
            <i class="fa fa-3x fa-bolt"></i>
        </div>
        <!-- ./ logo -->

        <h5>Zarejestruj się</h5>

        <!-- form -->
        {!! Form::open(['url'=>route('register')]) !!}
        @if($errors->any())
            @foreach ($errors->all() as $error)
                <h6>{{ $error }}</h6>
            @endforeach
        @endif
        <div class="form-group input-group-lg">
            {!! Form::email('email',null,['class'=>'form-control','placeholder'=>'Email','required','autofocus']) !!}

        </div>
        <div class="form-group input-group-lg">
            {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Nazwa użytkownika','required']) !!}
        </div>
        <div class="form-group input-group-lg">
            {!! Form::password('password',['class'=>'form-control','placeholder'=>'Hasło','required']) !!}
        </div>

        <div class="form-group input-group-lg">
            {!! Form::password('password_confirmation',['class'=>'form-control','placeholder'=>'Powtórz hasło','required']) !!}
        </div>

        {!! Form::submit('Zarejestruj się',['class'=>'btn btn-primary btn-lg btn-block']) !!}
        <hr>
        <p class="text-muted">Masz już konto?</p>
        <a href="{{route('login')}}" class="btn btn-outline-light btn-sm">Zaloguj się!</a>
    {!! Form::close() !!}
    <!-- ./ form -->

    </div>
@endsection