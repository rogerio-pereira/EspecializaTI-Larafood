@extends('adminlte::page')

@section('title', 'Cadastrar Novo Plano')

@section('content_header')
    <h1>
        Cadastrar Novo Plano
    </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('admin.plans.store')}}" class="form" method="POST">
                @csrf
                
                <div class="form-group">
                    <label>Nome:</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Nome">
                </div>
                <div class="form-group">
                    <label>Preço:</label>
                    <input type="text" name="price" id="price" class="form-control" placeholder="Preço">
                </div>
                <div class="form-group">
                    <label>Descrição:</label>
                    <input type="text" name="description" id="description" class="form-control" placeholder="Descrição">
                </div>
                
                <div class="form-group">
                    <input type="submit" value="Enviar" class='btn btn-dark'>
                </div>
            </form>
        </div>
    </div>
@stop