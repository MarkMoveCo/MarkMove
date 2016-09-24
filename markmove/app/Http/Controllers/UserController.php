<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * The user repository instance.
     */
    protected $users;

//    /**
//     * Create a new controller instance.
//     *
//     * @param  UserRepository  $users
//     * @return void
//     */
//    public function __construct(UserRepository $users)
//    {
//        $this->users = $users;
//    }

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return view('user.profile');
    }
}