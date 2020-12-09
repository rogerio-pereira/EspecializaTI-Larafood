@extends('adminlte::page')

@section('title', 'Detalhes da Permissão '.$permission->name)

@section('content_header')
    <h1>
        Detalhes da Permissão <strong>{{$permission->name}}</strong>
    </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome:</strong> {{$permission->name}}
                </li>
                <li>
                    <strong>Descricao:</strong> {{$permission->description}}
                </li>
            </ul>
        </div>

        <div class='card-footer'>
            @include('admin.includes.alerts')
            
            <form action="{{route('admin.permissions.destroy', $permission->id)}}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class='btn btn-danger'><i class="fas fa-trash"></i> DELETAR A PERMISSÃO</button>
            </form>
        </div>
    </div>
@stop