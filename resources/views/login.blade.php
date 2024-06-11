<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-box {
            width: 300px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .input-group {
            margin-bottom: 15px;
        }
        .input-group input {
            width: calc(100% - 40px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px 0 0 4px;
            outline: none;
        }
        .input-group .input-group-text {
            width: 40px;
            background-color: #ddd;
            border: 1px solid #ccc;
            border-left: none;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 0 4px 4px 0;
        }
        .input-group .input-group-text span {
            color: #888;
        }
        .btn {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .invalid-feedback {
            color: red;
            font-size: 0.875em;
        }
    </style>
</head>
<body>
<div class="login-box">
    <form action="{{ route('authenticate') }}" method="post">
        @csrf
        <div class="input-group">
            <input type="email" value="{{ old('email') }}" name="email" id="email" class="@error('email') is-invalid @enderror" placeholder="Email">
            <div class="input-group-text">
                <span class="fas fa-envelope"></span>
            </div>
            @error('email')
            <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
        <div class="input-group">
            <input type="password" name="password" id="password" class="@error('password') is-invalid @enderror" placeholder="Password">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
            @error('password')
            <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="btn">Login</button>
    </form>
</div>
</body>
</html>
