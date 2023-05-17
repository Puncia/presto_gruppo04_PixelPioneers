<x-layout>
    <div class="container-fluid">
        <div class="col-12 d-flex">
            <div class="row d-flex justify-content-evenly">
                @forelse ($announcements as $announcement)
                    @if (@isset($announcement->is_accepted))
                        <div class="col-12 col-md-4 my-5 d-flex justify-content-center">
                            <div class="card shadow" style="width: 18rem;">
                                <img src="{{!$announcement->images()->get()->isEmpty() ? Storage::url($announcement->images()->first()->path) : 'https://picsum.photos/200'}}" class="card-img-top p-3 rounded">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $announcement->title }}</h5>
                                    <p class="card-text">{{ $announcement->body }}</p>
                                    <p class="card-text">{{ $announcement->price }}</p>
                                    <a href="{{ route('announcements.show', compact('announcement')) }}"
                                        class="btn_custom btn text-light">Visualizza</a>
                                    <p class="card-footer my-2">Pubblicato il:
                                        {{ $announcement->created_at->format('d/m/Y') }}
                                        Autore: {{$announcement->user->name ?? '' }}</p>
                                    <a href="{{ route('categoryShow', ['category' => $announcement->category]) }}">Categoria:
                                        {{ $announcement->category->name }}</a>
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
