<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class UserItemController extends Controller
{
    public function index(){
        $items = Item::paginate(5);
        return view('pages/useritem', compact('items'));
    }

}
