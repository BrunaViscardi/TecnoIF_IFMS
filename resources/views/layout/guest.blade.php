<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset ('assets/style.css')}}">
    <title>TecnoIF</title>
</head>

<body>
<div role="main" >
    <div class="container-brant" id="cabecalho">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand " href="/"> <img id="LogoCabecalho" src="{{ asset('img/TecnoIF.png') }}" alt="logo TecnoIF"> </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSite">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" target="_blank" href="https://www.instagram.com/ifmscg/?igshid=1mn46ve39rvhy"> <img
                                id="redeSocial" src="{{ asset('img/i.png') }}"  alt="logo Instagram"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" target="_blank" href="https://pt-br.facebook.com/tecnoif/">
                            <img id="redeSocial" src="{{ asset('img/f.png') }}" alt="logo Facebook"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" target="_blank" href="https://www.youtube.com/channel/UC_DLD3-ADKtoa6j-EUTqTvg"> <img
                                id="redeSocial" src="{{ asset('img/y.png') }}" alt="logo Youtube"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" target="_blank" href="https://www.linkedin.com/in/tecnoif-incubadora-de-empresas-ifms-474aba1ba/"> <img id="redeSocial" src="{{ asset('img/l.png') }}" alt="logo LinkedIn"></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
        @yield('content')
    <br>
    <br>
    <footer class=" container footer " >
        <strong>Copyright &copy; {{date('Y')}} Incubadora de Empresas do IFMS.</strong>
        Todos os direitos reservados.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 1.0
        </div>
    </footer>

</div>


<script src="{{ asset ('assets/jquery.js') }}"></script>
<script src="{{asset('assets/js/script.js')}}"></script>
<script src="{{asset('assets/bootstrap.js')}}"></script>

</body>

</html>
