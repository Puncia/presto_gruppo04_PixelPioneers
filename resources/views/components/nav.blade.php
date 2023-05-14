<nav class="nav_custom navbar navbar-expand-lg bg-body-tertiary bg_blu">
    <div class="container-fluid justify-content">
        <a class="navbar-brand" href="{{ route('welcome') }}"><img class="logo" src="{{ asset('images/logo.png') }}" alt="logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        {{-- <div class="row">
            <div class="col-8 bg-info"> --}}

            <div class="collapse navbar-collapse " id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('welcome') }}">Home</a>
                    </li>
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Multilingua
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">
                                    <img width="48" height="48" src="https://img.icons8.com/color/48/italy.png"
                                        alt="italy" />
                                    Italiano</a></li>
                            <li><a class="dropdown-item" href="#">
                                    <img width="48" height="48"
                                        src="https://img.icons8.com/color/48/great-britain.png" alt="great-britain" />
                                    Inglese</a></li>
                            <li><a class="dropdown-item" href="#">
                                    <img width="48" height="48" src="https://img.icons8.com/color/48/spain.png"
                                        alt="spain" />
                                    Spagnolo</a></li>

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
                        <a class="nav-link" href="">Ciao, {{Auth::user()->name}}<img width="25" height="25" src="https://img.icons8.com/ios/50/salute.png" alt="salute"/></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('announcements.index') }}">Tutti gli annunci</a>
                    </li>
                    @if (Auth::user()->is_revisor)
                        <li class="nav-item">
                            <a class="nav-link btn btn-outline-success btn-sm position-relative" aria-current="page"
                                href="{{ route('revisor.index') }}">
                                Zona revisore
                                <span
                                    class="position-absolute top-0 start-100 translate-middle badge
                                        rounded-pill bg-danger">
                                    {{ App\Models\Announcement::toBeRevisionedCount() }}
                                    {{-- contatore annunci da revisionare --}}
                                    <span class="visually-hidden">unread messages</span>
                                </span>
                            </a>
                        </li>
                    @endif

            {{-- </div> --}}

            {{-- <div class="col-4"> --}}
              

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
                </div>
            </div>
        </div>

    
</nav>
