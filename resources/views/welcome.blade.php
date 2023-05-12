<x-layout>

    @if (session()->has('access.denied'))
        <div class="bg-danger">
            {{ session()->get('access.denied') }}
        </div>
    @endif

    @if (session()->has('message'))
        <div class="class-flex flex-row justify-center my-2 alert alert-success">
            {{ session('message') }}
        </div>
    @endif

<div class="container">
    
    <div class="row text-center m-5">
<p class="border-bottom p-3">Cogli l'opportunità che hai sempre cercato!</p>
<h1 class="fs-1">Benvenuti nel nostro e-commerce</h1>
</div>
    <div class="col-12 vh-100">
        <div id="carouselExampleDark" class="carousel carousel-dark slide">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active" data-bs-interval="10000">
                <img src="https://media.discordapp.net/attachments/1076537573897408683/1106537980488851536/iphone.png?width=483&height=580" class="" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Iphone</h5>
                  <p>per ogni utente</p>
                </div>
              </div>
              <div class="carousel-item" data-bs-interval="2000">
                <img src="https://media.discordapp.net/attachments/1076537573897408683/1106537980937637948/cassabl.png?width=483&height=580" class="" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Sony</h5>
                  <p>Suono potente</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="https://media.discordapp.net/attachments/1076537573897408683/1106537980119756840/cuffie.png?width=483&height=580" class="" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Marshall</h5>
                  <p>Musica per le tue maratone per strada</p>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
</div>
</div>








    
    <div class="container-fluid ">
        <div class="row">
            @foreach ($announcements as $announcement)
                <div class="col-12 col-md-4 my-4">
                    <div class="card shadow" style="width: 18rem;">
                        <img src="https://picsum.photos/200/300?grayscale" class="card-img-top p-3 rounded">
                        <div class="card-body">
                            <h5 class="card-title">{{ $announcement->title }}</h5>
                            <p class="card-text">{{ $announcement->body }}</p>
                            <p class="card-text">{{ $announcement->price }}</p>
                            <a href="" class="btn btn-primary shadow">Visualizza</a>
                            <a href=""
                                class="my-2 border-top pt-2 border-dark card-link shadow btn btn-success">Categoria:
                                {{ $announcement->category->name }}</a>
                            <p class="card-footer">Pubblicato il:
                                {{ $announcement->created_at->format('d/m/Y H:m') }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
