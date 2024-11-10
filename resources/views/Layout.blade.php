<!DOCTYPE html>
<html>
<head>
    <title>Listes des Etudiants</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body>

<div class="flex flex-col md:flex-row justify-between items-center">
  <div class="w-24 h-24">
    <a href=""><img src=""></a>
  </div>
  <ul class="flex flex-col md:flex-row items-center mb-3 md:mb-0">
    @auth
    <li class="md:mr-5 py-2 md:py-0"><a href="" class="hover:text-green-400">Les missions</a></li>
    <li class="md:mr-5 py-2 md:py-0"><a href="" class="hover:text-green-400">Mes conversations</a></li>
    <li class="md:mr-5 py-2 md:py-0"><a href="" class="hover:text-green-400">Mon compte</a></li>
    <li class="md:mr-5 py-2 md:py-0"><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="hover:text-green-400 ">Se déconnecter</a></li>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
    </form>

    @else
    <li class="md:mr-5 py-2 md:py-0"><a href="/login" class="hover:text-green-400">Se connecter</a></li>
    <li class="md:mr-5 py-2 md:py-0"><a href="/register" class="hover:text-green-400">S'enregistrer</a></li>
    @endauth
  </ul>
</div>

<div class="container">
    @yield('content')
</div>

</body>
</html>
