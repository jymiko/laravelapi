<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;
use App\Roles;
use App\Position;

class UserController extends Controller
{
    
    public function index(){
        $users = User::all()->where('id_roles','2');
        $roles = Roles::all();
        $poss = Position::all();
        return view('pages/user', compact('users','roles','poss'));
    }
    public function update(request $request,$id){       
        $user = User::find($id);
        $user->id_position = $request->id_position;
        $user->id_roles = 2;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->password = bcrypt($request->password);

        $user->save();
        return redirect('user');

    }
    public function show($id){
        $users = User::where('id',auth()->id())->get();
        return view('pages/profile',compact('users'));
    }
    public function store(request $request){
        $request->validate([
            'id_roles' => 'required|integer',
            'id_position' => 'required|integer',
            'name' => 'required|string',
            'address' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string'
        ]);
        $user = new User([
            'id_roles' => $request->id_roles,
            'id_position' => $request->id_position,
            'name' => $request->name,
            'address' => $request->address,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        $user->save();
        return redirect('user');
    }
    //create new user
    public function create(request $request){
        $request->validate([
            'id_roles' => 'required|integer',
            'id_position' => 'required|integer',
            'name' => 'required|string',
            'address' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed'
        ]);
        $user = new User([
            'id_roles' => $request->id_roles,
            'id_position' => $request->id_position,
            'name' => $request->name,
            'address' => $request->address,
            'email' => $request->email,
            'password' => bcrypt($request->password)

        ]);
        $user->save();
        return response()->json([
            'message' => 'Successfully created new user !'
        ],201);

    }
    public function login(request $request){
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);
        $credentials = request(['email','password']);
        if(!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Unauthorized'
            ],401);
        $user = $request->user();

        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;

        if($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();
        if($user->id_roles != '1')
            $status = ['status' => false, 'message'=>'Bukan admin'];
            
        else
            $status = ['status' => true, 'message'=>'admin'];
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'status' => $status,
            'email' => $user->email,
            'user' => $user->name,
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
            
        ]);
    }

    public function logout(request $request){
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out !'
        ]);
    }
    public function user(request $request){
        return response()->json($request->user());
    }

}
