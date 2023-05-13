<x-layout>
    {{-- ALLERT--}}
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
    <div class="container-fluid">
        <div class="row text-center m-5">
            <p class="border-bottom p-3 f2 tx-sec text_shadow">Cogli l'opportunità che hai sempre cercato!</p>
            <h1 class="fs-1 f1">Benvenuti nel nostro e-commerce</h1>
        </div>
        <div class="col-12 vh-100">
            <div id="carouselExampleDark" class="carousel carousel-dark slide">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="10000">
                        <img src="https://assets.swappie.com/cdn-cgi/image/width=600,height=600,fit=contain,format=auto/swappie-iphone-14-red-back.png?v=34"
                            class="immaginecarosello" alt="...">
                        <div class="carousel-caption   text-align-last: justify;">
                            <h5>- IPHONE 14 -</h5>
                            <p>per ogni utente</p>
                        </div>
                    </div>
                    <div class="carousel-item" data-bs-interval="2000">
                        <img src="https://helpguide.sony.net/speaker/srs-xb12/v1/it/contents/image/SRS_XB12_Black_front_up-Large.png"
                            class="immaginecarosello" alt="...">
                        <div class="carousel-caption   text-align-last: justify;">
                            <h5>- SONY SRS-XB13 -</h5>
                            <p>Suono potente</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src=https://depieri.com/wp-content/uploads/2019/04/a1blu_2.png" class="immaginecarosello"
                            alt="...">
                        <div class="carousel-caption   text-align-last: justify;">
                            <h5> - AUDI A1 -</h5>
                            <p>Auto grintosa e sportiva</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
    {{-- ANNUNCI --}}
    <div class="container-fluid">
        <div class="row ">
            @foreach ($announcements as $announcement)
                <div class="col-12 col-md-4 my-5 d-flex justify-content-around ">
                    <div class="card shadow" style="width: 18rem;">
                        <img src="https://picsum.photos/200/300?grayscale" class="card-img-top p-3 rounded">
                        <div class="card-body">
                            <h5 class="card-title">{{ $announcement->title }}</h5>
                            <p class="card-text">{{ $announcement->body }}</p>
                            <p class="card-text">{{ $announcement->price }}</p>
                            <a href="" class="btn btn-primary shadow">Visualizza</a>
                            <a href=""
                                class="my-2 border-top pt-2 border-dark card-link shadow btn btn-success">Categoria:
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
</x-layout>
