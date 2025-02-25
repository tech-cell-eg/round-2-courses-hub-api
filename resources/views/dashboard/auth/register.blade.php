<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration | Online Courses</title>
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

        .register-container {
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
<div class="register-container text-center">
    <h2 class="mb-4">Register</h2>
    <form method="POST" action="{{route('admin.register')}}">
        @csrf
        <div class="mb-3">
            <input id="name" type="text" name="name" class="form-control" placeholder="Name" required>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />

        </div>
        <div class="mb-3">
            <input id="email" type="email" name="email" class="form-control" placeholder="Email" required>
        </div>
        <div class="mb-3">
            <input id="phone" type="phone" name="phone" class="form-control" placeholder="Phone" required>
        </div>
        <div class="mb-3">
            <input id="password"
                   type="password"
                   name="password" class="form-control" placeholder="Password" required>
        </div>

        <div class="mb-3">
            <input id="password_confirmation"
                   type="password"
                   name="password_confirmation" class="form-control" placeholder="Password" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Register</button>
    </form>
</div>
</body>
</html>
