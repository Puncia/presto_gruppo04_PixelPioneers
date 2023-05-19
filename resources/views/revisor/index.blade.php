<x-layout>

    <div class="container-fluid my-5">
        <div class="row">
            <div class="col-6 text-center f1">
                <h1>
                    {{ $announcement_to_check ? 'Ecco gli annunci da revisionare:' : 'Non ci sono annunci da revisionare' }}
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
        <div class="container mb-5 d-flex ">
            <div class="row">
                <div class="col-6 d-inline d-flex">
                    <div class="col-12 col-md-4 card shadow" style="width: 18rem;">

                        {{-- inizio carosello --}}

                        <div id="carouselExample" class="carousel slide">
                            @if ($announcement_to_check->images)
                                <div class="carousel-inner">
                                    @forelse ($announcement_to_check->images as $image)
                                        <div class="carousel-item @if ($loop->first) active @endif">
                                            <img src="{{ Storage::url($image->path) }}" class="w-100 p-3 rounded"
                                                alt="">
                                        </div>
                                        <div class="col-4 d-inline">
                                            <h5 class="tc-accent">Revisione immagini</h5>
                                            <p><span class="{{ $image->adult }}"></span> 18+</p>
                                            <p><span class="{{ $image->spoof }}"></span> Satira</p>
                                            <p><span class="{{ $image->medical }}"></span> Medicina</p>
                                            <p><span class="{{ $image->violence }}"></span> Immagini violente</p>
                                            <p><span class="{{ $image->racy }}"></span> Razzismo</p>
                                        </div>

                                        <div>
                                            @foreach ($image->labels as $label)
                                                <div class="row">
                                                    <p>{{ $label }}</p>
                                                </div>
                                            @endforeach
                                        </div>
                                    @empty
                                        <img src="{{ asset('images/placeholder.png') }}">
                                    @endforelse
                                </div>
                            @else
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="https://picsum.photos/200" class="d-block w-50 img-fluid p-3 rounded"
                                            alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="https://picsum.photos/200" class="d-block w-50 img-fluid p-3 rounded"
                                            alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="https://picsum.photos/200" class="d-block w-50 img-fluid p-3 rounded"
                                            alt="...">
                                    </div>
                                </div>
                            @endif
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
                        <h5 class="card-title f1">Titolo: {{ $announcement_to_check->title }}</h5>
                        <p class="card-text f1">Descrizione: {{ $announcement_to_check->body }}</p>
                        <p class="card-footer f2">Pubblicato il:
                            {{ $announcement_to_check->created_at->format('d/m/Y') }}
                        </p>
                        <p class="card-footer f2">Autore: {{ $announcement_to_check->user->name ?? '' }} </p>
                        <div class="ps-5">
                            <form class="d-inline"
                                action="{{ route('revisor.accept_announcement', ['announcement' => $announcement_to_check]) }}"
                                method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn_custom  btn text-light">Accetta</button>
                            </form>
                            <form class="d-inline"
                                action="{{ route('revisor.reject_announcement', ['announcement' => $announcement_to_check]) }}"
                                method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn_custom btn text-light">Rifiuta</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    @endif

</x-layout>
