<nav class="navbar navbar-expand-lg bg-body-tertiary bg_blu nav_custom">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('welcome') }}"><img class="logo" src="{{ asset('images/logo.png') }}"
                alt="logo"></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>



        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                @guest
                    <li class="nav-item">
                        <a class="nav-link nav-custom" href="{{ route('login') }}">{{ __('ui.Accedi') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-custom" href="{{ route('register') }}">{{ __('ui.Registrati') }}</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link nav-custom" href="">{{ __('ui.Saluta') }} {{ Auth::user()->name }}
                            <img class"mt-5 pt-5" width="25" height="25"
                                src="https://img.icons8.com/ultraviolet/40/so-so.png" alt="salute" /></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-custom nav-link" href="{{ route('announcements.index') }}">{{ __('ui.TAnn') }}</a>
                    </li>
                    <div class="dropdown">
                        <button id="drop_nav" class="nav-custom btn dropdown-toggle" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ __('ui.Categorie') }}
                        </button>

                        <ul class=" dropdown-menu">
                            @foreach ($categories as $category)
                                <li><a class="dropdown-item"
                                        href="{{ route('categoryShow', compact('category')) }}">{{ $category->getCategoryLocale() }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    @if (Auth::user()->is_revisor)
                        <li class="nav-item">
                            <a class="nav-custom nav-link btn btn-outline-success btn-sm position-relative"
                                aria-current="page" href="{{ route('revisor.index') }}">{{ __('ui.ZR') }}
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
                    <li class="nav-item">
                        <a class="nav-custom nav-link" href="{{ route('announcements.create') }}">{{ __('ui.PAnn') }}</a>
                    </li>
                    <a class="nav-custom nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); 
                document.getElementById('logout-form').submit();">{{ __('ui.Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @endguest
            </ul>
            <div class="dropdown p-0 ">
                <button id="drop_nav" class="btn dropdown-toggle  nav-custom" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    {{ __('ui.Lingua') }}
                </button>
                <ul class="dropdown-menu ">
                    <li><a class="dropdown-item d-flex " href="#">
                            <x-_locale lang="it" />
                        </a></li>
                    <li><a class="dropdown-item d-flex " href="#">
                            <x-_locale lang="en" />
                        </a></li>
                    <li><a class="dropdown-item d-flex " href="#">
                            <x-_locale lang="es" alt="spain" />
                        </a></li>
                </ul>
            </div>

            <div class="form_custom d-flex justify-content-end">
                <form action="{{ route('announcements.search') }}" method="GET" class="d-flex">
                    <input type="search" name="searched" class="form-control search" placeholder="Search"
                        aria-label="Search">
                    <button class="ms-1 btn btn_custom text-light" type="submit">{{ __('ui.Search') }}</button>
                </form>
            </div>


        </div>
    </div>

</nav>
