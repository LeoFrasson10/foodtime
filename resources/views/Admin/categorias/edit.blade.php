@extends('layouts.app')
@section('content')
<br><br>
    <div class="container">
        <h2 class="text-center font-web">Alterar Categoria</h2>
        <div class="card bg-light">
            <article class="card-body mx-auto" style="width: 50%;">
                <form action="{{route('admin.categorias.update',['id'=>$categoria->id])}}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <h4 class="card-title mt-6 text-center">Descritivo:</h4>
                        <div class="form-group input-group">
                            <input class="form-control" type='text' name="descritivo" value="{{$categoria->descritivo}}" autofocus>
                        </div>
                    </div>
                    <div>
                        <input type="submit" value="Enviar" class="btn btn-warning text-light font-weight-bold">
                    </div>
                </form>
                <br>
                <a href="{{route('admin.categorias.index')}}"><button class="btn btn-danger text-light font-weight-bold">Voltar</button></a>
            </article>
        </div>
    </div>
@endsection