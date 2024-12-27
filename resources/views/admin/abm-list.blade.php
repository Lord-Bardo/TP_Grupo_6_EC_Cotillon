@include('header-user')

<main class="container flex-grow-1" style="margin-top: 100px;">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('warning'))
        <div class="alert alert-warning">
            {{ session('warning') }}
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="titulo-productos">Administración de Productos y Categorías</h1>
    </div>

    <div class="row">
        <!-- Sección de Productos -->
        <div class="col-md-6 mb-4">
            <div class="card pastel-card">
                <div class="card-header pastel-header">
                    <h4>Productos</h4>
                </div>
                <div class="card-body">
                    <p>Gestiona los productos disponibles en tu tienda.</p>
                    <a href="{{ route('admin.productos') }}" class="btn pastel-btn">
                        Ver ABM Productos
                    </a>
                </div>
            </div>
        </div>

        <!-- Sección de Categorías -->
        <div class="col-md-6 mb-4">
            <div class="card pastel-card">
                <div class="card-header pastel-header">
                    <h4>Categorías</h4>
                </div>
                <div class="card-body">
                    <p>Gestiona las categorías de los productos en tu tienda.</p>
                    <a href="{{ route('admin.categorias') }}" class="btn pastel-btn">
                        Ver ABM Categorías
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>

@include('footer')

<style>

    .pastel-header {
        background-color: #a2cadf; /* Rosa pastel más intenso para el encabezado */
        color: #fff; /* Blanco para el texto */
    }

    .pastel-btn {
        background-color: #a2cadf; /* Rosa pastel para el botón */
        color: #fff; /* Blanco para el texto del botón */
        border: none;
    }

    .pastel-btn:hover {
        background-color: #eec8d1; /* Rosa pastel más oscuro en hover */
        transition: background-color 0.3s ease;
    }

</style>

