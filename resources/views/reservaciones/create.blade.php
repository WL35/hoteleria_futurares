@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-dark" style="color:white">
                    <div class="row">

                        <div class="col-md-3 pt-3 ">
                            Nueva Reservacion

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('reservaciones.store')}}">
                        @csrf

    @isset($v_reserva)
   <?php
   $v_reserva=$v_reserva[0];
   ?>
    <div class="alert  alert-dismissible" style="background:#f9d6d5;color:#8c3b38;" data-dismiss="alert" role="alert">
    <em class="fa fa-lg fa-warning text-white">
    </em>
    <strong style="color:#8c3b38;">
        Advertencia:
    </strong>
    Existe Una reserva {{$v_reserva->res_f_llegada}} Hasta {{$v_reserva->res_f_salida}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
    @endisset

                        <input type="hidden" name="usu_id" value="">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="hab_detalle" class="col-md-4 col-form-label text-md-right">{{ __('Habitacion NRO') }}</label>

                                    <div class="col-md-6">
                                        <div class="form-control">{{$habitaciones->hab_id}} </div>
                                        <input type="hidden" name="hab_id" value="{{$habitaciones->hab_id}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="cli_id" class="col-md-4 col-form-label text-md-right">{{ __('Cliente') }}</label>
                                    <div class="col-md-6">

                                        <select class="form-control " id="buscador_clientes" name="cli_id" id="validationCustom04" required>
                                            <option disabled selected value="">Seleccione un Cliente</option>

                                            @foreach($clientes as $cli)
                                            <option value="{{$cli->cli_id}}">{{$cli->cli_cedula}} - {{$cli->cli_nombre}} {{$cli->cli_apellido}}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a valid state.
                                        </div>
                                        <script>
                                            $("#buscador_clientes").select2({

                                                tags: true
                                            });
                                        </script>


                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="res_noches" class="col-md-4 col-form-label text-md-right">{{ __('NRO de Noches') }}</label>

                                    <div class="col-md-6">
                                        <input id="res_noches" type="number" min="1" class="form-control @error('res_noches') is-invalid @enderror" name="res_noches" value="{{ old('res_noches') }}" required autocomplete="res_noches" autofocus>

                                        @error('res_noches')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="hab_detalle" class="col-md-4 col-form-label text-md-right">{{ __('Personas') }}</label>

                                    <div class="col-md-6">
                                        <div class="row" style="margin-left: 1%;">


                                            <input id="res_adultos" type="number" min="0" style="width: 47%;" placeholder="Adultos" class="form-control @error('res_adultos') is-invalid @enderror" name="res_adultos" value="{{ old('res_adultos') }}" required autocomplete="res_adultos" autofocus>
                                            <input id="res_niños" type="number" min="0" style="width: 47%;" placeholder="Niños" class="form-control @error('res_niños') is-invalid @enderror" name="res_niños" value="{{ old('res_niños') }}" required autocomplete="res_niños" autofocus>

                                        </div>
                                        @error('res_adultos')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        @error('res_niños')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>









                            </div>
                            <div class="col-md-6">

                                <div class="form-group row">
                                    <label for="res_f_llegada" class="col-md-4 col-form-label text-md-right">{{ __('Fecha de Ingreso') }}</label>

                                    <div class="col-md-6">
                                        <input id="res_f_llegada" type="date" class="form-control @error('res_f_llegada') is-invalid @enderror" name="res_f_llegada" value="{{ old('res_f_llegada') }}" required autocomplete="res_f_llegada" autofocus>

                                        @error('res_f_llegada')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>




                                <div class="form-group row">
                                    <label for="res_f_salida" class="col-md-4 col-form-label text-md-right">{{ __('Fecha de Salida') }}</label>

                                    <div class="col-md-6">
                                        <input id="res_f_salida" type="date" class="form-control @error('res_f_salida') is-invalid @enderror" name="res_f_salida" value="" required autocomplete="res_f_salida" autofocus>

                                        @error('res_f_salida')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="res_estado" class="col-md-4 col-form-label text-md-right">{{ __('Estado') }}</label>

                                    <div class="col-md-6">
                                        <select class="form-control " name="res_estado" id="validationCustom04" required>
                                            <option disabled value="">Seleccione un Tipo de Reserva</option>
                                            <option selected value="1">Reserva para hoy</option>
                                            <option value="2">Futura Reserva</option>

                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a valid state.
                                        </div>
                                        @error('res_estado')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="res_total" class="col-md-4 col-form-label text-md-right">{{ __('Costo por Noche') }}</label>

                                    <div class="col-md-6">
                                        <input id="n_res_total"  type="number" readonly class="form-control @error('n_res_total') is-invalid @enderror" name="res_total" value="{{$n_res_total}}" required autocomplete="n_res_total" autofocus>

                                        @error('res_total')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="res_total" class="col-md-4 col-form-label text-md-right">{{ __('A pagar') }}</label>

                                    <div class="col-md-6">
                                        <input id="res_total"  type="number" readonly class="form-control @error('res_total') is-invalid @enderror" name="res_total" required autocomplete="res_total" autofocus>

                                        @error('res_total')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        </div>



                        <script>
               
window.onload = function(){
      const obj_cant=document.querySelector("#res_noches");
      const obj_vu=document.querySelector("#n_res_total");

     
      obj_cant.addEventListener("change",()=>{
      	calculos();
      });
      obj_vu.addEventListener("change",()=>{
      	calculos();
      });

}

const calculos=()=>{
      	const vc=document.querySelector("#res_noches");
      	const vu=document.querySelector("#n_res_total");
      	const vt=vc.value*vu.value;
      	document.querySelector("#res_total").value=vt;

}

const obj_n=document.querySelector("#res_noches");
const obj_fl=document.querySelector("#res_f_llegada");
obj_n.addEventListener("change",()=>{
    
    calculos_fecha();
});
obj_fl.addEventListener("change",()=>{
    
    calculos_fecha();
});

const calculos_fecha=()=>{
   
    const n=document.querySelector("#res_noches").value;
                    	const fl=document.querySelector("#res_f_llegada").value;
                        	
                            const fs=moment(fl).add(n, 'days').format('L');

       document.querySelector("#res_f_salida").value=fs;

 }
// window.onload = function(){
//       const obj_n=document.querySelector("#res_noches");
//       const obj_fh=document.querySelector("#res_f_llegada");
//       console.log(obj_n);
    //   obj_cant.addEventListener("change",()=>{
    //   	calculos();
    //   });
    //   obj_vu.addEventListener("change",()=>{
    //   	calculos();
    //   });

// }

// const calculos=()=>{
//       	const vc=document.querySelector("#res_noches");
//       	const vu=document.querySelector("#n_res_total");
//       	const vt=vc.value*vu.value;
//       	document.querySelector("#res_total").value=vt;

// }


</script>





                        <div class="text-center">
                            <a href="{{route('habitaciones')}}" class="btn " style="border:solid #000 1px;">Cerrar</a>
                            <button type="" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection