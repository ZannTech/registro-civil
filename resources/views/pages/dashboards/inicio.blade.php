<x-default-layout>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/@mdi/font@6.9.96/css/materialdesignicons.min.css">
    <div class="row mt-4">
        <div class="col-lg-12 mt-4">
            <div class="card shadow-xl">
                <img class="card-img-top" src="{{image('OIP.jpg')}}" alt="">
                <div class="card-body">
                    <h4 class="card-title">Sistema de registro civil</h4>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mt-4">
            <div class="card shadow-xl">
                <div class="card-body">
                    <h4 class="card-title">Difunciones</h4>
                    <p class="card-text">Módulo de difunciones</p>
                    <a href="/difuncion" type="button" class="btn btn-light-primary col-12"><i class="mdi mdi-login"></i> Acceder</a>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mt-4">
            <div class="card shadow-xl">
                <div class="card-body">
                    <h4 class="card-title">Matrimonios</h4>
                    <p class="card-text">Módulo de matrimonios</p>
                    <a href="/matrimonio" type="button" class="btn btn-light-primary col-12"><i class="mdi mdi-login"></i> Acceder</a>
                </div>
            </div>
        </div>

        <div class="col-lg-8 offset-lg-2 mt-4">
            <div class="card shadow-xl">
                <div class="card-body">
                    <h4 class="card-title">Actas de nacimiento</h4>
                    <p class="card-text">Módulo de nacimientos</p>
                    <a href="/nacimiento" type="button" class="btn btn-light-primary col-12"><i class="mdi mdi-login"></i> Acceder</a>
                </div>
            </div>
        </div>
    </div>
</x-default-layout>
