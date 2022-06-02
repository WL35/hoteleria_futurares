<?php

namespace App\Http\Controllers;
use App\habitaciones;
use DB;
use Illuminate\Http\Request;

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
        $habitaciones1=DB::select("SELECT COUNT(hab_id) as total FROM habitaciones WHERE hab_estado=1");
        $habitaciones1=$habitaciones1[0];
        $habitaciones2=DB::select("SELECT COUNT(hab_id) as total FROM habitaciones WHERE hab_estado=2");
        $habitaciones2=$habitaciones2[0];
        $habitaciones3=DB::select("SELECT COUNT(hab_id) as total FROM habitaciones WHERE hab_estado=3");
        $habitaciones3=$habitaciones3[0];
        return view('home')->with('habitaciones1',$habitaciones1)->with('habitaciones2',$habitaciones2)->with('habitaciones3',$habitaciones3);
    }
}
