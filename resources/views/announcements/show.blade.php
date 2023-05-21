<x-layout>

    <div class=" img-review py-4 mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 me-5 ">
                <div class="product-imgs img-preview-det">
                    <div class="img-display">
                        <div class="img-showcase">
                            @forelse($announcement->images as $image)
                                <img class="detailimg" src="{{ $image->getUrl(400, 300) }}">

                            @empty
                                <img class="detailimg w-75 ps-5" src={{ asset('images/placeholder.png') }}>
                            @endforelse
                        </div>
                    </div>
                    <div class="img-select">
                        @forelse($announcement->images as $i=>$image)
                            @if (count($announcement->images) > 1)
                                <div class="img-item">
                                    <a href="#" data-id="{{ $i + 1 }}">
                                        <img class="detailimg" src="{{ $image->getUrl(400, 300) }}">
                                    </a>
                                </div>
                            @endif
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="product-content">
                    <h2 class="f1 product-title">{{ $announcement->title }}</h2>
                    <a
                        href="{{ route('categoryShow', ['category' => $announcement->category]) }}"class="product-link f1">{{ $announcement->category->name }}</a>
                    <div class="f2">Pubblicato il {{ $announcement->created_at->format('d/m/Y') }}</div>
                    <div class="f2"><span>Creato da
                            {{ $announcement->user->name ?? '' }}</span>
                    </div>

                    <div class="product-price f1">
                        <p class="price"><span>{{ $announcement->price }} €</span></p>
                    </div>

                    <div class="product-detail mb-5 f2">
                        <p>
                            {{ $announcement->body }}
                        </p>

                    </div>

                    <div class="purchase-info">
                        <input type="number" min="0" value="1">
                        <button type="button" class="btn">
                            Acquista <i class="fas fa-shopping-cart"></i>
                        </button>
                        <div>
                            <p class="text-secondary pt-3">Consegna senza costi aggiuntivi</p>
                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>



</x-layout>
