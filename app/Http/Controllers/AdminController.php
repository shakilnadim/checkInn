<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }

    public function editUser($id){
        $user = User::find($id);
        return view('admin.editRole')->with('user', $user);
    }

    public function updateRole(Request $request, $id){
        $user = User::find($id);
        $user->role = $request->input('role');
        $user->save();

        return redirect('/user');
    }
}
