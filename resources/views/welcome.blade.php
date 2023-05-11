<x-layout>

    @if(session()->has('access.denied'))
    <div class="bg-danger">
        {{session()->get('access.denied')}}
    </div>
    @endif

    <header class="vh-100">
        <div class="container my-5 py-5">
            <div class="row  d-flex justify-content-start">
                <div class="col-6 col-md-4">
                    <div class="">
                        <h1 class="display-3 mb-3">Benvenuti sul nostro e-commerce</h1>
                        <p class="">Qui puoi vendere e comprare tutto e di più</p>
                    </div>
                </div>
            </div>
        </div>
    </header>

    {{-- <div class="row">
            <div class="col-12">
                <div id="carouselExample" class="carousel slide">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://picsum.photos/200/300?grayscale" class="d-block" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/200/300?grayscale" class="d-block" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/200/300?grayscale" class="d-block " alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <div class="conteiner"></div>
            </div>
        </div> --}}

    <div class="container-fluid ">
        <div class="row">
            @foreach ($announcements as $announcement)
                <div class="col-12 col-md-4 my-4">
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
