<x-layout>

    <div class="container-fluid">
        <h1 class="text-center border-bottom f1 py-2 mt-5">Tutti gli annunci</h1>
        <div class="row d-flex">
            @forelse ($announcements as $announcement)
                @if (@isset($announcement->is_accepted))
                    <div class="col-12 col-md-3 my-5 d-flex justify-content-center">
                        <div class="cardbordo col-12 col-md-4 card shadow" style="width: 18rem;">
                            <div id="carouselExample" class="carousel slide">
                                @if (!$announcement->images()->get()->isEmpty())
                                    <div>
                                        <img src="{{ $announcement->images()->first()->getUrl(400, 300) }}"
                                            class="immagine rounded" />
                                    </div>
                                @else
                                    <div>
                                        <img src="{{ asset('images/placeholder.png') }}" class="immagine rounded" />
                                    </div>
                                @endif

                                <h5 class="card-title fs-5 px-3 pt-2">
                                    {{ $announcement->title }}</h5>
                                <p class="card-text f1 px-3 fs-6 pt-2">
                                    {{ strlen($announcement->body) > 30 ? trim(substr($announcement->body, 0, 30)) . '...' : $announcement->body }}
                                </p>
                                <div class=" my-auto price-review">
                                    <span class="ps-3 f2 align-self-center">€
                                        {{ $announcement->price }} </span>
                                </div>
                                <div class="pt-2">
                                    <a href="{{ route('categoryShow', ['category' => $announcement->category]) }}"
                                        class="text-secondary text-decoration-none card-text f1 px-3 fs-6 pt-2">
                                        {{ $announcement->category->name }} <i class="bi bi-box-arrow-up-right"></i>
                                    </a>
                                </div>
                                <p class="created-by ps-3 f2 text-secondary pt-2">Creato da
                                    {{ $announcement->user->name }} il
                                    {{ $announcement->created_at->format('d/m/Y') }}</p>

                                <div class="pb-3">
                                    <a href="{{ route('announcements.show', compact('announcement')) }}"
                                        class="justify-content btncard text-light pb-2">{{ __('ui.Show') }}</a>
                                </div>
                            </div>
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
