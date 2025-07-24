<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Support\Facades\Response;
use App\Models\Category;

class ContactController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(['first_name','last_name', 'gender', 'email','address','building','content','detail']);
        $contact['tel'] =$request['tel1'] . '-' . $request['tel2'] . '-' . $request['tel3'];
        return view('confirm', compact('contact'));
    }

    public function store(ContactRequest $request)
    {
        $contact = $request->only(['first_name', 'last_name', 'gender', 'email','address' ,'building', 'detail', 'content']);
        $contact['tel'] =$request['tel1'] . '-' . $request['tel2'] . '-' . $request['tel3'];
        Contact::create($contact);
        return view('thanks');
    }

    public function update(ContactRequest $request)
    {
        $form = $request->all();
        unset($form['_token']);
        Contact::find($request->id)->update($form);
        return redirect('/');
    }

    public function admin(Request $request)
    {
        $categories = Category::all();
        $contacts = Contact::with('category')->paginate(10);
        return view('admin', compact('categories', 'contacts'));
    }

    public function export(Request $request)
    {
        // 検索条件で絞り込み
        $contacts = Contact::query();

        // filter系の処理（名前・メール・性別・日付など）

        $contacts = $contacts->with('category')->get();

        $csvData = [];
        $csvData[] = ['氏名', '性別', 'メールアドレス', 'お問い合わせの種類', '登録日時'];

        foreach ($contacts as $contact) {
        $csvData[] = [
            $contact->last_name . ' ' . $contact->first_name,
            ['男性','女性','その他'][$contact->gender - 1],
            $contact->email,
            $contact->category->content,
            $contact->created_at->format('Y-m-d H:i'),
        ];
    }

        $filename = 'contacts_export_' . now()->format('Ymd_His') . '.csv';

        $response = Response::make(implode("\n", array_map(function($row) {
        return implode(',', $row);
        }, $csvData)));

        $response->header('Content-Type', 'text/csv');
        $response->header('Content-Disposition', "attachment; filename={$filename}");

        return $response;
    }

    public function thanks()
    {
        return view('thanks');
    }
}