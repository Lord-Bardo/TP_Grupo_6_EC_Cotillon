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
        <h1 class="titulo-productos">Administración de Productos</h1>

        <a href="{{ route('admin.productos.create') }}" class="btn btn-success btn-sm">
            <i class="fas fa-plus"></i> Agregar Producto
        </a>
    </div>

    <table class="table table-bordered table-hover">
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
                    <td>{{ $producto->categoria->nombre_categoria }}</td> <!-- Mostrar categoría -->
                    <td>
                        <a href="{{ route('admin.productos.edit', $producto->id_producto) }}"  class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.productos.destroy', $producto->id_producto) }}" method="POST" style="display: inline-block;">
                            @csrf <!-- Token de seguridad -->
                            @method('DELETE') <!-- Uso el metodo DELETE, ya que el HTML solo admite GET/POST -->
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="dropdown mb-3">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="exportDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Exportar Listado
        </button>
        <div class="dropdown-menu" aria-labelledby="exportDropdown">
            <a class="dropdown-item" href="#">
                <i class="fas fa-file-csv text-success"></i> Exportar como CSV
            </a>
            <a class="dropdown-item" href="#">
                <i class="fas fa-file-excel text-success"></i> Exportar como XLS
            </a>
            <a class="dropdown-item" href="#">
                <i class="fas fa-file-pdf text-danger"></i> Exportar como PDF
            </a>
        </div>
    </div>

</div>

<input type="file" />

@include('footer')

