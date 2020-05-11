<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class ItemController extends Controller
{
   
    public function index()
    {
        $items = Item::all();
        return view('item.index',['items'=>$items]);
    } 

    public function store(Request $request)
    {
        //syntax untuk menyimpan
        Item::create(
            $request->all()
        );
        return redirect()->route('item.index');
    }
    
    public function edit($id)
    {
        $items = Item::all();
        $item = Item::findOrFail($id);
        return view('item.index', compact('items','item'));
    }

    
    public function update(Request $request, $id)
    {
        $item = Item::findOrFail($id);
        $item->update(
            $request->all()
        );
        return redirect()->route('item.index');
    }

    
    public function destroy($id)
    {
         $item = Item::findOrFail($id);
         $item->delete();

         return redirect()->route('item.index');
    }
}
