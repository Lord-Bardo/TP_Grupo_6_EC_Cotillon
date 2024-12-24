@include('header-user')

<main class="container mt-5 flex-grow-1">
    <h1 class="text-center text-info mb-4">Editar Categoría</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- TODO: Configurar el msg del campo con JS -->
    <form action="{{ route('admin.categorias.update', $categoria->id_categoria) }}" method="POST">
        @csrf
        @method('PUT') <!-- Actualizo con metodo PUT idem DELETE -->

        <div class="form-group mb-3">
            <label for="nombre_categoria" class="font-weight-bold">Nombre de la Categoría</label>
            <input type="text" class="form-control" id="nombre_categoria" name="nombre_categoria" value="{{ old('nombre_categoria', $categoria->nombre_categoria) }}" required title="Llena el campo boludazo">
        </div>
        
        <div class="form-group mb-4">
            <label for="descripcion_categoria" class="font-weight-bold">Descripción</label>
            <textarea class="form-control" id="descripcion_categoria" name="descripcion_categoria" required title="Llena el campo boludazo">{{ old('descripcion_categoria', $categoria->descripcion_categoria) }}</textarea>
        </div>
        
        <button type="submit" class="btn pastel-primary btn-lg w-100 mb-3">Actualizar Categoría</button>

        <!-- Botón de cancelar -->
        <a href="{{ route('admin.categorias') }}" class="btn btn-secondary btn-lg w-100">Cancelar</a>
    </form>
</main>

<style>
    .text-info {
        color: #5bc0de !important; /* Azul más claro para el título */
    }

    .pastel-primary {
        background-color: #5bc0de !important; /* Azul más claro para el botón */
        color: #fff !important;
        font-size: 1.2rem;
        padding: 0.75rem;
        border: none; /* Sin bordes */
    }

    .pastel-primary:hover {
        background-color: #46a1c4 !important; /* Azul más oscuro en hover */
        transition: background-color 0.3s ease; /* Transición suave */
    }
</style>

@include('footer')
