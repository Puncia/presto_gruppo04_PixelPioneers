<x-layout>
    <div class="class col-8 ">
        <div class="row">
            @foreach ($announcements as $announcement)
                <div class="class col-12 col-md-4 my-4">
                    <div class="card shadow" style="width: 18rem;">
                        <img src="https://picsum.photos/200" class="card-img-top p-3 rounded">
                        <div class="card-body">
                            <h5 class="card-title">{{ $announcement->title }}</h5>
                            <p class="card-text">{{ $announcement->body }}</p>
                            <p class="card-text">{{ $announcement->price }}</p>
                            <a href="{{ route('announcements.show', compact('announcement')) }}"
                                class="btn btn-primary shadow">Visualizza</a>
                            <p class="card-footer my-2">Pubblicato il: {{ $announcement->created_at->format('d/m/Y') }}
                                Autore: {{ $announcement->user->name ?? '' }}</p>
                            <a href="{{ route('categoryShow', ['category' => $announcement->category]) }}">Categoria:
                                {{ $announcement->category->name }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
            {{ $announcements->links() }}
        </div>
    </div>
</x-layout>
