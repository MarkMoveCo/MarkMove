@extends('layouts.default')

@section('style')
    <link href="{{ asset('/css/index.css') }}" rel="stylesheet">
@endsection

@section('title', 'MarkMove')

@section('content')
    <div class="story">
        <p>"Traveling - it leaves you speechless, then turns you into a storyteller." - Ibn Battuta</p>
        <div class="message">
            <p>Tell your story to us</p>
            @if (!Auth::check())
                <a href="{{ url('user/create') }}">Sign up</a>
            @endif
        </div>
    </div>
@endsection

@section('footer')
    @include('layouts/footer')
@endsection