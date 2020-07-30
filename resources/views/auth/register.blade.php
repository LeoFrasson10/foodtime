@extends('layouts.app')
@section('content')
<br><br>
<div class="container">
    <div class="card bg-light">
        <article class="card-body mx-auto" style="width: 50%;">
            <h4 class="card-title mt-3 text-center">CRIAR CONTA</h4>
            <p class="text-center">Falta pouco para realizar seus pedidos!</p>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group input-group">
                    <div class="input-group-prepend"><span class="input-group-text"> <i class="fa fa-user"></i></span></div>
                    <input id="nome" name="nome" class="form-control" placeholder="Nome" type="text" class="form-control @error('nome') is-invalid @enderror"  value="{{ old('nome') }}" required autocomplete="nome" autofocus>
                    @error('nome')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
                <div class="form-group input-group">
                    <div class="input-group-prepend"><span class="input-group-text"> <i class="fa fa-user"></i></span></div>
                    <input id="sobrenome" type="text" placeholder="Sobrenome" class="form-control @error('sobrenome') is-invalid @enderror" name="sobrenome" value="{{ old('sobrenome') }}" required autocomplete="sobrenome" autofocus>
                        @error('sobrenome')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                </div>
                <div class="form-group input-group">
                    <div class="input-group-prepend"><span class="input-group-text"> <i class="fa fa-envelope"></i></span></div>
                    <input id="email" type="email" placeholder="E-mail" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                </div>
                <div class="form-group input-group">
                    <div class="input-group-prepend"><span class="input-group-text"> <i class="fa fa-address-card"></i></span></div>
                    <input id="cpf" type="text" placeholder="CPF" class="form-control @error('cpf') is-invalid @enderror" name="cpf" value="{{ old('cpf') }}" required autocomplete="cpf">
                        @error('cpf')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                </div>
                <div class="form-group input-group">
                    <div class="input-group-prepend"><span class="input-group-text"> <i class="fa fa-phone"></i></span></div>
                    <input id="ddd" type="text" class="form-control @error('ddd') is-invalid @enderror" name="ddd" value="{{ old('ddd') }}" required autocomplete="ddd" autofocus placeholder="DDD">
                    @error('DDD')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
                <div class="form-group input-group">
                    <div class="input-group-prepend"><span class="input-group-text"> <i class="fa fa-phone"></i></span></div>
                    <input placeholder="Celular" id="numero" type="text" class="form-control @error('numero') is-invalid @enderror" name="numero" value="{{ old('numero') }}" required autocomplete="numero" autofocus>
                        @error('numero')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                </div>
                <div class="form-group input-group">
                    <div class="input-group-prepend"><span class="input-group-text"> <i class="fa fa-lock"></i></span></div>
                    <input placeholder="Crie uma senha" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                </div>
                <div class="form-group input-group">
                    <div class="input-group-prepend"><span class="input-group-text"> <i class="fa fa-lock"></i></span></div>
                    <input placeholder="Repita a senha" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-warning btn-primary btn-block">CRIAR CONTA</button>
                </div>
                <p class="text-center">Já possui uma conta? <a href="{{route('login')}}">Logar</a></p>                                                                 
            </form>
        </article>
    </div> 
@endsection
