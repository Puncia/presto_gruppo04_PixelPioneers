<x-layout>

    <div class="container-fluid">
        <h1 class="text-center border-bottom f1 py-2 mt-5">Tutti gli annunci</h1>
        <div class="col-12 d-flex">
            <div class="row d-flex justify-content-evenly">
                @forelse ($announcements as $announcement)
                    @if (@isset($announcement->is_accepted))
                        <div class="col-12 col-md-4 my-5 d-flex justify-content-center">
                            <div class="card shadow" style="width: 18rem;">
                                <img src="{{ !$announcement->images()->get()->isEmpty()? $announcement->images()->first()->getUrl(400, 300): asset('images/placeholder.png') }}"
                                    class="cardcustom immagine">
                                <div class="card-body">
                                    <h5 class="card-title f2 text-center fw-bold">{{ $announcement->title }}</h5>
                                    <p class="card-text fs-5">{{ $announcement->body }}</p>
                                    <p class="card-text">{{ $announcement->price }} €</p>
                                    <a href="{{ route('announcements.show', compact('announcement')) }}"
                                        class="btnindex">Visualizza</a>
                                    <p class="card-footer my-2">
                                        {{ $announcement->created_at->format('l d/m/Y') }}
                                        Creato da {{ $announcement->user->name ?? '' }}</p>


                                    <a href="{{ route('categoryShow', ['category' => $announcement->category]) }}"
                                        class="d-flex align-items-center text-decoration-none text-secondary">
                                        <span>{{ $announcement->category->name }}</span>
                                        <i class="bi bi-box-arrow-in-up-right ml-2"></i>
                                    </a>
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
    </div>

</x-layout>
