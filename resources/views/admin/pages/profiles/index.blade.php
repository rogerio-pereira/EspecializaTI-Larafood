@extends('adminlte::page')

@section('title', 'Perfis')

@section('content_header')
    <ol class="breadcrumb">
        <li class='breadcrumb-item'><a href='{{route('admin.index')}}'>Dashboard</a></li>
        <li class='breadcrumb-item active'><a href='{{route('admin.profiles.index')}}'>Perfis</a></li>
    </ol>

    <h1>
        Perfis 
        <a href='{{route('admin.profiles.create')}}' class='btn btn-dark'><i class="fas fa-plus"></i> Add</i></a>
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
                        <th>Nome</th>
                        <th width='130'>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($profiles as $profile)
                        <tr>
                            <td>{{$profile->name}}</td>
                            <td>
                                <a href='{{route('admin.profiles.edit', $profile->id)}}' class='btn btn-info'>Edit</a>
                                <a href='{{route('admin.profiles.show', $profile->id)}}' class='btn btn-warning'>Ver</a>
                            </td>
                        </tr>        
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if(isset($filters))
                {!! $profiles->appends($filters)->links() !!}
            @else
                {!! $profiles->links() !!}
            @endif
        </div>
    </div>
@stop