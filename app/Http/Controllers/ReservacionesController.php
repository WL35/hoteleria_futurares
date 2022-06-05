<?php

namespace App\Http\Controllers;

use App\reservaciones;
use App\clientes;
use App\habitaciones;
use Auth;
use Illuminate\Http\Request;
use DB;

class ReservacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $habitaciones=habitaciones::find($id);
        $cal=DB::select("SELECT * FROM habitaciones h JOIN tipo tip ON h.tip_id=tip.tip_id JOIN temporada tem ON tem.tem_id=tip.tem_id WHERE h.hab_id=$id");
        $cal=$cal[0];
        $v_hab=$cal->tip_precio;
        $v_tem=$cal->tem_valor;
        if($cal->tem_id==1){

                $n_res_total=$v_hab+$v_tem;
                }
                if($cal->tem_id==2){
    
                $n_res_total=$v_hab+$v_tem;
                }
                if($cal->tem_id==3){
    
                $n_res_total=$v_hab-$v_tem;
                }

        $clientes=clientes::all();
        $v_reserva=DB::select("SELECT * FROM habitaciones h LEFT JOIN reservaciones r ON h.hab_id=r.hab_id WHERE h.hab_id=$id AND res_estado=2");
     

        
        if($v_reserva==[]){
            return view('reservaciones.create')->with('clientes',$clientes)->with('habitaciones',$habitaciones)->with('n_res_total',$n_res_total);
            
        }else{
            return view('reservaciones.create')->with('clientes',$clientes)->with('habitaciones',$habitaciones)->with('v_reserva',$v_reserva)->with('n_res_total',$n_res_total);

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
        $data=$request->all();
        $llegada=$data['res_f_llegada'];
        
        $actual=$data['actual'];
        if($data['res_estado']==2 && $llegada==$actual){
            return redirect(route('habitaciones'))->with('danger','No se puede Hacer una futura reserva Con la fecha de hoy');

        }
        if($data['res_estado']==1 && $llegada!=$actual){
            return redirect(route('habitaciones'))->with('danger','No se puede Hacer una futura reserva Con la fecha de hoy');
        }else{
            $data['usu_id']=Auth::user()->usu_id;
            // dd($data);
    
            $hab_id=$data['hab_id'];
            $hab=habitaciones::find($hab_id);
            reservaciones::create($data);
           if($data['res_estado']==1){
    
               habitaciones::where('hab_id', $hab_id)->update(array('hab_estado' => '2'));
           }else{
            habitaciones::where('hab_id', $hab_id)->update(array('hab_estado' => '1'));
    
           }
            return redirect(route('habitaciones'))->with('message','Se ha Reservado correctamente ');

        }
    
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
        $f_actual=date('Y-m-d H:i');
        $reservaciones=DB::select("SELECT * FROM habitaciones h left JOIN reservaciones r ON h.hab_id=r.hab_id 
WHERE h.hab_id=$id
AND '$f_actual' BETWEEN r.res_f_llegada and r.res_f_salida");
             //dd($reservaciones);
        $reservaciones=$reservaciones[0];
        
$clientes=clientes::all();
$habitaciones=$id;

$cal=DB::select("SELECT * FROM habitaciones h JOIN tipo tip ON h.tip_id=tip.tip_id JOIN temporada tem ON tem.tem_id=tip.tem_id WHERE h.hab_id=$habitaciones");
$cal=$cal[0];
$v_hab=$cal->tip_precio;
$v_tem=$cal->tem_valor;
if($cal->tem_id==1){

        $n_res_total=$v_hab+$v_tem;
        }
        if($cal->tem_id==2){

        $n_res_total=$v_hab+$v_tem;
        }
        if($cal->tem_id==3){

        $n_res_total=$v_hab-$v_tem;
        }

        return view('reservaciones.edit')->with('reservaciones',$reservaciones)->with('clientes',$clientes)->with('habitaciones',$habitaciones)->with('n_res_total',$n_res_total);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data=$request->all();
        $id=$data['res_id'];
        $res=reservaciones::find($id);
        $res->update($request->all());
         return redirect(route('habitaciones'))->with('message','Se ha editado Correctamente');
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
    public function futreservaciones(){
        $clientes=clientes::all();
        $reservaciones=DB::select("SELECT * FROM reservaciones re 
        JOIN clientes cli ON re.cli_id=cli.cli_id
        JOIN habitaciones hab ON re.hab_id=hab.hab_id
        JOIN tipo tip on hab.tip_id=tip.tip_id
        JOIN temporada tem on tip.tem_id=tem.tem_id
        JOIN users usu ON re.usu_id=usu.usu_id where re.res_estado=2 ");
        // dd($reservaciones);
        return view('reservaciones.futuras')->with('reservaciones',$reservaciones)->with('clientes',$clientes);
    }
    public function futreservaciones_edit($id){
        $clientes=clientes::all();
        $reservaciones=DB::select("SELECT * FROM reservaciones re 
        JOIN clientes cli ON re.cli_id=cli.cli_id
        JOIN habitaciones hab ON re.hab_id=hab.hab_id
        JOIN tipo tip on hab.tip_id=tip.tip_id
        JOIN temporada tem on tip.tem_id=tem.tem_id
        JOIN users usu ON re.usu_id=usu.usu_id where re.res_id=$id");
        $reservaciones=$reservaciones[0];
        $habitaciones=$reservaciones->hab_id;
        $cal=DB::select("SELECT * FROM habitaciones h JOIN tipo tip ON h.tip_id=tip.tip_id JOIN temporada tem ON tem.tem_id=tip.tem_id WHERE h.hab_id=$habitaciones");
        $cal=$cal[0];
        $v_hab=$cal->tip_precio;
        $v_tem=$cal->tem_valor;
        if($cal->tem_id==1){
        
                $n_res_total=$v_hab+$v_tem;
                }
                if($cal->tem_id==2){
        
                $n_res_total=$v_hab+$v_tem;
                }
                if($cal->tem_id==3){
        
                $n_res_total=$v_hab-$v_tem;
                }
        return view("reservaciones.futurasedit")->with('clientes',$clientes)->with('reservaciones',$reservaciones)->with('n_res_total',$n_res_total)->with('habitaciones',$habitaciones);
    }
    public function futreservacionesupdate(Request $request)
    {
        $data=$request->all();
        $id=$data['res_id'];
        $res=reservaciones::find($id);
        $res->update($request->all());
         return redirect(route('futreservaciones'))->with('message','Se ha editado Correctamente');
    }
    public function anular($id){
$res_id=$id;
reservaciones::where('res_id', $res_id)->update(array('res_estado' => '3'));
return redirect(route('futreservaciones'))->with('message','Se ha anulado Correctamente');

    }
    public function activar(Request $request){
        
        $data=$request->all();
        $res_id=$data['res_id'];
        $hab_id=$data['hab_id'];
      
        habitaciones::where('hab_id', $hab_id)->update(array('hab_estado' => '2'));
        reservaciones::where('res_id', $res_id)->update(array('res_estado' => '1'));
        return redirect(route('futreservaciones'))->with('message','Se ha anulado Correctamente');
        
            }
            public function search(Request $request){
                $data=$request->all();
                $cedula=$data['cli_cedula'];
        $clientes=clientes::all();

                $reservaciones=DB::select("SELECT * FROM reservaciones re 
                JOIN clientes cli ON re.cli_id=cli.cli_id
                JOIN habitaciones hab ON re.hab_id=hab.hab_id
                JOIN tipo tip on hab.tip_id=tip.tip_id
                JOIN temporada tem on tip.tem_id=tem.tem_id
                JOIN users usu ON re.usu_id=usu.usu_id where re.res_estado=2 AND cli.cli_cedula=$cedula");
             
                
         if(empty($reservaciones)){
         
             return redirect(route('futreservaciones'))->with('danger','NO SE HA ENCONTRADO ESTE CLIENTE');
            }else{
             return view('reservaciones.futuras')->with('reservaciones',$reservaciones)->with('clientes',$clientes);
         
         }
            }
}
