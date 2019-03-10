<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cardstock;
use App\Item;
use App\User;

class CardController extends Controller
{
    public function index(request $request){
        $cards = Cardstock::all();
        $items = Item::all();     
        return view('pages/card',compact('cards','items'));
    }

   public function create(request $request){
       $card = new Cardstock;
       $card->id_users = $request->id_user;
       $card->date = $request->date;
       $card->id_items = $request->id_item;
       $card->qty_item = $request->qty_item;
       $card->description = $request->description;

       $card->save();
       return response()->json([
           'message' => 'success adding new card']
        ,201);

   }
    public function store(request $request){
        $cards = new Cardstock;
        $cards->id_users = auth()->id();
        $cards->date = $request->date;
        $cards->id_items = $request->id_item;
        $cards->qty_item = $request->qty_item;
        $cards->description = $request->des;

        $cards->save();
        return redirect('card');

        
    }
    public function destroy(request $request, $id){
    $card = Cardstock::find($id);
    $card->delete();
    return redirect('card');
    }
}
