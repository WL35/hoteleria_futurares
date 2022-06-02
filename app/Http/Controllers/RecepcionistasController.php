<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use DB;
class RecepcionistasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recepcionistas=user::all();
        return view('recepcionistas.index')->with('recepcionistas',$recepcionistas);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->all();
$data['password']=bcrypt($data['password']);
        user::create($data);
        return redirect(route('recepcionistas'))->with('message','Se ha creado el registro');
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
        $data=$request->all();
$data['password']=bcrypt($data['password']);
        $cli=user::find($id);
        $cli->update($data);
         return redirect(route('recepcionistas'))->with('message','Se ha editado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     $usu=user::find($id);
     $usu_tipo=$usu['usu_tipo'];
     if($usu_tipo==1){
        return redirect(route('recepcionistas'))->with('danger','No se puede borrar ya que este usuario Es Administrador');

     }
           $reservaciones=DB::select("select * from reservaciones where usu_id=$id");
        

        if(empty($reservaciones)){
  user::destroy($id);
        return redirect(route('recepcionistas'));
        }else{
return redirect(route('recepcionistas'))->with('danger','No se puede borrar ya que este cliente esta en uso');
        
        }
        
    }
}
