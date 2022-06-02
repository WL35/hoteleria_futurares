@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>editar habitacion</h1>
                </div>
                <div class="card-body">

                    <form method="POST" action="{{route('habitaciones.update',$habitaciones->hab_id)}}">
                        @csrf



                        <div class="form-group row">
                            <label for="hab_detalle" class="col-md-4 col-form-label text-md-right">{{ __('Detalle') }}</label>

                            <div class="col-md-6">
                                <input id="hab_detalle" type="text" class="form-control @error('hab_detalle') is-invalid @enderror" name="hab_detalle" value="{{$habitaciones->hab_detalle}}" value="{{ old('hab_detalle') }}" required autocomplete="hab_detalle" autofocus>

                                @error('hab_detalle')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="hab_estado" class="col-md-4 col-form-label text-md-right">{{ __('Estado') }}</label>

                            <div class="col-md-6">
                                <!-- <input id="usu_cli_cedula" type="number" class="form-control @error('cli_cedula') is-invalid @enderror" name="cli_cedula" value="{{ old('cli_cedula') }}" required autocomplete="cli_cedula" autofocus> -->
                                <select name="hab_estado" id="hab_estado" class="form-control">
                                    <option selected value="1">Disponible</option>
                                    <option value="3">Mantenimiento</option>

                                </select>
                                @error('hab_estado')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tip_id" class="col-md-4 col-form-label text-md-right">{{ __('Tipo') }}</label>

                            <div class="col-md-6">

                                <!-- <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus> -->





                                <select name="tip_id" class="form-control" id="validationCustom04" required>
                                    <option selected disabled value="">Selecione un Tipo</option>
                                    @foreach($tipos as $tip)
                                    
                                    @if($tip->tip_id==$habitaciones->tip_id)
                                    <option selected value="{{$tip->tip_id}}">{{$tip->tip_nombre}} - Camas {{$tip->tip_camas}}</option>


                                    @else
                                    <option value="{{$tip->tip_id}}">{{$tip->tip_nombre}} - Camas {{$tip->tip_camas}}</option>

                                    @endif
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Please select a valid state.
                                </div>






                            </div>
                        </div>








                        <div class="modal-footer">
                            <a type="button" href="{{route('habitaciones')}}"  class="btn btn-secondary" >Cerrar</a>
                        </form>
                        <button type="" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection