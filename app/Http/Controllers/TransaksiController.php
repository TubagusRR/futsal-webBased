<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Item;
use app\transaksi;
use DB;
use App\Quotation;

class TransaksiController extends Controller
{

    public function index()
    {
    $items = \App\transaksi::all();

    return view('item2.index', compact('items'));
    }

    public function lihatdata()
    {
        $data = DB::table('items')->get();
        return view('item2.create')->with('r',$data);
    }



    public function create()
    {
       
    }


    public function store(Request $request)
    {
        if ($request->kembalian < 0) {
            return redirect('/transaksi')->with('message', 'Uang Anda Tidak Cukup!');
        }
        
        \App\transaksi::create(
            $request->all()
        );

        return redirect('/transaksi')->with('message', 'Data Berhasil Di Input!');
    }


    public function show($id)
    {
        
    }


    public function edit($id)
    {
     
    }


    public function update(Request $request, $id)
    {
        
    }

    

    public function destroy($id)
    {
        
    }
}
