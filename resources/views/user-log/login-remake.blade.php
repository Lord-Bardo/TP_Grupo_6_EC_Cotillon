@include ('user-log.header-log-in')
<!-- Main container for centering the login card on the screen -->
    <main class="container">
        <!-- Login card containing both the image and the form -->
        <div class="login-card">
            <!-- Left side of the card containing the decorative image -->
            <div class="card-left">
                <div class="image-cover">
                    <img src="https://images.unsplash.com/photo-1724832228136-6ddd51037827?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Decorative Furniture Image">
                </div>
            </div>
            <!-- Right side of the card containing the login form -->
            <div class="card-right">
                <!-- Title of the login form -->
                <h1 class="title">EC-Cotillon</h1>
                <!-- Subtitle welcoming the user -->
                <h2 class="welcome">Welcome to EC-COTILLON</h2>
                <!-- Form for user input -->
                <form action="#" method="POST">
                    <!-- Input group for username or email -->
                    <div class="input-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" required>
                    </div>
                    <!-- Input group for password -->
                    <div class="input-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required>
                    </div>

                    <div class="actions">
                        <button type="submit" class="btn">Ingresá</button>
                        <a href="#" class="forgot-password">OLVIDASTE CONTRASEÑA?</a>
                    </div>
    
                    <div class="create-account">
                        <p>No tenes cuenta? <a href="#">Registrate</a></p>
                    </div>
                </form>
            </div>
        </div>
    </main>


