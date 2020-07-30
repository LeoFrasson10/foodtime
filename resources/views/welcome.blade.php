@extends('layouts.app')
@section('content')
    <img src="{{asset('img/banner_edit.png')}}" width="100%"></img>
    <br><br><br>
    <h2 class="text-center font-web">Cardápio</h2>
    <br>
    <div class="container">
        <table class="table table-striped" id="tbcurso">
            <thead>
                <tr>
                    <th>Categoria</th>
                    <th>Titulo</th>
                    <th>Descritivo</th>                    
                    <th>Preco</th>
                    <th></th>
                </tr>
            </th>
            <tbody>
                @foreach($itens as $dado)
                    @if($dado->status == "A")
                        @foreach($categorias as $dado2)
                            @if($dado->categorias_id == $dado2->id)
                                <tr>    
                                <td>{{$dado2->descritivo}}</td>                    
                                <td>{{$dado->titulo}}</td>
                                <td>{{$dado->descritivo}}</td>
                                
                                <td>R${{number_format($dado->preco,2,"," , ".")}}</td>
                                @auth
                                    @if(auth()->user()->tipo == 'user')
                                        <td class="text-center"><a href="{{route('carrinho', ['id'=>$dado->id])}}">Adicionar ao carrinho</a></td>
                                @endauth
                                        @else
                                        <td class="text-center"><a href="{{route('login')}}">Adicionar ao carrinho</a></td>
                                    @endif
                            @endif
                        </tr>
                        @endforeach
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
    
@endsection