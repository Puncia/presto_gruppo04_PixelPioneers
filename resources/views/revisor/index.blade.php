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



    <div class="container-fluid ">
        <div class="row d-flex justify-content-center">
            @if ($announcement_to_check)
                @forelse($announcement_to_check->images as $image)
                    <div class="col-4">
                        <img src="{{ !$image->get()->isEmpty() ? $image->getUrl(400, 300) : asset('images/placeholder.png') }}"
                            class="cardcustom immagine">
                    </div>
                    <div class="col-md-4 my-0 text-center">
                        <h5 class="tc-accent border-bottom border-2 text-center">Immagine</h5>
                        <p class="rounded-5 googleRatingField text-center d-flex align-items-center">
                            <span class="{{ $image->adult }} align-self-center"></span> <span class="mx-auto">18+</span>
                        </p>
                        <p class="rounded-5 googleRatingField text-center d-flex align-items-center">
                            <span class="{{ $image->spoof }} align-self-center"></span> <span
                                class="mx-auto">Satira</span>
                        </p>
                        <p class="rounded-5 googleRatingField text-center d-flex align-items-center">
                            <span class="{{ $image->medical }} align-self-center"></span> <span
                                class="mx-auto">Medicina</span>
                        </p>
                        <p class="rounded-5 googleRatingField text-center d-flex align-items-center">
                            <span class="{{ $image->violence }} align-self-center"></span> <span
                                class="mx-auto">Immagini
                                violente</span>
                        </p>
                        <p class="rounded-5 googleRatingField text-center d-flex align-items-center">
                            <span class="{{ $image->racy }} align-self-center "></span> <span class="mx-auto">
                                Razzismo</span>
                        </p>

                    </div>
                    <div class="col-4">
                        <h5 class="tc-accent border-bottom border-2 text-center">Labels</h5>
                        @for ($i = 0; $i < 4; $i++)
                            <p class="rounded-5 googleLabels">{{ $image->labels[$i] }}</p>
                        @endfor
                    </div>
                @empty
                @endforelse
            @endif
        </div>
    </div>

</x-layout>
