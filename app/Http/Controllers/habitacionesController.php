<?php

namespace App\Http\Controllers;

use DB;
use App\habitaciones;
use App\tipo;
use App\reservaciones;
use Illuminate\Http\Request;

class habitacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos = tipo::all();
        $reservaciones=reservaciones::all();
        $habitaciones = DB::select("SELECT * FROM habitaciones h join tipo t on h.tip_id=t.tip_id");

        return view('habitaciones.index')->with('reservaciones',$reservaciones)->with('habitaciones', $habitaciones)->with('tipos', $tipos);
    }

    public function search(Request $request)
    {
        $data=$request->all();
        $tipos = tipo::all();
        
        if ($data['tip_id']=="todo") {
        $habitaciones = DB::select("SELECT * FROM habitaciones h JOIN tipo t ON h.tip_id=t.tip_id");
        return view('habitaciones.index')->with('habitaciones', $habitaciones)->with('tipos', $tipos);
            
        }else{

        $data = $request->all();
        $id = $data['tip_id'];
        $tipos = tipo::all();

        $habitaciones = DB::select("SELECT * FROM habitaciones h JOIN tipo t ON h.tip_id=t.tip_id WHERE h.tip_id='$id' ");

        return view('habitaciones.index')->with('habitaciones', $habitaciones)->with('tipos', $tipos);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        habitaciones::create($data);
        return redirect(route('habitaciones'))->with('message', 'Se ha creado Una Nueva habitacion   ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $habitaciones=habitaciones::find($id);

        $tipos=tipo::all();
        return view('habitaciones.edit')->with('tipos',$tipos)->with('habitaciones',$habitaciones);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function liberar( $id)
    {
        $habitaciones=habitaciones::find($id);

        return view('habitaciones.liberar')->with('habitaciones',$habitaciones);
    }
    public function liberarup(Request $request)
    {
        
        $data=$request->all();
        ///dd($data);
        $hab_id=$data['hab_id'];
        habitaciones::where('hab_id', $hab_id)->update(array('hab_estado' => '1'));
        return redirect(route('habitaciones'))->with('message','Se ha liberado una habitacion');

    }
    public function update(Request $request, $id)
    {
        $hab=habitaciones::find($id);
        $hab->update($request->all());
         return redirect(route('habitaciones'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
