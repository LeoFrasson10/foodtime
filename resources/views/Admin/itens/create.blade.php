@extends('layouts.app')
@section('content')
<br><br>
    <div class="container">
        <h2 class="text-center font-web">Criar Item</h2>
        <div class="card bg-light">
            <article class="card-body mx-auto" style="width: 50%;">
                <form action="{{route('admin.itens.item')}}" method="post">
                    <input type="hidden" name="_token" value='{{csrf_token()}}'>
                    <div class="form-group">
                        <h4 class="card-title mt-6 text-center">Selecione uma Categoria:</h4>
                        <select name="categorias" id="categorias" class="form-control">  
                            <option></option>                 
                            @foreach($categorias as $dado)    
                                @if($dado->status == "A")                        
                                    <option value="{{$dado->id}}">{{$dado->descritivo}}</option>   
                                @endif
                            @endforeach               
                        </select>
                        <h4 class="card-title mt-6 text-center">Título:</h4>
                        <input type='text' name="titulo" id="titulo" class="form-control" >
                        <h4 class="card-title mt-6 text-center">Descritivo:</h4>
                        <input type='text' name="descritivo" id="descritivo" class="form-control">
                        <h4 class="card-title mt-6 text-center">Preço:</h4>
                        <input type='text' name="preco" id="Preco" class="form-control">
                    </div>
                    <div>
                        <input type="submit" value="Enviar" class="btn btn-warning text-light font-weight-bold">
                    </div>
                </form>
                <br>
                <a href="{{route('admin.itens.index')}}"><button class="btn btn-danger text-light font-weight-bold">Voltar</button></a>
            </article>
        </div>
    </div>
@endsection