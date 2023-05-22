<x-layout>

    <div class="container-fluid my-5 text-center">
        <h1 class="border-bottom">
            {{ $announcement_to_check ? 'Revisione annunci' : 'Non ci sono annunci da revisionare' }}
        </h1>
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
    {{-- Annunci da revisionare --}}
    @if ($announcement_to_check)
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8 offset-md-2">
                    <div class="presto-card">
                        <div class="presto-card-header">
                            <h5>Dettagli Prodotto</h5>
                        </div>
                        <div class="presto-card-body">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-8">
                                    <h6 class="presto-card-title">{{ $announcement_to_check->title }}</h6>
                                    <p class="presto-card-text">{{ $announcement_to_check->body }}</p>
                                    <ul class="presto-list-unstyled">
                                        <li><strong>Prezzo:</strong> {{ $announcement_to_check->price }}</li>
                                        <li><strong>Creato il:</strong> {{ $announcement_to_check->created_at }}</li>
                                        <li><strong>Categoria:</strong>
                                            {{ $announcement_to_check->category->getCategoryLocale() }}</li>
                                    </ul>
                                </div>
                                <div class="col-lg-4 col-md-4 col-4 text-center">
                                    <div class="row">
                                        <img src="{{ asset('images/user-placeholder.jpg') }}"
                                            class="presto-user-img mx-auto">
                                        <p>{{ $announcement_to_check->user->name }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @forelse($announcement_to_check->images as $i=>$image)
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-8 offset-md-2">
                        <div class="presto-card ">
                            <h5 class="presto-card-header-img">Immagine {{ $i + 1 }}</h5>
                            <div class="presto-card-body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-12">
                                        <img src="{{ !$image->get()->isEmpty() ? $image->getUrl(400, 300) : asset('images/placeholder.png') }}"
                                            class="cardcustom immagine my-2">
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-6 text-center">
                                        <h5 class="tc-accent border-bottom border-2 pb-1">Google ratings</h5>
                                        <p class="rounded-5 googleRatingField d-flex">
                                            <span class="{{ $image->adult }} align-self-center ms-2"></span>
                                            <span class="mx-auto">18+</span>
                                        </p>
                                        <p class="rounded-5 googleRatingField d-flex">
                                            <span class="{{ $image->spoof }} align-self-center ms-2"></span>
                                            <span class="mx-auto">Satira</span>
                                        </p>
                                        <p class="rounded-5 googleRatingField d-flex">
                                            <span class="{{ $image->medical }} align-self-center ms-2"></span>
                                            <span class="mx-auto">Medicina</span>
                                        </p>
                                        <p class="rounded-5 googleRatingField d-flex">
                                            <span class="{{ $image->violence }} align-self-center ms-2"></span>
                                            <span class="mx-auto">Immagini violente</span>
                                        </p>
                                        <p class="rounded-5 googleRatingField d-flex">
                                            <span class="{{ $image->racy }} align-self-center ms-2"></span>
                                            <span class="mx-auto">Razzismo</span>
                                        </p>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-6 text-center">
                                        <h5 class="tc-accent border-bottom border-2 pb-1 text-center">Google labels</h5>
                                        @if ($image->labels != null && count($image->labels) >= 5)
                                            @for ($i = 0; $i < 5; $i++)
                                                <p class="rounded-5 googleLabels text-center ">{{ $image->labels[$i] }}
                                                </p>
                                            @endfor
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class=" img-review">
                <div class="col-12 text-center">
                    Questo annuncio non ha immagini.
                </div>
            </div>
        @endforelse
        <div class="col-12">
            <div class="d-flex justify-content-center my-3 py-3">
                {{-- bottone accetta --}}
                <form action="{{ route('revisor.accept_announcement', ['announcement' => $announcement_to_check]) }}"
                    method="POST">
                    @csrf
                    @method('PATCH')
                    <button class="btn_custom btn text-light" type="submit"><svg xmlns="http://www.w3.org/2000/svg"
                            width="16" height="16" fill="currentColor" class="bi bi-check-lg"
                            viewBox="0 0 16 16">
                            <path
                                d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z" />
                        </svg>&nbsp;
                        Accetta</button>
                </form>
                {{-- bottone rifiuta --}}
                <form action="{{ route('revisor.reject_announcement', ['announcement' => $announcement_to_check]) }}"
                    method="POST">
                    @csrf
                    @method('PATCH')
                    <button class="btn_custom btn text-light mx-2" type="submit"><svg
                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-slash-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path d="M11.354 4.646a.5.5 0 0 0-.708 0l-6 6a.5.5 0 0 0 .708.708l6-6a.5.5 0 0 0 0-.708z" />
                        </svg>&nbsp;&nbsp;Rifiuta</button>
                </form>
            </div>
        </div>
    @endif
    </div>
    
</x-layout>
