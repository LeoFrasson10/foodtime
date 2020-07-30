@extends('layouts.app')
@section('content')
<br><br>
    <h2 class="text-center font-web">Datalhe do Pedido</h2>
    <div class="container">
        <br>
        <h4>{{$users->nome}}&nbsp{{$users->sobrenome}}</h4>
        <br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Descritivo</th>
                    <th>Quantidade</th>
                    <th>Preço</th>
                </tr>
            </thead>
            <tbody>
                <?php $total = 0.00;?>
                    @foreach($pedidos as $dadop)
                        @foreach($itemp as $dadoip)
                            @if($dadop->id == $dadoip->pedidos_id)
                                @foreach($itens as $dadoi)
                                    @if($dadoip->itens_id == $dadoi->id)                                
                                            <tr>
                                                <td>{{$dadoi->titulo}}</td>
                                                <td>{{$dadoi->descritivo}}</td>
                                                <td>{{$dadoip->quantidade}}</td>
                                                <td>{{$dadoi->preco}}</td>
                                                <?php
                                                    $aux =$dadoi['preco'] * $dadoip['quantidade'];
                                                    $total = $total +$aux;
                                                ?> 
                                            </tr>                                
                                    @endif
                                @endforeach  
                            @endif                              
                        @endforeach                         
                    @endforeach
                <tr>
                    <th colspan="3">Valor Total:</th>
                    <th colspan="2" id="resultado">R$ {{number_format($total,2,"," , ".")}}</th>
                </tr>
            </tbody>
        </table>
        <br>
        <a href="{{route('admin.pedidos.index')}}" class="btn btn-warning text-light font-weight-bold">Voltar</a>
    </div>
@endsection