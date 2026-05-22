<!DOCTYPE html>
<html>
<head>
    <title>Register</title>

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
            width: 420px;
            padding: 35px;
            border-radius: 14px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }

        h1 {
            text-align: center;
            font-size: 32px;
            margin-bottom: 5px;
            color: #222;
        }

        .subtitle {
            text-align: center;
            color: #666;
            margin-bottom: 30px;
            font-size: 14px;
        }

        label {
            font-size: 15px;
            font-weight: bold;
            display: block;
            margin-bottom: 8px;
            color: #222;
        }

        input {
            width: 100%;
            padding: 13px;
            margin-bottom: 20px;
            border-radius: 8px;
            border: 1px solid #d1d5db;
            font-size: 15px;
            box-sizing: border-box;
        }

        input:focus {
            outline: none;
            border-color: #4CAF50;
        }

        .register-btn {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 8px;
            background: #4CAF50;
            color: white;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 5px;
        }

        .register-btn:hover {
            background: #43a047;
        }

        .login-btn {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 8px;
            background: #e5e7eb;
            color: #333;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 12px;
        }

        .login-btn:hover {
            background: #d1d5db;
        }

    </style>

</head>

<body>

<div class="container">

    <h1>SmartBudget</h1>

    <p class="subtitle">Create your Ezzati Catering account</p>

    <form method="POST" action="{{ route('register') }}">

        @csrf

        <label>👤 Name</label>

        <input 
            type="text" 
            name="name"
            placeholder="Enter your name"
            required
        >

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

        <label>🔒 Confirm Password</label>

        <input 
            type="password"
            name="password_confirmation"
            placeholder="Confirm your password"
            required
        >

        <button type="submit" class="register-btn">
            Register
        </button>

    </form>

    <a href="{{ route('login') }}">

        <button class="login-btn">
            Back to Login
        </button>

    </a>

</div>

</body>
</html>