<nav class="nav_custom navbar navbar-expand-lg bg-body-tertiary bg_blu">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('welcome') }}"><img class="logo" src="https://i.imgur.com/Yj3smKy.png" alt="logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('welcome') }}">Home</a>
                </li>

                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Categorie
                    </button>
                    <ul class="dropdown-menu">
                        @foreach ($categories as $category)
                            <li><a class="dropdown-item"
                                    href="{{ route('categoryShow', compact('category')) }}">{{ $category->name }}</a>
                            </li>
                        @endforeach

                    </ul>
                </div>

                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Accedi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Registrati</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="">Il tuo profilo</a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('announcements.index') }}">Tutti gli annunci</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('announcements.create') }}">Inserisci annuncio</a>
                    </li>

                    <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); 
                    document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @endguest

            </ul>
        </div>
    </div>
</nav>
