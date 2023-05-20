<x-layout>
    <div class="container-fluid my-5">
        <h1 class="border-bottom text-center">
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
        @forelse($announcement_to_check->images as $i=>$image)
            <div class="row justify-content-center">
                <div class="col-8">
                    <div class="row justify-content-between img-review">
                        <div class="col-5">
                            <div class="col-8">
                                <h5 class="text-secondary">Immagine {{ $i + 1 }}</h2>
                            </div>
                            <img src="{{ !$image->get()->isEmpty() ? $image->getUrl(400, 300) : asset('images/placeholder.png') }}"
                                class="cardcustom immagine my-2">
                        </div>
                        <div class="col-md-3 text-center">
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
                        {{-- Labels --}}
                        <div class="col-md-3 text-center">
                            <h5 class="tc-accent border-bottom border-2 pb-1 text-center">Google labels</h5>
                            @for ($i = 0; $i < 4; $i++)
                                <p class="rounded-5 googleLabels text-center ">{{ $image->labels[$i] }}</p>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        @empty
        @endforelse
        <div class="d-flex justify-content-end my-3 py-3">
            bottone accetta
            <form action="{{ route('revisor.accept_announcement', ['announcement' => $announcement_to_check]) }}"
                method="POST">
                @csrf
                @method('PATCH')
                <button class="btn_custom btn text-light" type="submit">Accetta</button>
            </form>
            bottone rifiuta
            <form action="{{ route('revisor.reject_announcement', ['announcement' => $announcement_to_check]) }}"
                method="POST">
                @csrf
                @method('PATCH')
                <button class="btn_custom btn text-light mx-5" type="submit">Rifiuta</button>
            </form>
        </div>
    @endif
    </div>
</x-layout>
