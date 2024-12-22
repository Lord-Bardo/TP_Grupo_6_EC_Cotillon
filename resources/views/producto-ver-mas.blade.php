@include('header-user')

<body>
    <div class="container">
        <div class="image-section">
            <img src="your_image_url_here" alt="{{$producto->nombre_producto}}">
        </div>
        <div class="details-section">
            <div class="price-section">
                <div class="price">{{$producto->precio}}</div>
            </div>
            {{-- FALTA AGREGAR EL FORMULARIO PARA EL CARRITO --}}
            <form action="">
                <div class="quantity-section">
                    <label for="quantity">Cantidad: </label>
                    <select id="quantity">
                        @for ($i = 1; $i <= min($producto->stock, 5); $i++){
                            <option value = {{$i}}> {{$i}} unidad</option> 
                        }
                        @endfor
                    </select>
                </div>
                <button>Agregar al carrito</button>
            </form>
            <div class="description">
                <h3>Descripción:</h3>
                <p>{{$producto->descripcion_producto}}</p>
            </div>
        </div>
    </div>
</body>

@include('footer-us')