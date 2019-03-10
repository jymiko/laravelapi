<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cardstock;
use App\Item;
use App\User;

class UserCardController extends Controller
{
    public function index(request $request){
        $cards = Cardstock::where('id_users',auth()->id())->get();
        $items = Item::all();     
        return view('pages/usercard',compact('cards','items'));
    }
    public function store(request $request){
        $cards = new Cardstock;
        $cards->id_users = auth()->id();
        $cards->date = $request->date;
        $cards->id_items = $request->id_item;
        $cards->qty_item = $request->qty_item;
        $cards->description = $request->des;

        $cards->save();
        return redirect('carduser');

        
    }
    
}
