@extends('layouts.app')

@section('content')
<div class="thanks-container">
    <h1 class="thanks-message">お問い合わせありがとうございました</h1>
    <a href="{{ url('/') }}" class="home-button">HOMEへ戻る</a>
</div>
@endsection
