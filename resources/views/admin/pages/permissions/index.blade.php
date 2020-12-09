@extends('adminlte::page')

@section('title', 'Permissões')

@section('content_header')
    <ol class="breadcrumb">
        <li class='breadcrumb-item'><a href='{{route('admin.index')}}'>Dashboard</a></li>
        <li class='breadcrumb-item active'><a href='{{route('admin.permissions.index')}}'>Permissões</a></li>
    </ol>

    <h1>
        Permissões 
        <a href='{{route('admin.permissions.create')}}' class='btn btn-dark'><i class="fas fa-plus"></i> Add</i></a>
    </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action='{{route('admin.permissions.search')}}' method='POST' class='form form-inline'>
                @csrf

            <input type="text" name='filter' id='filter' placeholder='Nome' class='form-control' value='{{ $filters['filter'] ?? '' }}'>
                <button type="submit" class='btn btn-dark'>Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width='130'>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>{{$permission->name}}</td>
                            <td>
                                <a href='{{route('admin.permissions.edit', $permission->id)}}' class='btn btn-info'>Edit</a>
                                <a href='{{route('admin.permissions.show', $permission->id)}}' class='btn btn-warning'>Ver</a>
                            </td>
                        </tr>        
                    @endforeach
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