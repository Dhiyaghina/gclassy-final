<!-- resources/views/auth/login.blade.php -->
<!DOCTYPE html>
<html>
<head><title>Login</title></head>
<body>
    <h1>Login Page</h1>
    <form method="POST" action="/login">
        @csrf
        <input type="email" name="email" required placeholder="Email"><br>
        <input type="password" name="password" required placeholder="Password"><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
