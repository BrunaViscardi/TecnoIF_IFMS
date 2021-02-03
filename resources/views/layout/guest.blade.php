<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('pages/css/style.css')}}">
    <link rel="stylesheet" href="{{asset ('pages/style.css')}}">
    <title>TecnoIF</title>
</head>
<body>
<div role="main">
    <div class="container-brant" id="cabecalho">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand " href="/"> <img id="LogoCabecalho" src="{{ asset('img/TecnoIF.png') }}"
                                                    alt="logo TecnoIF"> </a>
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
                                id="redeSocial" src="{{ asset('img/y.png') }}" alt="logo youtube"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" target="_blank" href="https://linktr.ee/TecnoIF"> <img
                                id="redeSocial" src="{{ asset('img/L.png') }}" alt="logo LinkedIn"></a>
                    </li>

                </ul>
            </div>

        </nav>
    </div>

        @yield('content')


</div>

<script src="{{ asset ('pages/jquery.js') }}"></script>
<script src="{{asset('pages/js/script.js')}}"></script>
<script src="{{asset('pages/bootstrap.js')}}"></script>

</body>

</html>
