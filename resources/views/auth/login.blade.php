<!-- resources/views/auth/login.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Learning Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            background: url('/images/loginbg.jpg') ;
            background-size: cover;
            font-family: 'Roboto', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background: rgba(255, 255, 255, 0.8);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
            width: 300px;
        }
        h2 {
            text-align: center;
            color: #5f4b8b;
        }
        .input-field {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }
        .login-btn {
            background-color: #5f4b8b;
            color: white;
            padding: 10px;
            width: 100%;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .login-btn:hover {
            background-color: #6a57a0;
        }
        .remember-forgot-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .remember-me {
            color: #555;
        }
        .forgot-password {
            color:rgb(37, 99, 231);
            text-decoration: none;
        }
        .forgot-password:hover {
            text-decoration: underline;
        }
        .register-link {
            display: block;
            text-align: center;
            margin-top: 10px;
            color: #5f4b8b;
            text-decoration: none;
        }
        .register-link:hover {
            text-decoration: underline;
        }
        
    </style>
</head>
<body>
    <div class="login-container">
    <h2>Login GClassy</h2>
    <form method="POST" action="/login">
        @csrf
        <input type="email" name="email" class="input-field" required placeholder="Email">
        <input type="password" name="password" class="input-field" required placeholder="Password"><br>
            <div class="remember-forgot-container">
                <label class="remember-me">
                    <input type="checkbox" name="remember_me"> Remember me
                </label>
                <label for="forgot-password">
                    <a href="#" class="forgot-password">Forgot password?</a>
                </label>
            </div>
            <br>
            <button type="submit" class="login-btn">Login</button>
        </form>
    </div>
</body>
</html>


