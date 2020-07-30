@extends('layouts.app')
@section('content')
<br><br>
    <div class="container">
        <h2 class="text-center font-web">Alterar Item</h2>
        <div class="card bg-light">
            <article class="card-body mx-auto" style="width: 50%;">
                <form action="{{route('admin.itens.update',['id'=>$item->id])}}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <h4 class="card-title mt-6 text-center">Categoria:</h4>
                        <select name="categorias_id" id="categorias" class="form-control">
                        @foreach($categorias as $dado)
                            @if($dado->status == "A")   
                                @if($dado->id == $item->categorias_id){
                                    <option value="{{$dado->id}}" selected>{{$dado->descritivo}}</option>"
                                } 
                                @else{
                                    <option value="{{$dado->id}}">{{$dado->descritivo}}</option>      
                                }
                                @endif 
                            @endif            
                        @endforeach           
                        </select>
                        <h4 class="card-title mt-6 text-center">Título:</h4>
                        <input type='text' name="titulo" value="{{$item->titulo}}"  class="form-control">
                        <h4 class="card-title mt-6 text-center">Descritivo:</h4>
                        <input type='text' name="descritivo" value="{{$item->descritivo}}"  class="form-control">
                        <h4 class="card-title mt-6 text-center">Preço:</h4>
                        <input type='text' name="preco" value="{{$item->preco}}"  class="form-control">
                    </div>
                <div>
                    <input type="submit" value="Enviar" class="btn btn-warning text-light font-weight-bold">
                </div>
                <br>
                <a href="{{route('admin.itens.index')}}"><button class="btn btn-danger text-light font-weight-bold">Voltar</button></a>
        </form>
        @endsection