@extends('adminlte::page')

@section('title', 'Detalhes do Plano '.$plan->name)

@section('content_header')
    <ol class="breadcrumb">
        <li class='breadcrumb-item'><a href='{{route('admin.index')}}'>Dashboard</a></li>
        <li class='breadcrumb-item'><a href='{{route('admin.plans.index')}}'>Planos</a></li>
        <li class='breadcrumb-item'><a href='{{route('admin.plans.show', $plan->url)}}'>{{$plan->name}}</a></li>
        <li class='breadcrumb-item active'><a href='{{route('admin.plan.details.index', $plan->url)}}'>Detalhes</a></li>
    </ol>

    <h1>
        Detalhes do Plano {{$plan->name}}
        <a href='{{route('admin.plans.create')}}' class='btn btn-dark'><i class="fas fa-plus"></i> Add</i></a>
    </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width='130'>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($details as $detail)
                        <tr>
                            <td>{{$detail->name}}</td>
                            <td>
                                <a href='{{route('admin.plans.edit', $plan->url)}}' class='btn btn-info'>Edit</a>
                                <a href='{{route('admin.plans.show', $plan->url)}}' class='btn btn-warning'>Ver</a>
                            </td>
                        </tr>        
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {!! $details->links() !!}
        </div>
    </div>
@stop