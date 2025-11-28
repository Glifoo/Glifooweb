<x-layouts.principal titulo="Servicios" url="{{ asset('estilo/inicio.css') }}">
    <link rel="stylesheet"
        href="{{ asset('estilo/portfolio.css') }}?v={{ filemtime(public_path('estilo/portfolio.css')) }}">

    <div class="principal">
        <div class="servicios-banner">
            <div class="circulo">
                <p>Nuestros <br> Proyectos</p>
            </div>
        </div>
        <div class="titulo">
            <h2>Seleccione uno de nusetros proyectos</h2>
        </div>
        <div>
            <div id="listaServicios" class="proyecto">
                @foreach ($servicios as $servicio)
                    <div class="cajaImg" data-id="{{ $servicio->id }}">
                        <img src="{{ asset('storage/' . $servicio->avatar) }}" alt="{{ $servicio->nombre }}"
                            class="redondo">
                        <label>{{ $servicio->nombre }}</label>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="titulo">
            <h2>Nuestros proyectos realizados</h2>
        </div>
        <div class="portfolio">
            <ul class="acordeon" id="muestrAcordeon"></ul>
        </div>
    </div>


    @push('js')
        <script>
            window.serviciosData = @json($portfolio);
        </script>
        <script src="{{ asset('dinamico/portf.js') }}?v={{ filemtime(public_path('dinamico/portf.js')) }}"></script>
    @endpush
</x-layouts.principal>
