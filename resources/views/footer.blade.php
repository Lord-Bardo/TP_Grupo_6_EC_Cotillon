        <footer class="bg-light-dark text-white py-4 mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 d-flex flex-column align-items-center text-center">
                        <h5 class="font-weight-bold">Nuestra Dirección</h5>
                        <p><i class="fas fa-map-marker-alt"></i> 
                            <a href="https://www.google.com/maps?q=Brandsen 805, C1161AAQ Cdad. Autónoma de Buenos Aires" target="_blank" class="text-white">Brandsen 805, C1161AAQ, CABA </a>
                        </p>
                    </div>
                    
                    <!-- Contacto -->
                    <div class="col-md-4 d-flex flex-column align-items-center text-center">
                        <h5 class="font-weight-bold">Contacto</h5>
                        <p><i class="fas fa-phone-alt"></i> Tel: +54 9 11 1234 5678</p>
                        <p><i class="fas fa-envelope"></i> Email: utnfs@gmail.com</p>
                    </div>
                    
                    <!-- Redes Sociales -->
                    <div class="col-md-4 d-flex flex-column align-items-center text-center">
                        <h5 class="font-weight-bold">Seguinos</h5>
                        <div>
                            <a href="https://facebook.com" class="text-white mx-2"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://twitter.com" class="text-white mx-2"><i class="fab fa-twitter"></i></a>
                            <a href="https://www.instagram.com/juangarrone_/" class="text-white mx-2"><i class="fab fa-instagram"></i></a>
                            <a href="https://linkedin.com" class="text-white mx-2"><i class="fab fa-linkedin"></i></a>
                        </div>
                    </div>            
                </div>

                <!-- Copyright -->
                <div class="text-center mt-4">
                    <p>&copy; 2024 Nuestra Empresa. Todos los derechos reservados.</p>
                </div>
            </div>
        </footer>

        <style> 
            .bg-light-dark {
                background-color: #333; /* Negro más claro */
            }
            
            .bg-light-dark a {
                color: #ccc; /* Opcional: Cambiar el color de los enlaces a un gris más claro */
            }

            .bg-light-dark a:hover {
                color: #fff; /* Opcional: Cambiar el color al pasar el mouse */
            }

            .bg-light-dark .mx-2 {
                margin-left: 10px;
                margin-right: 10px;
            }
        </style>

        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>

        <script src="{{ asset('js/display-new-image.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/swiper.js') }}" type="text/javascript"></script>
    </body>
</html>