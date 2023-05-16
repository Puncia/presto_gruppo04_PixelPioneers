<x-layout>
    <div class="container-fluid m-5">
        <div class="row">
            <div class="col-6 text-center f1">
                <h1>
                    {{ $announcement_to_check ? 'Ecco l\'annuncio da revisionare:' : 'Non ci sono annunci da revisionare' }}
                </h1>
            </div>
        </div>
    </div>
    @if (session()->has('message'))
        <div class="alert alert-success" role="alert ">
            {{ session()->get('message') }}
        </div>
        <div class="col-12 col-md-6 m-1">
            <form action="{{ route('revisor.revert_announcement', ['announcement' => session('announcement')]) }}"
                method="POST">
                @csrf
                <button type="submit" class="btn_custom btn text-light">Annulla operazione</button>
            </form>
        </div>
    @endif
    @if (session()->has('revert_message'))
        <div class="alert alert-warning" role="alert">
            {{ session()->get('revert_message') }}
        </div>
    @endif
    @if ($announcement_to_check)
        <div class="container">
            <div class="row">
                <div class="col-12">
                    {{-- inizio carosello --}}
                    <div id="carouselExample" class="carousel slide">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="https://picsum.photos/200" class="d-block w-50" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="https://picsum.photos/200" class="d-block w-50" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="https://picsum.photos/200" class="d-block w-50" alt="...">
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
                    <h5 class="card-title">Titolo: {{ $announcement_to_check->title }}</h5>
                    <p class="card-text">Descrizione: {{ $announcement_to_check->body }}</p>
                    <p class="card-footer">Pubblicato il: {{ $announcement_to_check->created_at->format('d/m/Y') }} </p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 m-1">
                <form action="{{ route('revisor.accept_announcement', ['announcement' => $announcement_to_check]) }}"
                    method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn_custom btn text-light">Accetta</button>
                </form>
            </div>
            <div class="col-12 col-md-6 m-1">
                <form action="{{ route('revisor.reject_announcement', ['announcement' => $announcement_to_check]) }}"
                    method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn_custom btn text-light">Rifiuta</button>
                </form>
            </div>
        </div>
    @endif
</x-layout>
