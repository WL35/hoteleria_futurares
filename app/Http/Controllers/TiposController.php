<?php

namespace App\Http\Controllers;
use App\temporada;
use Illuminate\Http\Request;
use App\tipo;
use DB;

class TiposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $temporada=temporada::all();
        $tipos=tipo::all();
        $tipos=DB::select("SELECT * FROM tipo join temporada on tipo.tem_id=temporada.tem_id");
        return view('tipos.index')->with('tipos',$tipos)->with('temporada',$temporada);
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
        
        tipo::create($data);
        return redirect(route('tipos'))->with('message','se ha creado el registro    ');
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
        $tip=tipo::find($id);
        $tip->update($request->all());
         return redirect(route('tipos'))->with('message','Se ha editado Correctamente');
    }
    public function todo(Request $request)
    {
        //  $todo=$request->all();
        //  $todo=$todo['tem_id'];
        //  $temp=temporada::find($todo);
        //  $tipos=tipo::all();   
        //  $valor=$temp->tem_valor;
        //  foreach($tipos as $t) {
        //     if($temp['tem_id']==1){

        //     $nuevo_valor=$t->tip_precio+$valor;
        //     }
        //     if($temp['tem_id']==2){

        //     $nuevo_valor=$t->tip_precio+$valor;
        //     }
        //     if($temp['tem_id']==3){

        //     $nuevo_valor=$t->tip_precio-$valor;
        //     }
        //      DB::update("UPDATE tipo SET tip_precio=$nuevo_valor where tip_id=$t->tip_id");
        //  }

        //  return redirect(route('tipos'))->with('message','Se ha editado Correctamente');

         $todo=$request->all();
         $todo=$todo['tem_id'];
 
         $noticias = DB::update(DB::raw("UPDATE tipo SET tem_id=$todo"));


         return redirect(route('tipos'))->with('message','Se ha editado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $tip=DB::select("select * from habitaciones where tip_id=$id");
        

        if(empty($tip)){
 tipo::destroy($id);
        return redirect(route('tipos'));
        }else{
return redirect(route('tipos'))->with('danger','No se puede borrar ya que este tipo esta en uso');
        
        }

        
    }
}
