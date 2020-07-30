<!doctype html>
<html>
    <head>
        <title>FoodTime</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="{{asset('bootstrap/bootstrap.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <script src="{{asset('bootstrap/bootstrap.js')}}"></script>
        <!-- JS, Popper.js, and jQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </head>
    <body class='text-center'>          
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark sticky-top">
            <div class="container">
                <a class="navbar-brand text-warning">
                    <img src="{{asset('img/logo_menu.png')}}" class="navbar-brand text-warning" width="90%"></img>
                </a>
                <button class="navbar-toggler btnRespon" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon  "></span>
                </button>
                <!-- ADMIN -->
                <div class="collapse navbar-collapse d-lg-flex justify-content-end " id="navbarSupportedContent">
                @auth
                    @if(auth()->user()->tipo == 'admin')
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link text-menu" href="{{route('welcome')}}">Início</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-menu" href="{{route('admin.itens.index')}}">Editar itens</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-menu" href="{{route('admin.categorias.index')}}">Editar Categorias</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-menu" href="{{route('admin.pedidos.index')}}">Pedidos Realizados</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-menu" href="#" onClick="event.preventDefault(); document.querySelector('form.logout').submit()">Sair</a>
                                <form action="{{route('logout')}}" method="POST" class="logout" style="display:none">
                                    @csrf
                                </form>
                            </li>
                        </ul>

                    <!-- USER -->
                    @elseif(auth()->user()->tipo == "user")
                        <ul class="navbar-nav">
                         <li class="nav-item">
                                <a class="nav-link text-menu">Bem-vindo, {{auth()->user()->nome}}!</a>
                            </li>  
                            <li class="nav-item">
                                <a class="nav-link text-menu" href="{{route('welcome')}}">Início</a>
                            </li>                        
                            <li class="nav-item">
                                <a class="nav-link text-menu" href="{{route('meuspedidos', ['id'=>auth()->user()->id])}}">Meus Pedidos</a>
                            </li>  
                            <li class="nav-item">
                                <a class="nav-link text-menu" href="#" onClick="event.preventDefault(); document.querySelector('form.logout').submit()">Sair</a>
                                <form action="{{route('logout')}}" method="POST" class="logout" style="display:none">
                                    @csrf
                                </form>
                            </li>                            
                        </ul>
                       @endif

                    @else
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-menu" href="{{route('welcome')}}">Início</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-menu" href="{{route('login')}}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-menu" href="{{route('register')}}">Registrar</a>
                        </li>
                    </ul>
                    @endauth
                </div>        
            </div>
        </nav>      
        <div clas="container">

            @yield('content')
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        </div>
    </body>
    <br>
    <footer class="page-footer font-small stylish-color-dark pt-4">
        <div class="container text-center text-md-left">
            <div class="row">
                <div class="col-md-3 mx-auto">
                    <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Cantina Tudo de Bom</h5>
                    <p><span class="font-weight-bold">Horário de Funcionamento:</span><br>
                    De Segunda à Sexta-feira<br>
                    7:00 ás 14:00h - 16:00 ás 22:00h</p><br>
                </div>
                <hr class="clearfix w-100 d-md-none">       
                <div class="col-md-4 mx-auto">
                    <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Localização</h5>
                    <i class='fas fa-map-marker-alt'></i>
                    R. Frei Galvão - Jardim Pedro Ometto, Jaú - SP<br>No interior da Fatec Jahu
                </div>
                <hr class="clearfix w-100 d-md-none">
                <div class="col-md-3 mx-auto">
                    <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Formas de pagamento</h5>
                    <ul class="list-unstyled">
                        <li>Crédito e Débito</li>
                        <img src="{{asset('img/icons.png')}}" class="cartoes" alt="Bandeiras dos cartões de crédito"></img>
                        <br><br>
                        <li>Dinheiro</li>
                        <img src="{{asset('img/money.jpg')}}" class="dinheiro" alt="Bandeiras dos cartões de crédito"></img>
                    </ul>
                </div>
            </div>
        </div>
        <hr>           
        <div class="footer-copyright text-center py-3">© 2020 Copyright:
            <p>Leonardo Frasson / Rafael Vieira / Heloisa Fernanda</p>
            <p>Grupo FoodTime</p>
        </div>
    </footer>
</html>
