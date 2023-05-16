<x-layout>
    <div class="container">
        <div class="row">
            @if ($announcement->is_accepted != null)
                <div class="col-6 col-md-4 my-2">
                    <div class="card shadow" style="width: 18rem;">
                        <img src="https://picsum.photos/200" class="card-img-top p-3 rounded">
                        <div class="card-body">
                            <h5 class="card-title">{{ $announcement->title }}</h5>
                            <p class="card-text">{{ $announcement->body }}</p>
                            <p class="card-text">{{ $announcement->price }}</p>
                            <p class="card-footer my-2">Pubblicato il: {{ $announcement->created_at->format('d/m/Y') }}
                                Autore: {{ $announcement->user->name }}</p>
                            <a href="{{ route('categoryShow', ['category' => $announcement->category]) }}">Categoria:
                                {{ $announcement->category->name }}</a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-layout>
