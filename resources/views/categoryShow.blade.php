<x-layout>
    <div class="col-8 col-md-12 container-fluid  justify-content-center">
        <div class="row">
            <div class="row text-center m-auto mt-5 ">
                <h1 class="fs-1 f1 d-flex justify-content-center">{{ $category->name }}</h1>
            </div>
            <div class="row  m-auto">
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
                                        {{ trim(substr($announcement->body, 0, 30)) . '...' }}
                                    </p>
                                    <div class=" my-auto price-review">
                                        <span class="ps-3 f2 align-self-center">€
                                            {{ $announcement->price }} </span>
                                    </div>
                                    <p class="created-by ps-3 f2 text-secondary pt-2">Creato da
                                        {{ $announcement->user->name }} il
                                        {{ $announcement->created_at->format(' d/m/Y') }}</p>

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
                        <p class="h1">Non sono presenti annunci per questa categoria</p>
                        <p class="h2">Pubblicane uno: <a href="{{ route('announcements.create') }}"
                                class="btn btn-success shadow">Nuovo Annuncio</a></p>
                    </div>
                @endforelse
            </div>
            {{ $announcements->links() }}
        </div>
    </div>
</x-layout>
