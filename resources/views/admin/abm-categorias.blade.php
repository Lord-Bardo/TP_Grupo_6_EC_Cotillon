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
        <h1 class="titulo-categoria">Administración de Categorías</h1>
        
        <a href="{{ route('admin.categorias.create') }}" class="btn pastel-success btn-sm">
            <i class="fas fa-plus"></i> Agregar Categoría
        </a>
    </div>

    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->id_categoria }}</td>
                    <td>{{ $categoria->nombre_categoria }}</td>
                    <td>{{ $categoria->descripcion_categoria }}</td>
                    <td>
                        <div class="d-flex flex-wrap gap-2">
                            <a href="{{ route('admin.categorias.edit', $categoria->id_categoria) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.categorias.destroy', $categoria->id_categoria) }}" method="POST" style="display: inline;">
                                @csrf <!-- Token de seguridad -->
                                @method('DELETE') <!-- Uso el metodo DELETE, ya que el HTML solo admite GET/POST -->
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
            <a class="dropdown-item" href="{{ route('admin.categorias.export.csv') }}">
                <i class="fas fa-file-csv text-success"></i> Exportar como CSV
            </a>
            <a class="dropdown-item" href="{{ route('admin.categorias.export.excel') }}">
                <i class="fas fa-file-excel text-success"></i> Exportar como XLS
            </a>
            <a class="dropdown-item" href="{{ route('admin.categorias.export.pdf') }}">
                <i class="fas fa-file-pdf text-danger"></i> Exportar como PDF
            </a>
        </div>
    </div>
    
</main>

<style>
    .pastel-success {
        background-color: #8bd3f7 !important;
        color: #fff !important;
        font-size: 1rem;
        padding: 0.5rem 1rem;
        border: none; /* Evita cualquier borde que pueda heredar */
    }

    /* PISA OTROS ESTILOS DE HOVER  (CREO) */
    .pastel-success:hover {
        background-color: #8cb3c7; /* Color más oscuro */
        color: #fff; /* Texto permanece blanco */
        border: none; /* Evita bordes al pasar el mouse */
        transition: background-color 0.3s ease; /* Transición suave */
    }

    .pastel-warning {
        background-color: #f0cede !important; /* Amarillo pastel */
        color: #333 !important; /* Texto oscuro para contraste */
        font-size: 1rem;
        padding: 0.5rem 1rem;
        border: none; /* Sin bordes */
    }

    .pastel-warning:hover {
        background-color: #f0cede; /* Color más oscuro */
        color: #333; /* Texto permanece oscuro */
        transition: background-color 0.3s ease; /* Transición suave */
    }
</style>

@include('footer')