<x-layout>
    <div class="card-wrapper">
        <div class="card">
            <!-- card left -->
            <div class="product-imgs">
                <div class="img-display">
                    <div class="img-showcase">
                        <img class="detailimg" src="https://picsum.photos/400/300" alt="product image">
                        <img class="detailimg" src="https://picsum.photos/400/300" alt="product image">
                        <img class="detailimg" src="https://picsum.photos/400/300" alt="product image">
                        <img class="detailimg" src="https://picsum.photos/400/300" alt="product image">
                    </div>
                </div>
                <div class="img-select">
                    <div class="img-item">
                        <a href="#" data-id="1">
                            <img class="detailimg" src="https://picsum.photos/400/300" alt="product image">
                        </a>
                    </div>
                    <div class="img-item">
                        <a href="#" data-id="2">
                            <img class="detailimg" src="https://picsum.photos/400/300" alt="product image">
                        </a>
                    </div>
                    <div class="img-item">
                        <a href="#" data-id="3">
                            <img class="detailimg" src="https://picsum.photos/400/300" alt="product image">
                        </a>
                    </div>
                    <div class="img-item">
                        <a href="#" data-id="4">
                            <img class="detailimg" src="https://picsum.photos/400/300" alt="product image">
                        </a>
                    </div>
                </div>
            </div>
            <!-- card right -->
            <div class="product-content">
                <h2 class="product-title f1">Titolo</h2>
                <a href="#" class="product-link f1">Categoria</a>
                <div class="f2">Pubblicato il </div>
                <div class="f2"><span>Creato da: </span></div>


                <div class="product-price f1">
                    <p class="price"> Prezzo <span>5€</span></p>
                </div>

                <div class="product-detail mb-5 f2">
                    <h2>Su questo articolo: </h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo eveniet veniam tempora fuga tenetur
                        placeat sapiente architecto illum soluta consequuntur, aspernatur quidem at sequi ipsa!</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, perferendis eius.
                        Dignissimos, labore suscipit. Unde.</p>
                    <ul class="pt-3">
                        <li>Area di consegna: <span>Tutto il mondo!</span></li>
                        <li>Costo di spedizione: <span>Gratis!</span></li>
                    </ul>
                </div>

                <div class="purchase-info">
                    <input type="number" min="0" value="1">
                    <button type="button" class="btn">
                        Acquista <i class="fas fa-shopping-cart"></i>
                    </button>
                    {{-- <button type="button" class="btn">Contatta il venditore</button> --}}
                </div>

                {{-- <div class="social-links mt-5">
                    <p>Condividi:</p>
                    <a href="#">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                    <a href="#">
                        <i class="fab fa-pinterest"></i>
                    </a>
                </div> --}}
            </div>
        </div>
    </div>
</x-layout>
