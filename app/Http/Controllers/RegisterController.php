<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Position;

class RegisterController extends Controller
{
    public function index(){
        $poss = Position::all();
        return view('pages/register',compact('poss'));
    }
    public function store(request $request){
        $user = new User;
        $user->id_position = $request->id_position;
        $user->id_roles = 2;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->password =bcrypt($request->password);
        $user->save();
        return redirect('login');
    }
}
