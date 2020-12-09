@csrf

@include('admin.includes.alerts')

<div class="form-group">
    <label>* Nome:</label>
    <input type="text" name="name" id="name" class="form-control" placeholder="Nome" value='{{$permission->name ?? old('name')}}'>
</div>
<div class="form-group">
    <label>Descrição:</label>
    <input type="text" name="description" id="description" class="form-control" placeholder="Descrição" value='{{$permission->description ?? old('description')}}'>
</div>

<div class="form-group">
    <input type="submit" value="Enviar" class='btn btn-dark'>
</div>