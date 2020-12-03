@extends('adminlte::page')

@section('title', 'Detalhes do detalhe '.$detail->name)

@section('content_header')
    <ol class="breadcrumb">
        <li class='breadcrumb-item'><a href='{{route('admin.index')}}'>Dashboard</a></li>
        <li class='breadcrumb-item'><a href='{{route('admin.plans.index')}}'>Planos</a></li>
        <li class='breadcrumb-item'><a href='{{route('admin.plans.show', $plan->url)}}'>{{$plan->name}}</a></li>
        <li class='breadcrumb-item'><a href='{{route('admin.plan.details.index', $plan->url)}}'>Detalhes</a></li>
        <li class='breadcrumb-item active'><a href='{{route('admin.plan.details.show', [$plan->url, $detail->id])}}'>Detalhes</a></li>
    </ol>

    <h1>
        Detalhes do detalhe  {{$detail->name}}
    </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li><strong>Nome:</strong> {{$detail->name}}</li>
            </ul>
        </div>
        <div class="card-footer">
            <form action="{{route('admin.plan.details.destroy', [$plan->url, $detail->id])}}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class='btn btn-danger'>
                    <i class="fas fa-trash"></i>
                    Deletar o detalhe {{$detail->name}} do plano {{$plan->name}}
                </button>
            </form>
        </div>
    </div>
@endsection