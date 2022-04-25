
@extends('layout.master')
@section('titulo', auth()->user()->name)
@section('seccion', auth()->user()->name)
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar perfil') }}</div>
                <div class="card-body">
                    <form id="editar_perfil" method="POST" action="{{ route('perfil.update') }}">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="name">Nombre de usuario</label>
                            <input  type="text" name="name" class="form-control" value="{{auth()->user()->name}}" required> 
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input  type="text" name="email" class="form-control" value="{{auth()->user()->email}}" required> 
                        </div>
                        <div class="form-group">
                            <a href="{{route('reset.passwd')}}">Restablecer contraseña </a>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop