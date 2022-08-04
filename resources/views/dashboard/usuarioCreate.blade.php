@extends('layouts.dashboard')
@section('contentBody')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Crear Usuario</h1>
        
    </div>
        
    <form method=POST action="{{route('usuariosSave')}}">
        @csrf
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                {{-- <div class="form-group row" @if( Route::currentRouteName() != 'climasShow') style="display:none" @endif">
                    <label for="idclimas" class="col-sm-2 col-md-2 col-lg-2 col-xl-2 col-form-label">Id</label>
                    <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                        <input type="text" class="form-control" id="idclimas" name="idclimas" value="{{ $clima->idclimas ?? '' }}" @if( Route::currentRouteName() == 'climasShow') readonly="readonly @endif" >
                    </div>
                </div> --}}

                <div class="form-group row">
                    <label for="role" class="col-sm-2 col-md-2 col-lg-2 col-xl-2 col-form-label">Rol</label>
                    <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                        <select name="role" id="role" class="form-control @error('role') is-invalid @enderror" required autocomplete="name" autofocus>
                            <option value="" disabled @if(old('role') == '') selected @endif>Seleccione una opción</option>
                            <option value="1" @if(old('role') == '1') selected @endif>Administrador</option>
                            <option value="2" @if(old('role') == '2') selected @endif>Colaborador</option>
                            <option value="3" @if(old('role') == '3') selected @endif>Cliente</option>
                        </select>
                        @error('role')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="tipo_documento" class="col-sm-2 col-md-2 col-lg-2 col-xl-2 col-form-label">Tipo Documento</label>
                    <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                        <select name="tipo_documento" id="tipo_documento" class="form-control @error('tipo_documento') is-invalid @enderror" required autocomplete="name" autofocus>
                            <option value="" disabled @if(old('tipo_documento') == '') selected @endif>Seleccione una opción</option>
                            <option value="CC" @if(old('tipo_documento') == 'CC') selected @endif>Cedula de ciudadanía</option>
                            <option value="CE" @if(old('tipo_documento') == 'CE') selected @endif>Cedula de extranjería</option>
                        </select>
                        @error('tipo_documento')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="cedula" class="col-sm-2 col-md-2 col-lg-2 col-xl-2 col-form-label">Cedula</label>
                    <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                        <input id="cedula" type="text" class="form-control @error('cedula') is-invalid @enderror" name="cedula" value="{{ old('cedula') }}" required autocomplete="cedula" autofocus>
                        @error('cedula')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="nombre" class="col-sm-2 col-md-2 col-lg-2 col-xl-2 col-form-label">Nombres</label>
                    <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                        <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>
                        @error('nombre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="apellido" class="col-sm-2 col-md-2 col-lg-2 col-xl-2 col-form-label">Apellidos</label>
                    <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                        <input id="apellido" type="text" class="form-control @error('apellido') is-invalid @enderror" name="apellido" value="{{ old('apellido') }}" required autocomplete="apellido" autofocus>
                        @error('apellido')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="telefono" class="col-sm-2 col-md-2 col-lg-2 col-xl-2 col-form-label">Celular</label>
                    <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                        <input id="telefono" type="number" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono" autofocus maxlength="10" minlength="10">
                        @error('telefono')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-md-2 col-lg-2 col-xl-2 col-form-label">Email</label>
                    <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-2 col-md-2 col-lg-2 col-xl-2 col-form-label">Contraseña</label>
                    <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-2 col-md-2 col-lg-2 col-xl-2 col-form-label">Confirmar Contraseña</label>
                    <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>
            </div>
        </div>
        
        <div class="form-group row text-center" style="margin-top: 2em;">
            <div class="col-sm-12 ">
                <button class="btn btn-success btn-icon-split" type="submit" id="btnCrear" name="btnCrear" @if( Route::currentRouteName() == 'quimicosShow') disabled @endif >
                    <span class="text">Crear usuario</span>    
                </button>
            </div>
        </div>
    </form>
@endsection

