@extends('layouts.app')
@section('content')
<br><br>
    <h2 class="text-center font-web">Meus Pedidos</h2>
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Hora</th>
                    <th>Status</th>
                    <th class="text-center" colspan=3>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pedidos as $dado)
                    @if($dado->users_id)
                        @if($dado->status)
                            <tr>
                                <td>{{date('d/m/Y', strtotime($dado->data))}}</td>
                                <td>{{$dado->hora}}</td>
                                <td>{{$dado->status}}</td>
                                <td><a href="{{route('meuspedidosdetalhes', ['id'=>$dado->users_id,'idp'=>$dado->id])}}">Detalhes</a></td>
                            </tr>
                        @endif
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
@endsection