@extends('layouts.app')
@section('content')
<br><br>
    <h2 class="text-center font-web">Carrinho</h2>
    <div class="container">   
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Título</th>                    
                    <th>Descritivo</th>
                    <th>Quantidade</th>
                    <th>Preço</th>
                    <th>Ações</th>
                </tr>
            </th>
            <tbody>           
                <?php $total = 0.00;?>
                @if(session("carrinho"))
                    @foreach(session("carrinho") as $id=>$dado)
                    
                    <tr>
                        <td data-th="Product">{{$dado['titulo']}}</td>
                        <td data-th="Product">{{ $dado['descritivo'] }}</td>
                        <td data-th="Quantity">
                            <input type="number" value="{{ $dado['quantidade'] }}" class="form-control quantity" />
                        </td>
                        <td data-th="Price">R$ {{number_format($dado['preco'],2,"," , ".") }}</td>
                        <?php
                            $aux =$dado['preco'] * $dado['quantidade'];
                            $total = $total +$aux;
                        ?>
                        <td>
                            <a href="/remover/{{$id}}">Remover</a> 
                        </td>                 
                    </tr>
                    @endforeach 
                    <tr>
                        <th colspan="3">Valor Total:</th>
                        <th colspan="2" id="resultado">R$ {{number_format($total,2,"," , ".")}}</th>
                    </tr>                  
                @endif
                                
            </tbody>
        </table>
        <br>
        <a href="{{route('welcome')}}" class="btn btn-warning text-light font-weight-bold">Continuar comprando</a>
        <a href="{{route('salvar')}}" class="btn btn-warning text-light font-weight-bold">Finalizar compra</a>
    </div>

    <script type="text/javascript">
 
        
        $(".remove-from-carrinho").click(function (e) {
            e.preventDefault();
 
            var ele = $(this);
 
            if(confirm("Tem certeza que deseja remover este item?")) {
                $.ajax({
                    url: '{{ url('remove-from-carrinho') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });
 
    </script>
    
@endsection