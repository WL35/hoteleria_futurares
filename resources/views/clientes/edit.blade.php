@extends('layouts.app')

@section('content')

 <div class="container ">
    <div class="row justify-content-center ">
        <div class="col-md-8 ">
            <div class="card">
                <div class="card-header bg-dark" style="color:#ffff ;">NUEVO CLIENTE</div>

                <div class="card-body">
                    <form method="POST" action="{{route('clientes.update',$cliente->cli_id)}}">
                        @csrf

                        <div class="form-group row">
                            <label for="cli_nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="cli_nombre" type="text" value="{{$cliente->cli_nombre}}" class="form-control @error('cli_nombre') is-invalid @enderror" name="cli_nombre" value="{{ old('cli_nombre') }}" required autocomplete="cli_nombre" autofocus>

                                @error('cli_nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cli_apellido" class="col-md-4 col-form-label text-md-right">{{ __('Apellido') }}</label>

                            <div class="col-md-6">
                                <input id="cli_apellido" type="text" value="{{$cliente->cli_apellido}}" class="form-control @error('cli_apellido') is-invalid @enderror" name="cli_apellido" value="{{ old('cli_apellido') }}" required autocomplete="cli_apellido" autofocus>

                                @error('cli_apellido')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cli_cedula" class="col-md-4 col-form-label text-md-right">{{ __('Cedula') }}</label>

                            <div class="col-md-6">
                                <input id="usu_cli_cedulanombre" value="{{$cliente->cli_cedula}}" type="number" class="form-control @error('cli_cedula') is-invalid @enderror" name="cli_cedula" value="{{ old('cli_cedula') }}" required autocomplete="cli_cedula" autofocus>

                                @error('cli_cedula')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" value="{{$cliente->email}}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="cli_telefono" class="col-md-4 col-form-label text-md-right">{{ __('telefono') }}</label>

                            <div class="col-md-6">
                                <input id="cli_telefono" type="number" value="{{$cliente->cli_telefono}}" class="form-control @error('cli_telefono') is-invalid @enderror" name="cli_telefono" value="{{ old('cli_telefono') }}" required autocomplete="cli_telefono" autofocus>

                                @error('cli_telefono')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cli_direccion" class="col-md-4 col-form-label text-md-right">{{ __('Direccion') }}</label>

                            <div class="col-md-6">
                                <input id="cli_telefono" type="text" value="{{$cliente->cli_direccion}}" class="form-control @error('cli_direccion') is-invalid @enderror" name="cli_direccion" value="{{ old('cli_direccion') }}" required autocomplete="cli_direccion" autofocus>

                                @error('cli_direccion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <button type="" style="width:250px;margin-left: 40%;" class="btn btn-primary">Guardar</button>

                   
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 
@endsection
