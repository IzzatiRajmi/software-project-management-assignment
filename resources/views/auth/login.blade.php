<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <style>

        body {
            font-family: Arial, sans-serif;
            background: #f0f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: white;
            width: 380px;
            padding: 35px;
            border-radius: 14px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }

        h1 {
            text-align: center;
            font-size: 34px;
            margin-bottom: 5px;
            color: #222;
        }

        .subtitle {
            text-align: center;
            color: #777;
            margin-bottom: 30px;
            font-size: 14px;
        }

        label {
            font-size: 15px;
            font-weight: bold;
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 13px;
            margin-bottom: 20px;
            border-radius: 8px;
            border: 1px solid #d1d5db;
            font-size: 14px;
            box-sizing: border-box;
        }

        input:focus {
            outline: none;
            border-color: #4CAF50;
        }

        .login-btn {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 8px;
            background: #4CAF50;
            color: white;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.2s;
        }

        .login-btn:hover {
            background: #43a047;
        }

        .register-btn {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 8px;
            background: #e5e7eb;
            color: #444;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 12px;
            transition: 0.2s;
        }

        .register-btn:hover {
            background: #d1d5db;
        }

        .forgot-password {
            text-align: center;
            margin-top: 18px;
        }

        .forgot-password a {
            color: #9ca3af;
            text-decoration: none;
            font-size: 13px;
        }

        .forgot-password a:hover {
            text-decoration: underline;
        }

    </style>

</head>

<body>

<div class="container">

    <h1>SmartBudget</h1>

    <p class="subtitle">Login to Ezzati Catering</p>

    <form method="POST" action="{{ route('login') }}">

        @csrf

        <label>📧 Email</label>

        <input 
            type="email" 
            name="email" 
            placeholder="Enter your email" 
            required
        >

        <label>🔑 Password</label>

        <input 
            type="password" 
            name="password" 
            placeholder="Enter your password" 
            required
        >

        <button type="submit" class="login-btn">
            Login
        </button>

    </form>

    <a href="{{ route('register') }}">
        <button class="register-btn">
            Register
        </button>
    </a>

    <div class="forgot-password">

        <a href="{{ route('password.request') }}">
            Forgot your password?
        </a>

    </div>

</div>

</body>
</html>