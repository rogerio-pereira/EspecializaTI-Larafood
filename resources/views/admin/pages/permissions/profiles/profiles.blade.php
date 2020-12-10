@extends('adminlte::page')

@section('title', 'Pefis da Permissão '.$permission->name)

@section('content_header')
    <ol class="breadcrumb">
        <li class='breadcrumb-item'><a href='{{route('admin.index')}}'>Dashboard</a></li>
        <li class='breadcrumb-item active'><a href='{{route('admin.permissions.index')}}'>Permissões</a></li>
    </ol>

    <h1>
        Pefis da Permissão  <strong>{{$permission->name}}</strong>
    </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width='50'>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($profiles as $profile)
                        <tr>
                            <td>{{$profile->name}}</td>
                            <td>
                                <a 
                                    href='{{route('admin.profile.permissions.detach', [$profile->id, $permission->id])}}' 
                                    class='btn btn-danger'
                                >
                                    DESVINCULAR
                                </a>
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