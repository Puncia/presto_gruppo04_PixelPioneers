<nav class="nav_custom navbar navbar-expand-lg bg-body-tertiary bg_blu">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('welcome') }}"><img class="logo" src="{{ asset('images/logo.png') }}"
                alt="logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        {{-- <div class="row">
            <div class="col-8 bg-info"> --}}

        <div class="collapse navbar-collapse  d-flex justify-content-start" id="navbarNav">
            <ul class="navbar-nav">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Accedi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Registrati</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="">Ciao, {{ Auth::user()->name }}<img width="25" height="25"
                                src="https://img.icons8.com/ios/50/salute.png" alt="salute" /></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('announcements.index') }}">Tutti gli annunci</a>
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



        </div>
        <div class="dropdown mx-3">
            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Lingua
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">
                        <img width="48" height="48" src="https://img.icons8.com/color/48/italy.png"
                            alt="italy" />
                        Italiano</a></li>
                <li><a class="dropdown-item" href="#">
                        <img width="48" height="48" src="https://img.icons8.com/color/48/great-britain.png"
                            alt="great-britain" />
                        Inglese</a></li>
                <li><a class="dropdown-item" href="#">
                        <img width="48" height="48" src="https://img.icons8.com/color/48/spain.png"
                            alt="spain" />
                        Spagnolo</a></li>
            </ul>
        </div>
        <div class="d-flex justify-content-end">
            <form action="{{ route('announcements.search') }}" method="GET" class="d-flex">
                <input type="search" name="searched" class="form-control search" placeholder="Search"
                    aria-label="Search">
                <button class="m-1 btn btn_custom text-light" type="submit">Search</button>
            </form>
        </div>
    </div>

    {{-- </div> --}}


</nav>
