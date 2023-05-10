<x-layout>
    <div class="container m-5">
        <div class="row">
            <div class="col-6">

          
            <h1>Registrati</h1>
    
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
                    <label for="exampleInputEmail1" class="form-label">Username</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="name">

                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Email</label>
                    <input type="email" class="form-control" id="exampleInputPassword1" name="email">
                </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
        </div>

   
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Conferma password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="password_confirmation">
    </div>

    <button type="submit" class="btn_custom btn text-light">Registrati</button>
    </form>

    </div>
    </div>
</div>

</x-layout>
