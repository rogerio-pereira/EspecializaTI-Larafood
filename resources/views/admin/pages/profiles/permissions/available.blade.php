@extends('adminlte::page')

@section('title', 'Permissões disponíveis para o Perfil '.$profile->name)

@section('content_header')
    <ol class="breadcrumb">
        <li class='breadcrumb-item'><a href='{{route('admin.index')}}'>Dashboard</a></li>
        <li class='breadcrumb-item active'><a href='{{route('admin.profiles.index')}}'>Perfis</a></li>
    </ol>

    <h1>
        Permissões disponíveis para o Perfil <strong>{{$profile->name}}</strong>
    </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action='{{route('admin.profiles.search')}}' method='POST' class='form form-inline'>
                @csrf

            <input type="text" name='filter' id='filter' placeholder='Nome' class='form-control' value='{{ $filters['filter'] ?? '' }}'>
                <button type="submit" class='btn btn-dark'>Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th width='50'>#</th>
                        <th>Nome</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="{{ route('admin.profile.permissions.attach', $profile->id) }}" method="post">
                        @csrf

                        @foreach ($permissions as $permission)
                            <tr>
                                <td>
                                    <input type="checkbox" name="permissions[]" id="permission_{{$permission->id}}" value='{{ $permission->id }}'>
                                </td>
                                <td>
                                    <label for='permission_{{$permission->id}}'>
                                        {{$permission->name}}
                                    </label>
                                </td>
                            </tr>        
                        @endforeach

                        <tr>
                            <td colspan="2">
                                @include('admin.includes.alerts')
                                 
                                <button type="submit" class='btn btn-success'>Vincular</button>
                            </td>
                        </tr>
                    </form>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if(isset($filters))
                {!! $permissions->appends($filters)->links() !!}
            @else
                {!! $permissions->links() !!}
            @endif
        </div>
    </div>
@stop