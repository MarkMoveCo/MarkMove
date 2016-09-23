<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        return view('user/login');
    }

    public function create()
    {
        return view('user/registration');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $rules = ['email' => 'required|email', 'password' => 'required|min:7|max:50', 'confirmPassword' => 'same:pass'];
        $validator = Validator::make($data, $rules, ['email.required' => 'Дай го тоя имейл.']);

        if ($validator->fails()){
            return redirect('/user/create')->withErrors($validator)->withInput();
        }
        else {
            $id = DB::table('users')->insertGetId(
                ['email' => $data['email'], 'password' => $data['password']]
            );
            return redirect('');
        }
    }
}