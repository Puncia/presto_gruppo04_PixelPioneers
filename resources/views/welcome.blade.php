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
            <p class="border-bottom p-3 f2 tx-sec text_shadow">Cogli l'opportunità che hai sempre cercato!</p>
            <h1 class="fs-1 f1">Benvenuti nel nostro e-commerce</h1>
        </div>

        {{--    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://www.apple.com/newsroom/images/product/iphone/standard/Apple-iPhone-14-Pro-iPhone-14-Pro-Max-hero-220907_Full-Bleed-Image.jpg.large.jpg" class="img-custom img-fluid">
                </div>
                <div class="carousel-item">
                    <img src="https://helpguide.sony.net/speaker/srs-xb12/v1/it/contents/image/SRS_XB12_Black_front_up-Large.png" class="img-custom img-fluid">
                </div>
                <div class="carousel-item">
                    <img src="https://cdn.pixabay.com/photo/2014/07/04/13/41/auto-383897_1280.jpg" class="img-custom img-fluid">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div> --}}
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

        <h1 class="fs-1 f1 text-center m-5 ">Ultimi inseriti:</h1>
        <div class="container-fluid">
            <div class="row ">
                @foreach ($announcements as $announcement)
                    <div class="col-12 col-md-4 my-5 d-flex justify-content-around ">
                        <div class="card shadow" style="width: 18rem;">
                            <img src="https://picsum.photos/200/300?grayscale" class="card-img-top p-3 rounded">
                            <div class="card-body">
                                <h5 class="card-title">{{ $announcement->title }}</h5>
                                <p class="card-text">{{ $announcement->body }}</p>
                                <p class="card-text">{{ $announcement->price }}€</p>
                                <a href="" class="justify-content btn_custom btn text-light">Visualizza</a>
                                <a href=""
                                    class="my-2 border-top pt-2 border-dark card-link shadow btn_custom btn text-light">Categoria:
                                    {{ $announcement->category->name }}</a>
                                <p class="card-footer">Pubblicato il:
                                    {{ $announcement->created_at->format('d/m/Y H:m') }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-layout>
