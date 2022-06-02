<?php

namespace App\Http\Controllers;

use App\temporada;
use Illuminate\Http\Request;
use DB;
class TemporadaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $temporada=temporada::all();
        return view('temporada.index')->with('temporada',$temporada);
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
        $data=$request->all();
        
        temporada::create($data);
        return redirect(route('temporada'))->with('message','se ha creado el registro    ');
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
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $temporada=temporada::find($id);
        $temporada->update($request->all());
        return redirect(route('temporada'))->with('message','Se ha editado Correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

$tem=DB::select("select * from tipo where tem_id=$id");
        

        if(empty($tem)){
  
        temporada::destroy($id);
        return redirect(route('temporada'));
        }else{
return redirect(route('temporada'))->with('danger','No se puede borrar ya que esta temporada esta en uso');
        
        }


    }
}
