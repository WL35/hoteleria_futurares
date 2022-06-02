@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-dark" style="background: #4873C1;color:white">
                    <div class="row">


                        <div class="col-md-10 pt-2">
                            Recepcionistas

                        </div>
                        <div class="col-md-2 pt-2">
                        
                        <button type="button" class="btn" style="border:solid #000 1px;margin:1%; background: #ABFAB5" data-toggle="modal" data-target="#newmodal">
                                        Nuevo
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="newmodal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-dark">
                                                    <h5 class="modal-title " style="color:white;" id="staticBackdropLabel">Crear Recepcionista</h5>
                                                    <button type="button" class="close" style="color:white" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body" style="color:#000">

                                                    <form method="POST" action="{{route('recepcionistas.store')}}" id="formulario">
                                                        @csrf

                                                        <div class="form-group row">
                                                            <label for="cli_nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                                                            <div class="col-md-6">
                                                                <input id="usu_nombre" type="text"  class="form-control @error('usu_nombre') is-invalid @enderror" name="usu_nombre" value="{{ old('usu_nombre') }}" required autocomplete="usu_nombre" autofocus>

                                                                @error('cli_nombre')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="usu_apellido" class="col-md-4 col-form-label text-md-right">{{ __('Apellido') }}</label>

                                                            <div class="col-md-6">
                                                                <input id="usu_apellido" type="text"  class="form-control @error('usu_apellido') is-invalid @enderror" name="usu_apellido" value="{{ old('usu_apellido') }}" required autocomplete="usu_apellido" autofocus>

                                                                @error('usu_apellido')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="usu_cedula" class="col-md-4 col-form-label text-md-right">{{ __('Cedula') }}</label>

                                                            <div class="col-md-6">
                                                                <input id="usu_cedula" type="number"  class="form-control @error('usu_cedula') is-invalid @enderror" name="usu_cedula" value="{{ old('usu_cedula') }}" required autocomplete="usu_cedula" autofocus>

                                                                @error('usu_cedula')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                                                            <div class="col-md-6">
                                                                <input id="password" type="number"  class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus>

                                                                @error('password')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo') }}</label>

                                                            <div class="col-md-6">
                                                                <input id="email" type="email"  class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                                                @error('email')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>


                                                        <div class="form-group row">
                                                            <label for="usu_telefono" class="col-md-4 col-form-label text-md-right">{{ __('telefono') }}</label>

                                                            <div class="col-md-6">
                                                                <input id="usu_telefono" pattern="^[0-9]+" type="number"  class="form-control @error('usu_telefono') is-invalid @enderror" name="usu_telefono" value="{{ old('usu_telefono') }}" required autocomplete="usu_telefono" autofocus>

                                                                @error('usu_telefono')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                      





                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                            <button type="" class="btn btn-primary">Guardar</button>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>


                        </div>
                      
                    </div>
                </div>
                <div class="card-body">



                    <table class="table table-striped">
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Cedula</th>
                        <th>Correo</th>
                        <th>Telefono</th>
                        <th>Acciones</th>
                        @foreach($recepcionistas as $rep)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$rep->usu_nombre}}</td>
                            <td>{{$rep->usu_apellido}}</td>
                            <td>{{$rep->usu_apellido}}</td>
                            <td>{{$rep->email}}</td>
                            <td>{{$rep->usu_telefono}}</td>
                            <td>
                                <div class="row">



                                    <button type="button" class="btn" style="border:solid #000 1px;margin:1%; background: #85ADFF" data-toggle="modal" data-target="#editmodal{{$rep->usu_id}}">
                                        Editar
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="editmodal{{$rep->usu_id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-dark">
                                                    <h5 class="modal-title " style="color:white;" id="staticBackdropLabel">Editar Recepcionista</h5>
                                                    <button type="button" class="close" style="color:white" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body" style="color:#000">

                                                    <form method="POST" action="{{route('recepcionistas.update',$rep->usu_id)}}" id="formularioedit">
                                                        @csrf

                                                        <div class="form-group row">
                                                            <label for="cli_nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                                                            <div class="col-md-6">
                                                                <input id="usu_nombre" type="text" value="{{$rep->usu_nombre}}" class="form-control @error('usu_nombre') is-invalid @enderror" name="usu_nombre" value="{{ old('usu_nombre') }}" required autocomplete="usu_nombre" autofocus>

                                                                @error('cli_nombre')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="usu_apellido" class="col-md-4 col-form-label text-md-right">{{ __('Apellido') }}</label>

                                                            <div class="col-md-6">
                                                                <input id="usu_apellido" type="text" value="{{$rep->usu_apellido}}" class="form-control @error('usu_apellido') is-invalid @enderror" name="usu_apellido" value="{{ old('usu_apellido') }}" required autocomplete="usu_apellido" autofocus>

                                                                @error('usu_apellido')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="usu_cedula" class="col-md-4 col-form-label text-md-right">{{ __('Cedula') }}</label>

                                                            <div class="col-md-6">
                                                                <input id="usu_cedula" type="number" value="{{$rep->usu_cedula}}" class="form-control @error('usu_cedula') is-invalid @enderror" name="usu_cedula" value="{{ old('usu_cedula') }}" required autocomplete="usu_cedula" autofocus>

                                                                @error('usu_cedula')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                                                            <div class="col-md-6">
                                                                <input id="password" type="number" value="{{$rep->password}}" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus>

                                                                @error('password')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo') }}</label>

                                                            <div class="col-md-6">
                                                                <input id="email" type="email" value="{{$rep->email}}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                                                @error('email')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>


                                                        <div class="form-group row">
                                                            <label for="usu_telefono" class="col-md-4 col-form-label text-md-right">{{ __('telefono') }}</label>

                                                            <div class="col-md-6">
                                                                <input id="usu_telefono" min="0" pattern="[0-9]{2,4}" type="number" value="{{$rep->usu_telefono}}" class="form-control @error('usu_telefono') is-invalid @enderror" name="usu_telefono" value="{{ old('usu_telefono') }}" required autocomplete="usu_telefono" autofocus>

                                                                @error('usu_telefono')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                      





                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                            <button type="" class="btn btn-primary">Guardar</button>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>




                                    <button type="button" class="btn" style="border:solid #000 1px;margin:1%; background: #FFB3AE" data-toggle="modal" data-target="#deletemodal{{$rep->usu_id}}">
                                        Eliminar
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="deletemodal{{$rep->usu_id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-dark">
                                                    <h5 class="modal-title " style="color:white;" id="staticBackdropLabel">Eliminar Cliente</h5>
                                                    <button type="button" class="close" style="color:white" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body" style="color:#000">

                                                    <form method="POST" action="{{route('recepcionistas.destroy',$rep->usu_id)}}">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <p>Todos Los Datos De Este Cliente Se Eliminaran!!!</p>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                            <button type="" class="btn btn-danger">Eliminar</button>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>





                                </div>
                            </td>
                        </tr>
                        @endforeach

                    </table>

<script>
    const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');
const formulario = document.getElementById('formularioedit');
const inputs = document.querySelectorAll('#formularioedit input');
    const expresiones = {
	usu_nombre: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
	usu_cedula: /^\d{10,10}$/, // 7 a 14 numeros.
	usu_apellido: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	email: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	password: /^.{4,12}$/, // 4 a 12 digitos.
	usu_telefono: /^\d{10,10}$/ // 7 a 14 numeros.
}
</script>


                </div>
            </div>
        </div>
    </div>
</div>

@endsection