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
        <h1 class="titulo-categoria">Administración de Categorías</h1>
        
        <a href="{{ route('admin.categorias.create') }}" class="btn btn-success btn-sm">
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
                        <a href="{{ route('admin.categorias.edit', $categoria->id_categoria) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.categorias.destroy', $categoria->id_categoria) }}" method="POST" style="display: inline-block;">
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
</div>

@include('footer')