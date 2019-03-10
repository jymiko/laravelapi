<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    public function update(request $request,$id){
        $users = User::find($id);
        $users->password = bcrypt($request->password);

        $users->save();
        return redirect('home');

    }
}
