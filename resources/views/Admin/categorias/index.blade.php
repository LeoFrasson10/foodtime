@extends('layouts.app')
@section('content')
<br><br>
    
        <h2 class="text-center font-web">Lista de Categorias</h2>
        <div class="form-group">
            <a href="{{route('admin.categorias.create')}}" class="btn btn-warning text-light font-weight-bold">Criar nova categoria</a>
            <a href="{{route('admin.itens.create')}}" class="btn btn-secondary text-light font-weight-bold">Criar novo Item</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Descritivo</th>
                    <th>Status</th>
                    <th class="text-center">Ações</th>
                </tr>
            </th>
            <tbody>
                @foreach($categorias as $dado)
                <tr>
                    <td>{{$dado->id}}</td>
                    <td>{{$dado->descritivo}}</td>
                    <td>{{$dado->status}}</td>
                    <td class="text-center"><a class="btn btn-success" href="{{route('admin.categorias.edit', ['id'=>$dado->id])}}">Alterar</a>&nbsp
                    <a href="{{route('admin.categorias.destroy', ['id'=>$dado->id])}}" class="btn btn-danger">Excluir</a>&nbsp
                    @if ($dado->status == "A")
                        <a href="{{route('admin.categorias.desativar', ['id'=>$dado->id])}}" class="btn btn-info">Desativar</a>
                    @else
                        <a href="{{route('admin.categorias.desativar', ['id'=>$dado->id])}}" class="btn btn-info">Ativar</a>
                    @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        
  
@endsection