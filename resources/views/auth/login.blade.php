<x-layout>

    <div class="container m-5">

        <div class="row">
            <div class="col-6">
                <h1>Sei su Presto.it</h1>
                    <p>Welcome back! Log in to your account:</p>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                <form method='POST' action={{ route('login') }}>
                    @csrf
                    <div class="mb-3">
                        <img src="https://img.icons8.com/color/48/null/new-post.png"/>
                        <label for="exampleInputPassword1" class="form-label">Email</label>
                     
                        <input type="email" class="form-control" id="exampleInputPassword1" name="email">
                 

                </div>
            <div class="mb-3">
                <img src="https://img.icons8.com/external-others-inmotus-design/67/null/external-Lock-round-icons-others-inmotus-design.png"/>
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            </div>


            <button type="submit" class="btn_custom btn text-center">Log in</button>
            </form>
        </div>
    </div>

 

</x-layout>
