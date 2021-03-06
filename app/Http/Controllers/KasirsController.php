<?php

namespace App\Http\Controllers;

use App\Kasir;
use Illuminate\Http\Request;

class KasirsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kasir = Kasir::all();
        return view('kasir',compact('kasir'));
    }

    public function store(Request $request)
    {
        //
        // $request->validate([
        //     'nama_barang'=>'required',
        //     'harga_barang'=> 'required'
        // ]);

        Kasir::create($request->all());
        return redirect('kasir')->with('status','Barang Berhasil Ditambah');
    }

    public function destroy(Kasir $kasir)
    {
        Kasir::destroy($kasir->id);
        return redirect('/kasir')->with('status','Dihapus Berhasil');
    }
}
