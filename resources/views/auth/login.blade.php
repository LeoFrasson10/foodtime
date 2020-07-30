@extends('layouts.app')
@section('content')
<br><br>
<div class="container">
    <div class="card bg-light">
        <article class="card-body mx-auto" style="width: 50%;">
            <h4 class="card-title mt-3 text-center">LOGIN</h4>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group input-group">
                    <div class="input-group-prepend"><span class="input-group-text"> <i class="fa fa-envelope"></i></span></div>
                        <input placeholder="E-mail" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                </div>
                <div class="form-group input-group">
                    <div class="input-group-prepend"><span class="input-group-text"> <i class="fa fa-lock"></i></span></div>
                    <input placeholder="Senha" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-warning btn-primary btn-block">ENTRAR</button>
                </div>
                <p class="text-center">Não possui uma conta? <a href="{{route('register')}}">Registrar</a></p>
            </form>
        </article>
    </div>
@endsection
