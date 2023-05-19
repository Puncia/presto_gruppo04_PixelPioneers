<x-layout>

    <div class="container-fluid">
        <h1 class="text-center border-bottom f1 py-2 mt-5">Tutti gli annunci</h1>
        <div class="row d-flex">
            @forelse ($announcements as $announcement)
                @if (@isset($announcement->is_accepted))
                    <div class="col-12 col-md-3 my-5 d-flex justify-content-center">
                        <div class="cardbordo col-12 col-md-4 card shadow" style="width: 18rem;">

                            {{-- inizio carosello --}}

                            <div id="carouselExample" class="carousel slide">
                                <div class="carousel-inner">
                                    @forelse ($announcement->images as $image)
                                        <div class="carousel-item @if ($loop->first) active @endif">
                                            <img src="{{ !$image->get()->isEmpty() ? $image->getUrl(400, 300) : asset('images/placeholder.png') }}"
                                                class="cardcustom immagine">
                                        </div>
                                    @empty
                                        <img src="{{ asset('images/placeholder.png') }}">
                                    @endforelse
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
                            <h5 class="card-title f2 fw-bold fs-3 px-3 pt-2">
                                {{ $announcement->title }}</h5>
                            <p class="card-text f1 px-3 fs-5 pt-2"> {{ $announcement->body }}</p>

                            <p class=" ps-3 f2 pt-2">Creato da
                                {{ $announcement->user->name ?? '' }} </p>
                            <p class=" ps-3 text-secondary mt-3 f2">
                                {{ $announcement->created_at->format('l d/m/Y') }}
                            </p>
                        </div>
                    </div>
                @endif
            @empty
                <div class="col-12">
                    <div class="alert alert-warning py-3 shadow">
                        <p class="lead"> Non ci sono annunci per questa ricerca. Prova a cambiarla!</p>
                    </div>
                </div>
            @endforelse
            {{ $announcements->links() }}
        </div>
    </div>

</x-layout>
