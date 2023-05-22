<x-layout>

    {{-- ALLERT --}}

    @if (session()->has('access.denied'))
        <div class="alert alert-danger">
            {{ session()->get('access.denied') }}
        </div>
    @endif
    {{-- MESSAGE --}}

    @if (session()->has('message'))
        <div class="class-flex flex-row justify-center my-2 alert alert-success">
            {{ session('message') }}
        </div>
    @endif


    {{-- CAROSELLO --}}

    <div class="container">
        <div class="row text-center m-5">
            <p class="border-bottom p-3 f2 tx-sec text_shadow">{{ __('ui.Titolo1') }}</p>
            <h1 class="fs-1 f1 ">{{ __('ui.Welcome') }}</h1>
        </div>
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img class="img-fluid" src="https://images.pexels.com/photos/18104/pexels-photo.jpg" />
                </div>
                <div class="swiper-slide">
                    <img class="img-fluid"
                        src="https://images.pexels.com/photos/1510173/pexels-photo-1510173.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" />
                </div>
                <div class="swiper-slide">
                    <img class="img-fluid"
                        src="https://images.pexels.com/photos/3281608/pexels-photo-3281608.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" />
                </div>
                <div class="swiper-slide">
                    <img class="img-fluid"
                        src="https://images.pexels.com/photos/170811/pexels-photo-170811.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" />
                </div>
                <div class="swiper-slide">
                    <img class="img-fluid"
                        src="https://images.pexels.com/photos/768125/pexels-photo-768125.jpeg?auto=compress&cs=tinysrgb&w=1600" />
                </div>
                <div class="swiper-slide">
                    <img class="img-fluid"
                        src="https://images.pexels.com/photos/788946/pexels-photo-788946.jpeg?auto=compress&cs=tinysrgb&w=1600" />
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>

        {{-- ANNUNCI --}}

        <h1 class="fs-1 f1 text-center m-5 border-top py-3">{{ __('ui.Titolo2') }}</h1>
        <div class="container-fluid ">
            <div class="row justify-content-center">
                @foreach ($announcements as $announcement)
                    @if ($announcement->is_accepted == 1)
                        <div class="cardcustom col-12 col-md-4 my-5 d-flex justify-content-evenly flip-card f1">
                            <div class="flip-card-inner f1">
                                <div class="cardcustom flip-card-front f1">
                                    <img src="{{ !$announcement->images()->get()->isEmpty()? $announcement->images()->first()->getUrl(400, 300): asset('images/placeholder.png') }}"
                                        class="cardcustom immagine">
                                </div>
                                <div class="cardcustom flip-card-back f1 pt-4 text-center">
                                    <h5>{{ strlen($announcement->title) > 35 ? trim(substr($announcement->title, 0, 35)) . '...' : $announcement->title }}
                                    </h5>
                                    <p>{{ strlen($announcement->body) > 30 ? trim(substr($announcement->body, 0, 30)) . '...' : $announcement->body }}
                                    </p>
                                    <p>{{ $announcement->price }}€</p>
                                    <a href="{{ route('announcements.show', compact('announcement')) }}"
                                        class="justify-content btncard text-light">{{ __('ui.Show') }}</a>
                                    <a href="{{ route('categoryShow', ['category' => $announcement->category]) }}"
                                        class="my-2 border-top pt-2 border-dark shadow btncard text-light">{{ __('ui.Categoria') }}
                                        {{ $announcement->category->getCategoryLocale() }}</a>
                                    {{-- chiedere come cambiare le categorie!! --}}
                                    <p>{{ __('ui.Public') }}
                                        {{ $announcement->created_at->format('d/m/Y') }}
                                        {{ __('ui.Autore') }} {{ $announcement->user->name ?? '' }}
                                    </p>
                                </div>
                                <div class="left-side"></div>
                                <div class="right-side"></div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</x-layout>
