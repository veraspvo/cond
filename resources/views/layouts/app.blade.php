<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - CoND</title>
    @vite(['resources/js/app.js'])
</head>
<body class="bg-light text-dark">
      <header >
        <div class="bg-primary h-10 text-white">
            <h3 class="p-0 m-0 " >CoND - Controle de Numeração de Documento</h3>
        </div>
        <nav class="navbar navbar-dark bg-primary navbar-expand-lg ">
            <div class="container-fluid ">
              <a class="navbar-brand" href="#">Navbar</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Cadastro
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="{{ route('documentos.index')}}">Documento</a></li>
                      <li><a class="dropdown-item" href="{{ route('divisoes.index')}}">OM/Divisão</a></li>
                      <li><a class="dropdown-item" href="{{ route('documentos_divisoes.index')}}">Documentos da OM/Divisão</a></li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('controles.index')}}">Solicitar Número</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('controles.consulta')}}">Consulta</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>    
      </header>
  @yield('content')
  <!-- <footer>Footer Default</footer> -->
</body>
</html>