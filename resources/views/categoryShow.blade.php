<x-layout>
    <div class="col-12">
        <div class="row">
            <div class="row text-center m-5">
                <h1 class="fs-1 f1 ">{{ $category->name }}</h1>
            </div>
            @forelse ($announcements as $announcement)
                @if (@isset($announcement->is_accepted))
                    <div class="col-6 col-md-4 my-2">
                        <div class="card shadow" style="width: 18rem;">
                            <img src="{{ !$announcement->images()->get()->isEmpty()? $announcement->images()->first()->getUrl(400, 300): asset('images/placeholder.png') }}"
                                class="cardcustom immagine">
                            <div class="card-body">
                                <h5 class="card-title">{{ $announcement->title }}</h5>
                                <p class="card-text">{{ $announcement->body }}</p>
                                <a href="{{ route('announcements.show', compact('announcement')) }}"
                                    class="btn btn-primary shadow">Visualizza</a>
                                <p class="card-footer my-2">Pubblicato il:
                                    {{ $announcement->created_at->format('d/m/Y') }}
                                    Autore: {{ $announcement->user->name ?? '' }}</p>
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
    </div>
</x-layout>
