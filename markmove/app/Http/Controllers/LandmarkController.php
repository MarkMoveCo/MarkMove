<?php

namespace App\Http\Controllers;

class LandmarkController extends Controller
{
    public function index()
    {
        return view('landmark/index');
    }
}