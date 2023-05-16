    <div class="container-fluid m-5">
        <div class="row">
            <div class="col-6">
                <h1 class="text-center f1"> Crea il tuo annuncio</h1>
                <div class="row justify-content-center">
                    <div class="col-8">

                        <!-- @if ($errors->any())
<div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
                </ul>
            </div>
        @endif -->

                        @if (session()->has('message'))
                            <div class="class-flex flex-row justify-center my-2 alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif

                        <form wire:submit.prevent="store">
                            @csrf
                            <div class="mb-3">
                                <label for="title">Titolo Annuncio</label>
                                <input wire:model="title" type="text"
                                    class="mb-3 form-control @error('title') is-invalid @enderror">
                                <div class="text-danger">
                                    @error('title')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="title">Descrizione</label>
                                <input wire:model="body" type="text"
                                    class="mb-3 form-control @error('title') is-invalid @enderror">
                                <div class="text-danger">
                                    @error('body')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="title">Prezzo</label>
                                <input wire:model="price" type="text"
                                    class="mb-3 form-control @error('title') is-invalid @enderror">
                                <div class="text-danger">
                                    @error('price')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="category">Categoria</label>
                                <select wire:model.defer="category" id="category" class="mb-3 form-control">
                                    <option value="">Scegli la categoria</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <input wire:model="temporary_images" name="images" multiple class="form-control shadow @error('temporary_images.*') file non valido @enderror"  type="file" placeholder="img"/>
                                @error('temporary_images.*')
                                <p class="text-danger mt-2">{{$message}}</p>
                                @enderror
                              </div>
                              @if (!empty($images))
                                <div class="row">
                                    <div class="col-12">
                                        <p>photo preview</p>
                                        <div class="row border border-4 border-info rounded shadow py-4">
                                            @foreach ($images as $key => $image)
                                            <div class="col my-3">
                                                <div class="img-preview mx-auto shadow rounded" style="background-image: url({{$image->temporaryUrl()}});"></div>
                                                <button type="button" class="btn btn-danger shadow d-block text-center mt-2 mx-auto" wire:click="removeImage({{$key}})">Cancella</button>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                @endif
                            <button type="submit" class="btn_custom btn text-light">Crea</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
