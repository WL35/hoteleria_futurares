@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h1> Desea Liberar Habitacion</h1>
                </div>
                <div class="card-body">
                    <form action="{{route('habitaciones.liberarup')}}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="hab_estado" class="col-md-4 col-form-label text-md-right">{{ __('Estado') }}</label>
                            <input type="hidden" name="hab_id" value="{{$habitaciones->hab_id}}">

                            <div class="col-md-6">
                                <!-- <input id="usu_cli_cedula" type="number" class="form-control @error('cli_cedula') is-invalid @enderror" name="cli_cedula" value="{{ old('cli_cedula') }}" required autocomplete="cli_cedula" autofocus> -->
                                <!-- <select name="hab_estado" id="hab_estado" class="form-control">
                                    <option value="2">Desocupado</option>

                                </select>
                                @error('hab_estado')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror -->
                            </div>
                        </div>
                        <div class="text-center">
                            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                            <button type="" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection