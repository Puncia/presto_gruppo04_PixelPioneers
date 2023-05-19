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
        <div class="container mb-5 d-flex">
            <div class="row">
                <div class="col-6 d-inline d-flex">
                    <div class="cardbordo col-12 col-md-4 card shadow" style="width: 18rem;">

                        {{-- inizio carosello --}}

                        <div id="carouselExample" class="carousel slide">
                            <div class="carousel-inner">
                                @forelse ($announcement_to_check->images as $image)
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
                        <h5 class="card-title f2 fw-bold fs-3 px-3 pt-2">{{ $announcement_to_check->title }}</h5>
                        <p class="card-text f1 px-3 fs-5 pt-2"> {{ $announcement_to_check->body }}</p>
                    
                        <p class=" ps-3 f2 pt-2">Creato da {{ $announcement_to_check->user->name ?? '' }} </p>
                        <p class=" ps-3 text-secondary mt-3 f2">
                            {{ $announcement_to_check->created_at->format('l d/m/Y') }}
                        </p> 
                        <div class="pt-2 ps-4 d-flex">

                            <form class="d-inline"
                                action="{{ route('revisor.accept_announcement', ['announcement' => $announcement_to_check]) }}"
                                method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn_custom  btn text-light">Accetta</button>
                            </form>
                            <form class="ms-3 d-inline"
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
            @forelse ($announcement_to_check->images as $index=>$image)
                <div class="text-center col-2 col-md-2 mx-5">
                    <div class="row my-1">
                        <h5 class="tc-accent border-bottom border-2 text-center">Immagine {{ $index + 1 }}</h5>
                        <p class="rounded-5 googleRatingField text-center d-flex align-items-center"> <span class="{{ $image->adult }} align-self-center"></span> <span class="mx-auto">18+</span></p>
                        <p class="rounded-5 googleRatingField text-center d-flex align-items-center"><span class="{{ $image->spoof }} align-self-center"></span> <span class="mx-auto">Satira</span></p>
                        <p class="rounded-5 googleRatingField text-center d-flex align-items-center"><span class="{{ $image->medical }} align-self-center"></span> <span class="mx-auto">Medicina</span></p>
                        <p class="rounded-5 googleRatingField text-center d-flex align-items-center"><span class="{{ $image->violence }} align-self-center"></span> <span class="mx-auto">Immagini violente</span>
                        </p>
                        <p class="rounded-5 googleRatingField text-center d-flex align-items-center"><span class="{{ $image->racy }} align-self-center "></span> <span class="mx-auto"> Razzismo</span></p>
                        <div class=" row my-1 text-center">
                            <h5 class="tc-accent border-bottom border-2 text-center">Labels</h5>
                            @for ($i = 0; $i < 4; $i++)
                                <p class="rounded-5 googleLabels">{{ $image->labels[$i] }}</p>
                            @endfor
                        </div> 
                    </div> 
                </div>
            @empty
            @endforelse

        </div>
    @endif

</x-layout>
