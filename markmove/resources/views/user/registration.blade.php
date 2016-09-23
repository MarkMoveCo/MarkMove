@extends('layouts.default')

@section('style')
    <link href="{{ asset('/css/user/registration.css') }}" rel="stylesheet">
@endsection

@section('title', 'Registration')

@section('content')
    <div class="panel-primary panel">
        <div class="panel-body">
            {!! Form::open(array('url' => '/user', 'class' => 'form')) !!}

            <div class="form-group">
                <h2>Create account</h2>
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
                {!! Form::label('fullName', 'Full Name',
                    array(
                        'class' => 'control-label')) !!}
                {!! Form::text('fullName', null,
                    array('required',
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
                {!! Form::label('confirmPassword', 'Confirm Password',
                    array(
                        'class' => 'control-label')) !!}
                {!! Form::password('confirmPassword', null,
                array('required',
                    'class' => 'form-control')) !!}
            </div>

            <div class="form-group">
                {!! Form::label('age', 'Age', array('class' => 'control-label')) !!}
                {!! Form::number('age', null, array('class' => 'form-control', 'min' => '7')) !!}
            </div>

            <div class="form-group">
                {!! Form::label(null, 'Gender', array('class' => 'control-label')) !!}
                {!! Form::radio('status', 'male', false) !!} Male
                {!! Form::radio('status', 'female', false) !!} Female
            </div>

            <div class="form-group">
                {!! Form::submit('Sign Up',
                array('class'=>'btn btn-info btn-block')) !!}
            </div>

            <p class="form-group">By creating an account, you agree to our <a href="#">Terms of Use</a> and
                our <a href="#">Privacy Policy</a>.</p>
        </div>
    </div>
@endsection