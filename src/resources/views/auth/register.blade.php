<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate - Register</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>
<body>
    <header>
        <h1 class="logo">FashionablyLate</h1>
        <a href="/login" class="login-link">login</a>
    </header>

    <main class="register-container">
        <h2>Register</h2>
        <form class=form action="/register" method="POST">
            @csrf
            <label for="name">お名前</label>
            <input type="text" name="name" id="name" placeholder="例: 山田 太郎" required>

            <label for="email">メールアドレス</label>
            <input type="email" name="email" id="email" placeholder="例: test@example.com" required>

            <label for="password">パスワード</label>
            <input type="password" name="password" id="password" placeholder="例: coachtech106" required>

            <button type="submit">登録</button>
        </form>
    </main>
</body>
</html>
