@extends('layouts.default')

@section('style')
    <link href="{{ asset('/css/landmark/index.css') }}" rel="stylesheet">
@endsection

@section('title', 'Landmarks')

@section('content')
    <div class="left-side">
        <div class="category">
            <h3 class="category-name">Most popular</h3>
            <ul >
                <li class="landmark panel">
                    <a href="#" href="@{/landmarks/view/{id}/(id=${landmark.id})}">
                        <img class="landmark-photo" src="http://www.smeshni7.com/wp-content/uploads/2012/09/%D1%8F%D0%BA%D0%B8-%D0%BA%D0%B0%D1%80%D1%82%D0%B8%D0%BD%D0%BA%D0%B8-1.jpg"/>
                        <h4 class="landmark-name">The best place</h4>
                    </a>

                    <p class="landmark-name">Heaven</p>

                    <!--<p class="landmark-info" th:text="${landmark.description}">Do you want to try my reflex?</p>-->

                    <p class="landmark-info">Rating: <span></span></p>
                </li>
            </ul>
        </div>
    </div>

    <div class="right-side">
        <div class="map panel">
            <a class="map-text" href="#"><h3 class="category-name">Virtual Map</h3></a>

            <div id="googleMap"></div>
        </div>
    </div>
@endsection

@section('footer')
    @include('layouts.footer')
@endsection