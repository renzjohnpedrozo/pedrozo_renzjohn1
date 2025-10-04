<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - CRUD Application</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            background: linear-gradient(135deg, #000000 0%, #1a0000 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Courier New', monospace;
        }

        .bg-pattern {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('https://www.transparenttextures.com/patterns/cubes.png');
            opacity: 0.08;
            z-index: 0;
        }

        .login-container {
            z-index: 1;
            width: 380px;
            padding: 40px;
            background: #0a0a0a;
            border-radius: 12px;
            box-shadow: 0 0 25px #ff0000 inset, 0 0 25px #ff0000;
            text-align: center;
        }

        .login-title {
            color: #ff0000;
            text-shadow: 0 0 12px #ff0000;
            margin: 0 0 25px 0;
            letter-spacing: 2px;
        }

        .login-form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .form-input {
            padding: 12px;
            background: #111;
            border: 2px solid #ff0000;
            color: #ff0000;
            border-radius: 8px;
            font-size: 14px;
            outline: none;
            box-shadow: 0 0 12px #ff0000;
        }

        .form-input::placeholder {
            color: #ff6666;
        }

        .btn-login {
            padding: 12px;
            background: #ff0000;
            color: #fff;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            box-shadow: 0 0 20px #ff0000;
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            background: #cc0000;
            box-shadow: 0 0 25px #ff0000;
        }

        .login-text {
            margin-top: 20px;
            color: #ccc;
            font-size: 14px;
        }

        .register-link {
            color: #ff0000;
            text-shadow: 0 0 8px #ff0000;
            text-decoration: none;
            font-weight: bold;
        }

        .register-link:hover {
            color: #ff3333;
        }
    </style>
</head>
<body>
    <!-- Futuristic grid background -->
    <div class="bg-pattern"></div>

    <!-- Login container -->
    <div class="login-container">
        <!-- Title -->
        <h2 class="login-title">🔒 LOGIN</h2>

        <!-- Login form -->
        <form method="post" action="<?= site_url('auth/login'); ?>" class="login-form">
            <input type="text" name="username" placeholder="Enter Username" required class="form-input">
            <input type="password" name="password" placeholder="Enter Password" required class="form-input">
            <button type="submit" class="btn-login">Login</button>
        </form>

        <!-- Register link -->
        <p class="login-text">
            Don't have an account?  
            <a href="<?= site_url('auth/register'); ?>" class="register-link">Register</a>
        </p>
    </div>
</body>
</html>
