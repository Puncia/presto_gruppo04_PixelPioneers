<x-layout>
    <div class="container-fluid my-5">
        <div class="row justify-content-center ">
            <div class="col-12 col-md-6">


                <h1 class="text-center f1">Registrati</h1>
                <p class="text-center f2 text_shadow tx-sec">Crea il tuo account per iniziare ad acquistare</p>
                <div class="row justify-content-center">
                    <div class="col-8">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method='POST' action={{ route('register') }}>
                            @csrf
                            <div class="mb-3">
                                <img width="30" height="30" src="https://img.icons8.com/ios/50/username.png"> 
                                <label for="exampleInputEmail1" class="mb-3 form-label text_shadow">Username</label>
                                <input type="text" class="form-control shadow " id="exampleInputEmail1" name="name">

                            </div>
                            <div class="mb-3">
                                <img width="30" height="30"  src="https://img.icons8.com/ios/50/new-post--v1.png"/>
                                <label for="exampleInputPassword1" class="mb-3 form-label text_shadow">Email</label>
                                <input type="email" class="form-control shadow" id="exampleInputPassword1" name="email">
                            </div>

                            <div class="mb-3">
                                <img width="30" height="30"  src="https://img.icons8.com/ios/50/password--v1.png" alt=""/>
                                <label for="exampleInputPassword1" class="mb-3 form-label text_shadow">Password</label>
                                <input type="password" class="form-control shadow" id="exampleInputPassword1" name="password">
                            </div>


                            <div class="mb-3">
                                <img width="30" height="30" src="https://img.icons8.com/small/64/good-pincode.png" alt="good-pincode"/>
                                <label for="exampleInputPassword1" class="mb-3 form-label text_shadow">Conferma password</label>
                                <input type="password" class="form-control shadow" id="exampleInputPassword1"
                                    name="password_confirmation">
                            </div>

                            <button type="submit" class="btn_custom btn text-light shadow text_shadow">Registrati</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
