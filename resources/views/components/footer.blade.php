<div class="container-fluid justify-content-between tot text-light" id="nav">
    {{-- DX --}}
    <div class="row py-2">
        <div class="col-12 col-md-4 text-center">
            <div class="f1 pt-3">
                <p>About us:</p>
            </div>
            <div class="pt-0 m-0 f1">
                <p>{{__('ui.Tel.')}}: 070/23565566</p>
                <p>Email: presto.it@email.com</p>
                <p>Pt.iva: 4566566</p>
            </div>
        </div>
        {{-- CENTRO --}}
        <div class="col-12 col-md-4">
            <div class="d-flex flex-column text-center">
                <div class="p-1 f1">
                    <img src="{{ asset('images/logo.png') }}" width="auto" height="50" alt="">
                </div>
                <div class="pt-2 m-0 f1">
                    <p>{{__('ui.LVN')}}</p>
                </div>
                <div class="pt-0 m-0 f1">
                    <p>{{__('ui.RegOra')}}</p>
                </div>

                <a href="{{ route('become.revisor') }}"class="f1 text-decoration-none text-light pb-4 mb-1">{{__('ui.buttom')}}</a>
            </div>
            <div class="f1 fs-6 text-center pb-2">© 2023 Presto.it - {{__('ui.Privacy')}}</div>
        </div>
        {{-- SX --}}
        <div class="col-12 col-md-4">
            <h2 class="f1 text-center fs-4">
                <img width="35" height="35" src="https://img.icons8.com/flat-round/64/question-mark.png"
                    alt="question-mark" />
                {{__('ui.F&C')}}
            </h2>
            <div class="text-center border-bottom py-2 mb-2">
                <img width="48" height="48" src="https://img.icons8.com/fluency/48/facebook.png"
                    alt="facebook" />
                <img width="48" height="48" src="https://img.icons8.com/color/48/whatsapp--v1.png"
                    alt="whatsapp--v1" />
                <img width="48" height="48" src="https://img.icons8.com/plasticine/100/twitter.png"
                    alt="twitter" />
                <img width="48" height="48" src="https://img.icons8.com/fluency/48/instagram-new.png"
                    alt="instagram-new" />
            </div>
            <div class="">
                <h3 class="f1 text-center fs-4">
                    {{ __('ui.Pay') }}
                </h3>
                <div class="text-center border-bottom py-2 mb-2">
                    <img width="48" height="48" src="https://img.icons8.com/office/40/mastercard.png"
                        alt="mastercard" />
                    <img width="48" height="48" src="https://img.icons8.com/officel/40/visa.png"
                        alt="visa" />



                </div>

            </div>
        </div>
    </div>
</div>
