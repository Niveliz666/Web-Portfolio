<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #0a0a0a;
            --bg-2: #141414;
            --bg-card: #1e1e1e;
            --border: #2a2a2a;
            --accent: #e63946;
            --accent-hover: #ff4d5a;
            --text: #fafafa;
            --muted: #a3a3a3;
            --dim: #666666;
            --danger: #ef4444;
        }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            background: var(--bg);
            color: var(--text);
            font-family: 'Space Grotesk', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-container {
            width: 100%;
            max-width: 420px;
            padding: 24px;
        }
        .login-card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 40px;
        }
        .login-header {
            text-align: center;
            margin-bottom: 32px;
        }
        .login-logo {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--text);
            text-decoration: none;
            display: inline-block;
            margin-bottom: 8px;
        }
        .login-logo span { color: var(--accent); }
        .login-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 8px;
        }
        .login-subtitle {
            color: var(--muted);
            font-size: 0.95rem;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--muted);
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .form-group input {
            width: 100%;
            background: var(--bg-2);
            border: 1px solid var(--border);
            color: var(--text);
            padding: 14px 16px;
            border-radius: 10px;
            font-size: 1rem;
            font-family: 'Space Grotesk', sans-serif;
            transition: all 0.2s;
        }
        .form-group input:focus {
            outline: none;
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(230, 57, 70, 0.15);
        }
        .form-group input::placeholder {
            color: var(--dim);
        }
        .btn-login {
            width: 100%;
            background: var(--accent);
            color: #fff;
            padding: 14px 24px;
            border-radius: 10px;
            font-weight: 700;
            font-size: 1rem;
            border: none;
            cursor: pointer;
            transition: all 0.2s;
            font-family: 'Space Grotesk', sans-serif;
        }
        .btn-login:hover {
            background: var(--accent-hover);
        }
        .error-message {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.3);
            color: var(--danger);
            padding: 12px 16px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 0.9rem;
        }
        .back-link {
            text-align: center;
            margin-top: 24px;
        }
        .back-link a {
            color: var(--muted);
            text-decoration: none;
            font-size: 0.9rem;
        }
        .back-link a:hover {
            color: var(--accent);
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <a href="{{ route('home') }}" class="login-logo">dev<span>.</span></a>
                <h1 class="login-title">Admin Login</h1>
                <p class="login-subtitle">Enter your credentials to access the dashboard</p>
            </div>

            @if($errors->any())
                <div class="error-message">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('admin.login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="admin@example.com" value="{{ old('email') }}" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                </div>
                <button type="submit" class="btn-login">Sign In</button>
            </form>

            <div class="back-link">
                <a href="{{ route('home') }}">← Back to Portfolio</a>
            </div>
        </div>
    </div>
</body>
</html>