@include('header-user')

<main class="container flex-grow-1">
    <div class="row d-flex justify-content-center">
        <div class="image-section col-6 d-flex justify-content-center align-items-center">
            <img src="{{ asset('images/globo_metalico_helio.png') }}" alt="{{$producto->nombre_producto}}" class="img-fluid product-image">
        </div>
        <div class="details-section col-6 mt-4 p-3 line-p">
            <div class="name-section">
                <h1 class="product-title">{{$producto->nombre_producto}}</h1>
            </div>
            <div class="price-section mb-2">
                <div class="fs-3 text-muted product-price">${{$producto->precio}}</div>
            </div>
            <div class="description">
                <h2 class="fs-4 text-pastel">Descripción:</h2>
                <p>{{$producto->descripcion_producto}}</p>
            </div>
            <form action="">
                <div class="quantity-section mb-3 d-flex align-items-center">
                    <label for="quantity" class="me-2">Cantidad:</label>
                    <div class="select-wrapper">
                        <select id="quantity" class="form-select w-auto quantity-select">
                            @for ($i = 1; $i <= min($producto->stock, 5); $i++)
                                <option value="{{$i}}">{{$i}} unidad</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="d-flex gap-2">
                    <!-- Botón Agregar al carrito -->
                    <button class="btn btn-outline-primary add-to-cart-btn">Agregar al carrito</button>
                    <!-- Nuevo botón Comprar -->
                    <a href="#" class="btn btn-outline-primary buy-now-btn">Comprar ahora</a>
                </div>
            </form>
        </div>
    </div>
</main>

@include('footer')

<style>
    /* General */
    .line-p {
        border: 0.2px solid #a39999;
        border-radius: 5px;
    }

    body {
        background-color: #fdfcfc; /* Fondo pastel suave */
        color: #333; /* Texto oscuro para contraste */
    }

    .container {
        max-width: 1200px;
        padding: 20px;
    }

    /* Secciones del producto */
    .product-image {
        border-radius: 10px;
        max-height: 400px;
        object-fit: contain;
        background-color: #ffffff;
        padding: 10px;
    }

    .product-title {
        font-size: 2.5rem;
        color: #84b0bd; /* Verde pastel */
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
    }

    .product-price {
        color: #e46363; /* Rojo pastel */
        font-weight: bold;
    }

    .text-pastel {
        color: #6ca3a4; /* Azul pastel */
    }

    /* Contenedor para ocultar la flecha */
    .select-wrapper {
        position: relative;
        display: inline-block;
    }

    /* Estilos para el select de cantidad sin flecha */
    .quantity-select {
        appearance: none; /* Otros navegadores */
        border-radius: 5px;
        border: 1px solid #ccc;
        padding: 8px 12px;
        font-size: 1.1rem;
        background-color: #ffffff;
        cursor: pointer; /* Establece el cursor como puntero */
        width: 100%;
        padding-right: 30px; /* Ajusta el padding para que no se vea la flecha */
    }

    /* Opcional: personaliza el fondo del select */
    .quantity-select::after {
        content: ''; /* No muestra pseudo-elemento */
    }

    /* Estilos para los botones */
    .add-to-cart-btn, .buy-now-btn {
        background-color: #81cdf0; /* Azul pastel */
        color: #ffffff;
        border: none;
        border-radius: 5px;
        font-size: 1.1rem;
        padding: 10px 20px;
        transition: all 0.3s ease;
    }

    .add-to-cart-btn:hover, .buy-now-btn:hover {
        background-color: #81d4fa;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .add-to-cart-btn:active, .buy-now-btn:active {
        background-color: #4fc3f7;
        transform: scale(0.98);
    }

    /* Estilo para alinear los botones */
    .d-flex {
        display: flex;
    }

    .gap-2 {
        gap: 1rem; /* Espacio entre los botones */
    }

    /* Ajustes para dispositivos móviles */
    @media (max-width: 768px) {
        .image-section, .details-section {
            flex: 1 1 100%;
            text-align: center;
        }
        
        .product-image {
            max-width: 90%;
        }
    }
</style>



