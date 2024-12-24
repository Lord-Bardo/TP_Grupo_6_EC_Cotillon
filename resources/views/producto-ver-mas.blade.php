@include('header-user')

<main class="container flex-grow-1">
    <div class="row d-flex justify-content-center">
        <div class="image-section col-6 d-flex justify-content-center align-items-center">
            <img src="{{ asset('images/globo_metalico_helio.png') }}" alt="{{$producto->nombre_producto}}" class="img-fluid">
        </div>
        <div class="details-section col-6 mt-4">
            <div class="name-section">
                <h1>{{$producto->nombre_producto}}</h1>
            </div>
            <div class="price-section mb-2">
                <div class="fs-3 text-muted">${{$producto->precio}}</div>
            </div>
            <div class="description">
                <h2 class="fs-4">Descripción:</h2>
                <p>{{$producto->descripcion_producto}}</p>
            </div>
            {{-- FALTA AGREGAR EL FORMULARIO PARA EL CARRITO --}}
            <form action="">
                <div class="quantity-section mb-3 d-flex align-items-center">
                    <label for="quantity" class="me-2">Cantidad:</label>
                    <select id="quantity" class="form-select w-auto ">
                        @for ($i = 1; $i <= min($producto->stock, 5); $i++){
                            <option value = {{$i}}> {{$i}} unidad</option> 
                        }
                        @endfor
                    </select>
                </div>
                <button class="btn btn-outline-primary">Agregar al carrito</button>
            </form>
        </div>
    </div>
</main>

@include('footer')