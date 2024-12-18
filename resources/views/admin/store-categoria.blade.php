@include('header-user')

<div class="container mt-5">
    <h1 class="text-center text-success mb-4">Agregar Nueva Categoría</h1>

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

    <form action="{{ route('admin.categorias.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="nombre_categoria" class="font-weight-bold">Nombre de la Categoría</label>
            <input type="text" class="form-control" id="nombre_categoria" name="nombre_categoria" value="{{ old('nombre_categoria') }}" required title="Llena el campo boludazo">
        </div>
        
        <div class="form-group mb-4">
            <label for="descripcion_categoria" class="font-weight-bold">Descripción</label>
            <textarea class="form-control" id="descripcion_categoria" name="descripcion_categoria" required title="Llena el campo boludazo">{{ old('descripcion_categoria') }}</textarea>
        </div>
        
        <button type="submit" class="btn btn-success btn-lg w-100 mb-3">Agregar Categoría</button>

        <!-- Botón de cancelar -->
        <a href="{{ route('admin.categorias') }}" class="btn btn-secondary btn-lg w-100">Cancelar</a>
    </form>
</div>

@include('footer')
