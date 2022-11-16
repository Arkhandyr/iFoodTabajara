<!DOCTYPE html>
<html lang="en">

    <head>
        <link type="text/css" rel="stylesheet" href="app.css">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>iFood Tabajara</title>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    </head>

    <body>
        <header>
            <div class="px-3 py-2 bg-dark text-white">
                <div class="container">
                    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                        <a href="/" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
                            <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                                <use xlink:href="#bootstrap" />
                            </svg>
                        </a>

                        <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                            <li>
                                <a href="/" class="nav-link text-white">
                                    Home
                                </a>
                            </li>
                            <li class="my-auto">
                                <a href="{{route('tipoproduto')}}" class="nav-link text-white">
                                    TipoProdutos
                                </a>
                            </li>
                            <li>
                                <a href="{{route('produto')}}" class="nav-link text-white">
                                    Produtos
                                </a>
                            </li>
                            <li>
                                <a href="{{route('userinfo.create')}}" class="nav-link text-white">
                                    Info. de Usuário
                                </a>
                            </li>
                            <li>
                                <a href="{{route('endereco')}}" class="nav-link text-white">
                                    Endereços
                                </a>
                            </li>
                        </ul>

                        <div class="text-end">
                            @if (Auth::check())
                                <a class="btn btn-outline disabled">Logado como <em>{{Auth::user()->name}}</em></a>
                            @else
                                <a href="{{route("login")}}" class="btn btn-secondary">Login</a>
                                <a href="{{route("register")}}" class="btn btn-primary">Cadastrar</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <main class="py-4 bg-dark text-white">
            @yield('content')
        </main>
    </body>

</html>