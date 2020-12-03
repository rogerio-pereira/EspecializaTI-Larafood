@extends('adminlte::page')

@section('title', 'Detalhes do Perfil '.$profile->name)

@section('content_header')
    <h1>
        Detalhes do Perfil <strong>{{$profile->name}}</strong>
    </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome:</strong> {{$profile->name}}
                </li>
                <li>
                    <strong>Descricao:</strong> {{$profile->description}}
                </li>
            </ul>
        </div>

        <div class='card-footer'>
            @include('admin.includes.alerts')
            
            <form action="{{route('admin.profiles.destroy', $profile->id)}}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class='btn btn-danger'><i class="fas fa-trash"></i> DELETAR O PERFIL</button>
            </form>
        </div>
    </div>
@stop