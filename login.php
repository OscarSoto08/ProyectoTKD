<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100..900&display=swap" rel="stylesheet">
    <style>
        /* Ensure no strikethrough is applied */
        .input-box label {
            text-decoration: none;
        }
        #error-message {
            color: red;
            display: none;
        }
        .wrapper{
            background: url("img/tkd-bg.jpg");
            background-size: cover;
            background-position: center;  
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="login-box">
            <form id="login-form">
                <h2>Inicio de Sesion</h2>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="mail"></ion-icon>
                    </span>
                    <input type="email" id="email" required>
                    <label>Correo Electronico</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="lock-closed"></ion-icon>
                    </span>
                    <input type="password" id="password" required>
                    <label>Contraseña</label>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox"> Recuerdame</label>
                    <a id="recuperar-contraseña" href="#">¿Olvidaste tu contaseña?</a>
                </div>
                <button type="submit">Ingresar</button>
                <img src="img/kopulsoNOchiquito.png" alt="Logo-de-kopulso">
                <p id="error-message"></p>
            </form>
        </div>
    </div>
    <script>
        document.getElementById('login-form').addEventListener('submit', async function(event) {
            event.preventDefault();

            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const errorMessage = document.getElementById('error-message');

            try {
                const response = await fetch('login', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ email, password })
                });
                
                const result = await response.json();

                if (result.success) {
                    // Redirigir a la página personal del usuario
                    window.location.href = `/profile.html?userId=${result.user.id}`;
                } else {
                    // Mostrar mensaje de error
                    errorMessage.textContent = result.message;
                    errorMessage.style.display = 'block';
                }
            } catch (error) {
                console.error('Error al iniciar sesión:', error);
            }
        });
    </script>
</body>
</html>
