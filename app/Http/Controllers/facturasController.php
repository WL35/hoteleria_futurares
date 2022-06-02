<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\facturas;
use App\Detalle;
use DB;
use PDF;
class FacturasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $facturas=DB::select("Select * from facturas join clientes on facturas.cli_id=clientes.cli_id");
        return view('facturas.index')
        ->with('facturas',$facturas)
        ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $clientes=DB::select("SELECT * from clientes");
        $habitaciones=DB::select("SELECT * from habitaciones");
        return view('facturas.create')
        ->with('clientes',$clientes)
        ->with('habitaciones',$habitaciones)
        ;
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
        $data=$request->all();
        $factura=Facturas::create($data);
        return redirect(route('facturas.edit',$factura->fac_id));

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
        $factura=Facturas::find($id);
        $clientes=DB::select("SELECT * from clientes");
        $habitaciones=DB::select("SELECT * from habitaciones");
        $detalle=DB::select("SELECT * FROM facturas_detalle fd 
                             JOIN habitaciones h ON fd.hab_id=h.hab_id JOIN tipo tip on h.tip_id=tip.tip_id JOIN temporada tem on tip.tem_id=tem.tem_id
                             WHERE fd.fac_id=$id");
                           
        return view('facturas.edit')
        ->with('factura',$factura)
        ->with('clientes',$clientes)
        ->with('habitaciones',$habitaciones)
        ->with('detalle',$detalle)
      
        ;
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

    public function detalle(Request $req){
         $datos=$req->all();
         $fac_id=$datos['fac_id'];
      
         if(empty($fac_id)){
            $clientes=DB::select("SELECT * from clientes");
            $habitaciones=DB::select("SELECT * from habitaciones");
            return view('facturas.create')
            ->with('clientes',$clientes)
            ->with('habitaciones',$habitaciones)
            ;
         }

         if(isset($datos['btn_detalle'])=='btn_detalle'){
      
             
               if(isset($datos['hab_id'])){

                   Detalle::create($datos);
               }else{

               }
         }
         if(isset($datos['btn_eliminar'])>0){
                ///ELIMINO EL DETALLE    
                $fad_id=$datos['btn_eliminar'];
                Detalle::destroy($fad_id);    

         }
       return redirect(route('facturas.edit',$fac_id));
    }

    public function facturas_pdf($fac_id){
        
        $factura=DB::select("
            SELECT * FROM facturas f
            JOIN clientes c ON c.cli_id=f.cli_id
            WHERE f.fac_id=$fac_id ");

        $detalle=DB::select("SELECT * FROM facturas_detalle fd 
        JOIN habitaciones h ON fd.hab_id=h.hab_id JOIN tipo tip on h.tip_id=tip.tip_id JOIN temporada tem on tip.tem_id=tem.tem_id
        WHERE fd.fac_id=$fac_id 
            ");

        $pdf = PDF::loadView('facturas.pdf',[ 'factura'=>$factura[0],'detalle'=>$detalle ]);
        return $pdf->stream('factura.pdf');




    }


}
