@extends('layouts.app')

@section('content')
<header>
    <h1 class="logo">FashionablyLate</h1>
    <p class="title">Admin</p>
    <form action="/logout" method="POST">@csrf <button>ログアウト</button></form>
</header>

<main class="admin-container">
    <form method="GET" action="/admin" class="search-form">
        <input type="text" name="keyword" placeholder="名前やメールアドレスを入力してください">
        <select name="gender">
            <option value="">性別</option>
            <option value="1">男性</option>
            <option value="2">女性</option>
            <option value="3">その他</option>
        </select>
        <select name="category_id">
            <option value="">お問い合わせの種類</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->content }}</option>
            @endforeach
        </select>
        <input type="date" name="created_at">
        <button type="submit">検索</button>
        <a href="/admin" class="reset-btn">リセット</a>
        <a href="{{ route('admin.export', request()->query()) }}">CSV出力</a>
    </form>

    <table class="contact-table">
        <thead>
            <tr>
                <th>お名前</th>
                <th>性別</th>
                <th>メールアドレス</th>
                <th>お問い合わせの種類</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
                <tr>
                    <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
                    <td>{{ ['男性','女性','その他'][$contact->gender - 1] }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->category->content }}</td>
                    <td><button class="detail-btn" data-id="{{ $contact->id }}">詳細</button></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $contacts->links() }}
</main>
@endsection
