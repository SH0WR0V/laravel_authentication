<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Credential;

class userController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function registration()
    {
        return view('registration');
    }

    public function registrationSubmit(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'email' => 'required|unique:credentials,email',
            'password' => 'required|min:5',
            'confirm_password' => 'required|same:password'
        ], [
            'name.required' => 'Please provide your name'
        ]);
        $user = new Credential();
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = $req->password;
        $user->save();
        if ($user) {
            session()->flash('msg', 'Registration successful!');
            return redirect()->route('login');
        } else {
            session()->flash('msg', 'Something went wrong!');
            return redirect()->route('registration');
        }
    }

    public function loginSubmit(Request $req)
    {
        $req->validate([
            'email' => 'required',
            'password' => 'required|min:5'
        ], [
            'email.required' => 'Please provide your email'
        ]);
        $user = Credential::where('email', $req->email)->where('password', $req->password)->first();
        if ($user && $user->type == 'admin') {
            $req->session()->put('name', $user->name);
            return redirect()->route('admin.home');
        } elseif ($user && $user->type == 'user') {
            $req->session()->put('name', $user->name);
            $req->session()->put('email', $user->email);
            return redirect()->route('home');
        } elseif (!$user) {
            session()->flash('msg', 'Wrong credentials!');
            return redirect()->route('login');
        }
    }

    public function logout()
    {
        session()->flush();
        return redirect(route('login'));
    }
}
