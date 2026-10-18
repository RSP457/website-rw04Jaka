<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin - RW 04</title>
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; font-family: Arial, sans-serif; background: #f5f6fa; display: grid; place-items: center; min-height: 100vh; }
        .card { width: min(400px, 92%); background: white; padding: 32px; border-radius: 16px; box-shadow: 0 10px 35px #00000010; }
        h2 { color: #b71937; margin-top: 0; }
        label { display: block; margin: 16px 0 8px; }
        input { width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; }
        button { width: 100%; padding: 13px; margin-top: 22px; background: #b71937; color: white; border: 0; border-radius: 8px; cursor: pointer; }
        .error { color: #b71937; font-size: 14px; }
    </style>
</head>
<body>
    <div class="card">
        <h2>Admin RW 04</h2>
        <p>Silakan masuk untuk mengelola website.</p>

        @if ($errors->any())
            <p class="error">{{ $errors->first() }}</p>
        @endif

        <form method="POST" action="{{ route('admin.login.submit') }}">
            @csrf
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required>

            <label for="password">Password</label>
            <input id="password" type="password" name="password" required>

            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
