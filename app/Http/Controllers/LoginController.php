<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginFormRequest;
use App\Http\Requests\UserFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->to('/');
        }
        return view('login');
    }
    public function login(LoginFormRequest $request)
    {
        $data = $request->validated();
        $credentials = ['phone' => $data['phone'], 'password' => $data['password']];
        if (auth()->attempt($credentials)) {
            $user = auth()->user();
            if ($user->type === 'admin') {
                return redirect()->to('/users');
            } else{
                return redirect()->to('/');
            }
        } else {
            return redirect()->back()->withErrors(['error' => 'Phone or password invalid']);
        }

    }

}
