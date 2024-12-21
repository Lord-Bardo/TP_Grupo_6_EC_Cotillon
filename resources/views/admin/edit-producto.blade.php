@include('header-user')

<div class="container mt-5">
    <h1 class="text-center text-primary mb-4">Editar Producto</h1>

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

    <form action="#" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="nombre_producto" class="font-weight-bold">Nombre del Producto</label>
            <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" value="{{ old('nombre_producto', $producto->nombre_producto) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="descripcion_producto" class="font-weight-bold">Descripción</label>
            <textarea class="form-control" id="descripcion_producto" name="descripcion_producto" required>{{ old('descripcion_producto', $producto->descripcion_producto) }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="precio" class="font-weight-bold">Precio</label>
            <input type="number" class="form-control" id="precio" name="precio" value="{{ old('precio', $producto->precio) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="stock" class="font-weight-bold">Stock</label>
            <input type="number" class="form-control" id="stock" name="stock" value="{{ old('stock', $producto->stock) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="estado" class="font-weight-bold">Estado</label>
            <select class="form-control" id="estado" name="estado" required>
                <option value="1" {{ $producto->estado == 1 ? 'selected' : '' }}>Activo</option>
                <option value="0" {{ $producto->estado == 0 ? 'selected' : '' }}>Inactivo</option>
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="id_categoria" class="font-weight-bold">Categoría</label>
            <select class="form-control" id="id_categoria" name="id_categoria" required>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id_categoria }}" {{ $producto->id_categoria == $categoria->id_categoria ? 'selected' : '' }}>
                        {{ $categoria->nombre_categoria }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary btn-lg w-100 mb-3">Actualizar Producto</button>
        <a href="{{ route('admin.productos') }}" class="btn btn-secondary btn-lg w-100">Cancelar</a>
    </form>
</div>

@include('footer')
