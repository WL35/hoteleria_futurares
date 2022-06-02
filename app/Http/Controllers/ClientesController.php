<?php

namespace App\Http\Controllers;
use App\clientes;
use DB;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes=clientes::all();
        return view('clientes.index')->with('clientes',$clientes);
    }

    public function search(Request $request){
       $data=$request->all();
       $cedula=$data['cli_cedula'];
       $clientes=DB::select("SELECT * FROM clientes where cli_cedula='$cedula' ");
    
       
if(isset($clientes[0])){

    return view('clientes.index')->with('clientes',$clientes);
}else{
    return redirect(route('clientes'))->with('danger','NO SE HA ENCONTRADO ESTE CLIENTE');

}



      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
   
        return view('clientes.create');
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
        
        clientes::create($data);
        
        return redirect(route('clientes'))->with('message','se ha creado el registro    ');
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
        $cliente=clientes::find($id);
        
// dd($cliente);
        return view('clientes.edit')->with('cliente',$cliente);
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
        $cli=clientes::find($id);
        $cli->update($request->all());
         return redirect(route('clientes'))->with('message','Se ha editado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reservaciones=DB::select("select * from reservaciones where cli_id=$id");
        

        if(empty($reservaciones)){
  clientes::destroy($id);
        return redirect(route('clientes'));
        }else{
return redirect(route('clientes'))->with('danger','No se puede borrar ya que este cliente esta en uso');
        
        }

      
    }
}
