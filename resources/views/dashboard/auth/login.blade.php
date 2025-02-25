<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Dark Theme</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #121212;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-container {
            background-color: #1e1e1e;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(255, 0, 0, 0.5);
            width: 100%;
            max-width: 400px;
        }
        .form-control {
            background-color: #333;
            color: #fff;
            border: none;
        }
        .form-control:focus {
            background-color: #444;
            color: #fff;
            box-shadow: none;
        }
        .btn-primary {
            background-color: #ff0000;
            border: none;
        }
        .btn-primary:hover {
            background-color: #cc0000;
        }
        .forgot-password {
            text-decoration: none;
            color: #ff0000;
        }
        .forgot-password:hover {
            color: #cc0000;
        }
    </style>
</head>
<body>
<div class="login-container text-center">
    <h2 class="mb-4">Login</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
            <input id="email" type="email" name="email" class="form-control" placeholder="Email" required>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <div class="mb-3">
            <input id="password" class="form-control"
                   type="password"
                   name="password" placeholder="Password" required>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <input type="checkbox" id="rememberMe">
                <label for="rememberMe">Remember me</label>
            </div>
            <a href="#" class="forgot-password">Forgot Password?</a>
        </div>
        <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>
</div>
</body>
</html>
