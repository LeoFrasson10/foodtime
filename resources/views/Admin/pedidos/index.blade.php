@extends('layouts.app')
@section('content')
<br><br>
    <h2 class="text-center font-web">Pedidos Pendentes</h2>
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nome Completo</th>
                    <th>Telefone</th>
                    <th>Data</th>
                    <th>Hora</th>
                    <th class="text-center" colspan=3>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pedidos as $dado)
                    @foreach($users as $dado2)
                        @if($dado->users_id == $dado2->id)
                            @if($dado->status == "Ativo" || $dado->status == "Pendente")
                                <tr>
                                    <td>{{$dado2->nome}}&nbsp&nbsp{{$dado2->sobrenome}}</td>
                                    <td>({{$dado2->ddd}})&nbsp&nbsp{{$dado2->numero}}</td>
                                    <td>{{date('d/m/Y', strtotime($dado->data))}}</td>
                                    <td>{{$dado->hora}}</td>

                                    @if($dado->status == "Ativo")
                                        <td><a href="{{route('admin.pedidos.aceitar', ['id'=>$dado->id])}}">Aceitar</a>&nbsp&nbsp
                                    @endif
                                        
                                    @if($dado->status == "Pendente")
                                        <td><a href="{{route('admin.pedidos.entregar', ['id'=>$dado->id])}}">Entregar</a>&nbsp&nbsp
                                    @endif
                                    <a href="{{route('admin.pedidos.cancelar', ['id'=>$dado->id])}}">Cancelar</a>&nbsp&nbsp
                                    <a href="{{route('admin.pedidos.detalhes', ['id'=>$dado2->id,'idp'=>$dado->id])}}">Detalhes</a></td>
                                </tr>
                            @endif
                        @endif
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
    <br> 
    <h2 class="text-center font-web">Histórico de Pedidos</h2>
    <div class="container">
    <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nome Completo</th>
                    <th>Telefone</th>
                    <th>Data</th>
                    <th>Status</th>
                    <th class="text-center" colspan=3>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pedidos as $dado)
                    @foreach($users as $dado2)
                        @if($dado->users_id == $dado2->id)
                        <tr>
                            @if($dado->status == "Entregue" || $dado->status == "Cancelado")
                            <td>{{$dado2->nome}}&nbsp&nbsp{{$dado2->sobrenome}}</td>
                            <td>{{$dado2->numero}}</td>
                            <td>{{date('d/m/Y', strtotime($dado->data))}}</td>
                            <td>{{$dado->status}}</td>
                            <td><a href="{{route('admin.pedidos.detalhes', ['id'=>$dado2->id,'idp'=>$dado->id])}}">Detalhes</a></td>
                            @endif
                        </tr>
                        @endif
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
@endsection