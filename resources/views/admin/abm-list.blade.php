@include('header-user')

<div class="container mt-5">
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
            <div class="card">
                <div class="card-header">
                    <h4>Productos</h4>
                </div>
                <div class="card-body">
                    <p>Gestiona los productos disponibles en tu tienda.</p>
                    <a href="{{ route('admin.productos') }}" class="btn btn-primary btn-sm">
                        Ver ABM Productos
                    </a>
                </div>
            </div>
        </div>

        <!-- Sección de Categorías -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h4>Categorías</h4>
                </div>
                <div class="card-body">
                    <p>Gestiona las categorías de los productos en tu tienda.</p>
                    <a href="{{ route('admin.categorias') }}" class="btn btn-primary btn-sm">
                        Ver ABM Categorías
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>

@include('footer')
