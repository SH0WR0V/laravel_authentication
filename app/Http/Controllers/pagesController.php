<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Credential;


class pagesController extends Controller
{
    public function home()
    {
        $email = session()->get('email');
        $user = Credential::where('email', $email)->first();
        return view('index')->with('user', $user);
    }

    public function admin()
    {
        $users = Credential::where('type', 'user')->where('approvals', 0)->get();
        $info = 'No pending approval left!';
        return view('admin.index')->with('users', $users);
    }

    public function userApprove(Request $req)
    {
        $user_id = $req->id;
        $user = Credential::where('id', $user_id)->first();
        if ($user) {
            $user->approvals = 1;
            $user->save();
            session()->flash('msg', 'Approval approved!');
            return redirect()->route('admin.home');
        }
    }

    public function userDecline(Request $req)
    {
        $user_id = $req->id;
        Credential::where('id', $user_id)->delete();
        session()->flash('msg', 'Approval declined!');
        return redirect()->route('admin.home');
    }
}
