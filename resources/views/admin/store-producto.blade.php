@include('header-user')

<div class="container mt-5">
    <h1 class="text-center text-pastel mb-4">Agregar Nuevo Producto</h1>

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
        
    <form action="{{ route('admin.productos.store') }}" method="POST">
        @csrf
        
        <div class="form-group mb-3">
            <label for="nombre_producto" class="font-weight-bold">Nombre del Producto</label>
            <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" value="{{ old('nombre_producto') }}">
            @error('nombre_producto')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="descripcion_producto" class="font-weight-bold">Descripción</label>
            <textarea class="form-control" id="descripcion_producto" name="descripcion_producto">{{ old('descripcion_producto') }}</textarea>
            @error('descripcion_producto')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="precio" class="font-weight-bold">Precio</label>
            <input type="number" class="form-control" id="precio" name="precio" value="{{ old('precio') }}">
            @error('precio')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="stock" class="font-weight-bold">Stock</label>
            <input type="number" class="form-control" id="stock" name="stock" value="{{ old('stock') }}">
            @error('stock')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="estado" class="font-weight-bold">Estado</label>
            <select class="form-control" id="estado" name="estado">
                <option value="1" {{ old('estado') == '1' ? 'selected' : '' }}>Activo</option>
                <option value="0" {{ old('estado') == '0' ? 'selected' : '' }}>Inactivo</option>
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="id_categoria" class="font-weight-bold">Categoría</label>
            <select class="form-control" id="id_categoria" name="id_categoria">
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id_categoria }}" {{ old('id_categoria') == $categoria->id_categoria ? 'selected' : '' }}>
                        {{ $categoria->nombre_categoria }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-pastel btn-lg w-100 mb-3">Agregar Producto</button>
        <a href="{{ route('admin.productos') }}" class="btn btn-secondary btn-lg w-100">Cancelar</a>
    </form>
</div>

<style>
    .text-pastel {
        color: #8bd3f7; /* Color pastel verde agua */
    }

    /* Clase para el botón pastel */
    .btn-pastel {
        background-color: #8bd3f7; /* Verde pastel */
        color: white;
        border: none;
    }

    .btn-pastel:hover {
        background-color: #b8def0; /* Color más oscuro al pasar el mouse */
    }
</style>

@include('footer')
