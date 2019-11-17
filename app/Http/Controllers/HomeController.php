<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Kasir;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $kasir = [];
        for ($i = 0; $i < 12; $i++) {
            $kasir[$i] = (int) Kasir::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', $i + 1)->sum('total');
        }
        
        $bulan = Kasir::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->month)->get();
        $tahun = Kasir::whereYear('created_at', Carbon::now()->year)->get();
        return view('index', compact('kasir', 'bulan', 'tahun'));
    }
}
