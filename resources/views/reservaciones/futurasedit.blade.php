@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark" style="color:white">
                    <div class="row">

                        <div class="col-md-3 pt-3 ">
                            Edit Reservacion

                        </div>
                    </div>
                </div>
                <div class="card-body">
                
                    <form method="POST" action="{{route('futreservaciones.update')}}">
                        @csrf

<input type="hidden" name="usu_id"  value="">

                        <div class="form-group row pt-3">
                            <label for="cli_id" class="col-md-4 col-form-label text-md-right">{{ __('Cliente') }}</label>

                            <div class="col-md-6">

                                <select class="form-control " id="buscador_clientes" name="cli_id" id="validationCustom04" required>
                                    <option disabled selected value="">Seleccione un Cliente</option>

                                    @foreach($clientes as $cli)
                                    @if($cli->cli_id==$reservaciones->cli_id)
                                    <option selected value="{{$cli->cli_id}}">{{$cli->cli_cedula}} - {{$cli->cli_nombre}} {{$cli->cli_apellido}} </option>
                                    @else
                                    <option  value="{{$cli->cli_id}}">{{$cli->cli_cedula}} - {{$cli->cli_nombre}} {{$cli->cli_apellido}}</option>

                                    @endif
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
<input type="text" hidden name="res_id" value="{{$reservaciones->res_id}}">
<input type="text" hidden name="usu_id" value="{{$reservaciones->usu_id}}">
                        <div class="form-group row">
                            <label for="hab_detalle" class="col-md-4 col-form-label text-md-right">{{ __('Habitacion NRO') }}</label>

                            <div class="col-md-6">
                                <div class="form-control">{{$habitaciones}} </div>
                                <input type="hidden" name="hab_id" value="{{$habitaciones}}">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="res_noches" class="col-md-4 col-form-label text-md-right">{{ __('NRO de Noches') }}</label>

                            <div class="col-md-6">
                                <input id="res_noches" type="number" min="0" value="{{$reservaciones->res_noches}}" class="form-control @error('res_noches') is-invalid @enderror" name="res_noches" value="{{ old('res_noches') }}" required autocomplete="res_noches" autofocus>

                                @error('res_noches')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="personas" class="col-md-4 col-form-label text-md-right">{{ __('Personas') }}</label>

                            <div class="col-md-6">
                                <div class="row" style="margin-left: 1%;">


                                    <input id="res_adultos" type="number" min="0"  value="{{$reservaciones->res_adultos}}"  style="width: 47%;" placeholder="Adultos" class="form-control @error('res_adultos') is-invalid @enderror" name="res_adultos" value="{{ old('res_adultos') }}" required autocomplete="res_adultos" autofocus>
                                    <input id="res_niños" type="number" min="0"  value="{{$reservaciones->res_niños}}" style="width: 47%;" placeholder="Niños" class="form-control @error('res_niños') is-invalid @enderror" name="res_niños" value="{{ old('res_niños') }}" required autocomplete="res_niños" autofocus>

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


                        <div class="form-group row">
                            <label for="res_f_llegada" class="col-md-4 col-form-label text-md-right">{{ __('Fecha de Ingreso') }}</label>

                            <div class="col-md-6">
                                <input id="res_f_llegada" type="date" class="form-control" name="res_f_llegada" value="{{$reservaciones->res_f_llegada}}"  required autocomplete="res_f_llegada" autofocus>
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
                                <input id="res_f_salida" type="date"  class="form-control @error('res_f_salida') is-invalid @enderror" name="res_f_salida"  value="{{$reservaciones->res_f_salida}}" value="{{ old('res_f_salida') }}" required autocomplete="res_f_salida" autofocus>

                                @error('res_f_salida')
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
                                        <input id="res_total"  type="number" readonly class="form-control @error('res_total') is-invalid @enderror" value="{{$reservaciones->res_total}}" name="res_total" required autocomplete="res_total" autofocus>

                                        @error('res_total')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
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