@extends('layouts.default')

@section('style')
    <link href="{{ asset('/css/user/login.css') }}" rel="stylesheet">
@endsection

@section('title', 'Login')

@section('content')
    <div class="panel-primary panel">
        <div class="panel-body">
            {!! Form::open(array('url' => '/user', 'class' => 'form')) !!}

            <div class="form-group">
                <h2>Login</h2>
            </div>

            <div class="form-group">
                {!! Form::label('email', 'E-mail',
                    array(
                        'class' => 'control-label')) !!}
                {!! Form::email('email', null,
                    array('required',
                          'autofocus' => 'true',
                          'class'=>'form-control')) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password', 'Password',
                    array(
                        'class' => 'control-label')) !!}
                {!! Form::password('password', null,
                    array('required',
                          'class' =>'form-control')) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Log In',
                array('class'=>'btn btn-info btn-block')) !!}
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('layouts.footer')
@endsection