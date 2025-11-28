<x-layouts.principal titulo="Servicios" url="{{ asset('estilo/inicio.css') }}">
    <link rel="stylesheet"
        href="{{ asset('estilo/servicio.css') }}?v={{ filemtime(public_path('estilo/servicio.css')) }}">

    <div class="principal">
        <!-- Header de la página -->
        <div class="servicios-header">
            <h1 class="titulo-servicios">Nuestros Servicios</h1>
            <p class="subtitulo-servicios">¿Necesitas diferenciarte e impresionar con tu marca o emprendimiento?</p>
        </div>

        <div class="servicios-banner">
            <img src="{{ asset('img/banners/vistazo.webp') }}" alt="Nuestros servicios" loading="lazy">
        </div>

        <div class="servicios-container">
            @forelse($servicios as $servicio)
                <div class="servicio-item">
                    <div class="servicio-imagen">
                        <img src="{{ asset('storage/' . $servicio->imagen) }}" alt="{{ $servicio->nombre }}"
                            loading="lazy">
                    </div>
                    <div class="servicio-info">
                        <h4>{{ $servicio->nombre }}</h4>
                        <p>{{ $servicio->descripcion }}</p>
                        <div class="servicio-acciones">
                            <a href="{{ route('portfolio') }}">
                                <button class="btn-mas-info" onclick="mostrarDetalle({{ $servicio->id }})">
                                    Más Información
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="no-servicios">
                    <div class="icono-vacio">📋</div>
                    <p>No hay servicios disponibles en este momento.</p>
                    <p class="texto-secundario">Estamos trabajando para ofrecerte los mejores servicios.</p>
                </div>
            @endforelse
        </div>

        <div class="informaciones">
            <div class="info">
                <a href="{{ route('portfolio') }}" class="portfolio">
                    <div>
                        <p>PORTFOLIO</p>
                    </div>
                </a>

                <a href="#" class="moreoinfo">
                    <div>
                        <p>MÁS INFORMACIÓN</p>
                    </div>
                </a>

            </div>
        </div>


    </div>

    @push('js')
    @endpush
</x-layouts.principal>
