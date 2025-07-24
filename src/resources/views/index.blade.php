@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

<div class="contact-form__content">
    <div class="contact-form__heading">
        <h2>Contact</h2>
    </div>
    <form class="form" action="/confirm" method="post">
    @csrf
    <div class="form__group">
        <div class="form__group-title">
            <span class="form__label--item">お名前</span>
            <span class="form__label--required">※</span>
        </div>
        <div class="form__group-content">
            <div class="form__input--text">
                <input type="text" name="first_name" placeholder="例：山田" value="{{ old('first_name') }}" />
            </div>
            <div class="form__error">
                @error('first_name')
                {{ $message }}
                @enderror
            </div>
            <div class="form__input--text">
                <input type="text" name="last_name" placeholder="例：太郎" value="{{ old('last_name') }}" />
            </div>
            <div class="form__error">
            @error('last_name')
            {{ $message }}
            @enderror
            </div>
        </div>
    </div>

    <div class="form__group">
        <div class="form__group-title">
            <span class="form__label--item">性別</span>
            <span class="form__label--required">※</span>
        </div>
        <div class="form__button">
            <label><input type="radio" name="gender" value="male" {{ old('gender') == 'male' ? 'checked' : '' }}>男性</label>
            <label><input type="radio" name="gender" value="female" {{ old('gender') == 'female' ? 'checked' : '' }}>女性</label>
            <label><input type="radio" name="gender" value="others" {{ old('gender') == 'others' ? 'checked' : '' }}>その他</label>
            <div class="form__error">
            @error('gender')
            {{ $message }}
            @enderror
            </div>
        </div>
    </div>

    <div class="form__group">
        <div class="form__group-title">
            <span class="form__label--item">メールアドレス</span>
            <span class="form__label--required">※</span>
        </div>
        <div class="form__group-content">
            <div class="form__input--text">
                <input type="email" name="email" placeholder="例：test@example.com" value="{{ old('email') }}" />
            </div>
            <div class="form__error">
            @error('email')
            {{ $message }}
            @enderror
            </div>
        </div>
    </div>

    <div class="form__group">
        <div class="form__group-title">
            <span class="form__label--item">電話番号</span>
            <span class="form__label--required">※</span>
        </div>
        <div class="form__group-content">
            <div class="form__input--text">
                <input type="tel" name="tel1" placeholder="090" value="{{ old('tel1') }}" />
                <span class="hyphen">−</span>
                <input type="tel" name="tel2" placeholder="1234" value="{{ old('tel2') }}" />
                <span class="hyphen">−</span>
                <input type="tel" name="tel3" placeholder="5678" value="{{ old('tel3') }}" />
            </div>
            <div class="form__error">
            @error('tel')
            {{ $message }}
            @enderror
            </div>
        </div>
    </div>

    <div class="form__group">
        <div class="form__group-title">
            <span class="form__label--item">住所</span>
            <span class="form__label--required">※</span>
        </div>
        <div class="form__group-content">
            <div class="form__input--text">
                <input type="text" name="address" placeholder="例：東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}" />
            </div>
            <div class="form__error">
            @error('address')
            {{ $message }}
            @enderror
            </div>
        </div>
    </div>

    <div class="form__group">
        <div class="form__group-title">建物名</div>
        <div class="form__group-content">
            <div class="form__input--text">
                <input type="text" name="building" placeholder="例：千駄ヶ谷マンション101" value="{{ old('building') }}" />
            </div>
            <div class="form__error">
            @error('building')
            {{ $message }}
            @enderror
            </div>
        </div>
    </div>

    <div class="form__group">
        <div class="form__group-title">
            <span class="form__label--item">お問い合わせの種類</span>
            <span class="form__label--required">※</span>
        </div>
        <div class="form__group-content">
            <div class="form__input--text">
                <input type="text" name="content" placeholder="入力してください" value="{{ old('content') }}" />
            </div>
            <div class="form__error">
            @error('content')
            {{ $message }}
            @enderror
            </div>
        </div>
    </div>

    <div class="form__group">
        <div class="form__group-title">
            <span class="form__label--item">お問い合わせ内容</span>
            <span class="form__label--required">※</span>
        </div>
        <div class="form__group-content">
            <div class="form__input--text">
                <input type="text" name="detail" placeholder="お問い合わせ内容をご記載ください" value="{{ old('detail') }}" />
            </div>
            <div class="form__error">
            @error('detail')
            {{ $message }}
            @enderror
            </div>
        </div>
    </div>

    <div class="form__button">
        <button class="form__button-submit" type="submit">確認画面</button>
    </div>
    </form>
</div>