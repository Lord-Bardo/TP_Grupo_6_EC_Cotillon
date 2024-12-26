@include('header-user')

<main class="container mt-5 flex-grow-1">

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
        <h1 class="titulo-productos">Administración de Productos</h1>
        <a href="{{ route('admin.productos.create') }}" class="btn pastel-success btn-sm">
            <i class="fas fa-plus"></i> Agregar Producto
        </a>
    </div>
    
        <table id="productosTable" class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Estado</th>
                    <th>Categoría</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                    <tr>
                        <td>{{ $producto->id_producto }}</td>
                        <td>{{ $producto->nombre_producto }}</td>
                        <td>{{ $producto->descripcion_producto }}</td>
                        <td>{{ $producto->precio }}</td>
                        <td>{{ $producto->stock }}</td>
                        <td>{{ $producto->estado ? 'Activo' : 'Inactivo' }}</td>
                        <td>{{ $producto->categoria->nombre_categoria }}</td>
                        <td>
                            <div class="d-flex flex-wrap gap-2">
                                <a href="{{ route('admin.productos.edit', $producto->id_producto) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.productos.destroy', $producto->id_producto) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    <div class="dropdown mb-3">
        <button class="btn pastel-warning dropdown-toggle" type="button" id="exportDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Exportar Listado
        </button>
        <div class="dropdown-menu" aria-labelledby="exportDropdown">
            <a class="dropdown-item" href="{{ route('admin.productos.export.csv') }}">
                <i class="fas fa-file-csv text-success"></i> Exportar como CSV
            </a>
            <a class="dropdown-item" href="{{ route('admin.productos.export.excel') }}">
                <i class="fas fa-file-excel text-success"></i> Exportar como XLS
            </a>
            <a class="dropdown-item" href="{{ route('admin.productos.export.pdf') }}">
                <i class="fas fa-file-pdf text-danger"></i> Exportar como PDF
            </a>
        </div>
    </div>
</main>

<!-- Estilos personalizados -->
<style>
    #productosTable td, #productosTable th {
        border: 1px solid #ddd; 
        padding: 12px; /* Espaciado dentro de las celdas */
        text-align: left; 
        max-width: 250px; 
        width: auto; 
    }

    .dataTables_filter {
        margin-bottom: 20px; 
    }

    .pastel-success {
        background-color: #8bd3f7 !important;
        color: #fff !important;
        font-size: 1rem;
        padding: 0.5rem 1rem;
        border: none;
    }

    .pastel-success:hover {
        background-color: #8cb3c7;
        color: #fff;
        transition: background-color 0.3s ease;
    }

    .pastel-warning {
        background-color: #f0cede !important;
        color: #333 !important;
        font-size: 1rem;
        padding: 0.5rem 1rem;
        border: none;
    }

    .pastel-warning:hover {
        background-color: #f0cede;
        color: #333;
        transition: background-color 0.3s ease;
    }

    #productosTable {
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }
    
</style>

@include('footer')

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#productosTable').DataTable({
            language: {
                url: "//cdn.datatables.net/plug-ins/1.13.5/i18n/es-ES.json"
            },
            pageLength: 10,
            responsive: true,
        });
    });
</script>
