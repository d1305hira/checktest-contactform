<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|in:male,female,others',
            'email'=> 'required|string|email|max:255',
            'tel1'=> 'required|digits:3',
            'tel2'=> 'required|digits:4',
            'tel3'=> 'required|digits:4',
            'address'=> 'required|string|max:255',
            'building'=> 'string|max:255',
            'content'=> 'string|max:255',
            'detail'=> 'required|string|max:120'
        ];
    }
    public function messages()
    {
        return [
            'first_name.required' => '名前を入力してください',
            'first_name.string' => '名前を文字列で入力してください',
            'first_name.max' => '名前を255文字以下で入力してください',
            'last_name.required' => '名前を入力してください',
            'last_name.string' => '名前を文字列で入力してください',
            'last_name.max' => '名前を255文字以下で入力してください',
            'gender' => '性別を選択してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.string' => 'メールアドレスを文字列で入力してください',
            'email.email' => '有効なメールアドレス形式を入力してください',
            'email.max' => 'メールアドレスを255文字以下で入力してください',
            'tel1.required' => '電話番号を入力してください',
            'tel1.digits' => '電話番号を3桁入力してください',
            'tel2.required' => '電話番号を入力してください',
            'tel2.digits' => '電話番号を4桁入力してください',
            'tel3.required' => '電話番号を入力してください',
            'tel3.digits' => '電話番号を4桁入力してください',
            'address.required' => '住所を入力してください',
            'address.string' => '住所を文字列で入力してください',
            'address.max' => '住所を255文字以下で入力してください',
            'building.string' => '建物を文字列で入力してください',
            'building.max' => '建物を255文字以下で入力してください',
            'content.string' => '内容を文字列で入力してください',
            'content.max' => '内容を255文字以下で入力してください',
            'detail.required' => '詳細を入力してください',
            'detail.string' => '詳細を文字列で入力してください',
            'detail.max' => '詳細を255文字以下で入力してください',
        ];
    }
}
