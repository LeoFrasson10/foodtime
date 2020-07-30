@extends('layouts.app')
@section('content')
<br><br>
    
        <h2 class="text-center font-web">Lista de Itens</h2>
        <div class="form-group">
            <a href="{{route('admin.itens.create')}}" class="btn btn-warning text-light font-weight-bold">Criar novo Item</a>
            <a href="{{route('admin.categorias.create')}}" class="btn btn-secondary text-light font-weight-bold">Criar nova Categoria</a>
        </div>
        <table class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Titulo</th>
                    <th>Descritivo</th>
                    <th>Categoria</th>
                    <th>Status</th>
                    <th>Preco</th>
                    <th class="text-center">Ações</th>
                </tr>
            </th>
            <tbody>
                @foreach($itens as $dado)
                    @foreach($categorias as $dado2)
                        @if($dado->categorias_id == $dado2->id)
                        <tr>
                        <td>{{$dado->id}}</td>
                        <td>{{$dado->titulo}}</td>
                        <td>{{$dado->descritivo}}</td>
                        <td>{{$dado2->descritivo}}</td>
                        <td>{{$dado->status}}</td>
                        <td>R${{number_format($dado->preco,2,"," , ".")}}</td>
                        <td class="text-center"><a class="btn btn-success" href="{{route('admin.itens.edit', ['id'=>$dado->id])}}">Alterar</a>&nbsp
                        <a class="btn btn-danger" href="{{route('admin.itens.destroy', ['id'=>$dado->id])}}" >Excluir</a>&nbsp
                        @if ($dado->status == "A")
                            <a href="{{route('admin.itens.desativar', ['id'=>$dado->id])}}" class="btn btn-info">Desativar</a>
                        @else
                            <a href="{{route('admin.itens.desativar', ['id'=>$dado->id])}}" class="btn btn-info">Ativar</a>
                        @endif
                        </td>
                        @endif
                    </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
        <br>
        
    
@endsection