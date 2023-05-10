<nav class="nav_custom navbar navbar-expand-lg bg-body-tertiary bg_blu">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Presto.it</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('welcome')}}">Home</a>
        </li>



        @guest
        <li class="nav-item">
          <a class="nav-link" href="{{route('login')}}">Accedi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('register')}}">Registrati</a>
        </li>

        @else

        <li class="nav-item">
          <a class="nav-link" href="">il tuo profilo</a>
        </li>


        <li class="nav-item">
          <a class="nav-link" href="">Tutti gli annunci</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{route('announcements.create')}}">Inserisci annuncio</a>
        </li>

        <a class="nav-link" href="{{ route('logout')}}" onclick="event.preventDefault(); 
                    document.getElementById('logout-form').submit();">Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form>
        @endguest

      </ul>
    </div>
  </div>
</nav>