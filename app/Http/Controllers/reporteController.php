<?php

namespace App\Http\Controllers;

use App\clientes;
use App\tipo;
use Illuminate\Http\Request;
use DB;
use PDF;

class reporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos=tipo::all();
        $clientes=clientes::all();
        return view('reporte.index')->with('tipos',$tipos)->with('clientes',$clientes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
     public function reporte(Request $request)
    {
        $tipos=tipo::all();
        $clientes=clientes::all();
        $hab_id="";
        $cli_id="";
        $sql_hab="";
        $sql_cli="";
        $data=$request->all();
     
        if(isset($data['desde'])){
            $desde=$data['desde'];
            $hasta=$data['hasta'];
           

        }
        if(isset($data['hab_id'])){
            $hab_id=$data['hab_id'];
            $sql_hab="AND re.hab_id=$hab_id ";
        }
        if(isset($data['cli_id'])){
            $cli_id=$data['cli_id'];
            $sql_cli="AND re.cli_id=$cli_id ";
        }
     
        
        $reporte=DB::select("SELECT * FROM reservaciones re 
        JOIN clientes cli ON re.cli_id=cli.cli_id
        JOIN habitaciones hab ON re.hab_id=hab.hab_id
        JOIN tipo tip on hab.tip_id=tip.tip_id
        JOIN temporada tem on tip.tem_id=tem.tem_id
        JOIN users usu ON re.usu_id=usu.usu_id 
        AND re.res_f_llegada BETWEEN	'$desde' AND '$hasta'
        $sql_hab
        $sql_cli
        ");
        if(isset($data['btn_pdf'])){
 
            $data=['reporte'=>$reporte];
            $pdf=PDF::loadView('reporte.pdf',$data);
            return $pdf->stream('reporte.pdf');
        }


if(isset($reporte[0])){

    return view('reporte.index')->with('reporte',$reporte)
    ->with('tipos',$tipos)
    ->with('clientes',$clientes)
    ->with('desde',$desde)
    ->with('hasta',$hasta)
    ->with('hab_id',$hab_id)
    ->with('cli_id',$cli_id);

}else{
    return redirect(route('reporte'))->with('danger','NO SE HA ENCONTRADO UN REGISTRO');

}

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
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
