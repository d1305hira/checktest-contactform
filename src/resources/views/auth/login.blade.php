<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate - Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <header>
        <h1 class="logo">FashionablyLate</h1>
        <a href="/register" class="register-link">register</a>
    </header>

    <main class="register-container">
        <h2>Login</h2>
        <form class="form" action="/login" method="POST">
            @csrf
            <label for="email">メールアドレス</label>
            <input type="email" name="email" id="email" placeholder="例: test@example.com">

            <label for="password">パスワード</label>
            <input type="password" name="password" id="password" placeholder="例: coachtech106">

            <button type="submit">ログイン</button>
        </form>
    </main>
</body>
</html>
