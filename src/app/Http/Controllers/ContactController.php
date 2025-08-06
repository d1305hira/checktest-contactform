<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Category;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Response;

class ContactController extends Controller
{
    public function index()
    {
    $categories = Category::all();
    return view('index', compact('categories'));
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(['first_name','last_name', 'gender', 'tel1','tel2','tel3','email','address','building','category_id','detail']);
        return view('confirm', compact('contact'));
    }

    public function store(ContactRequest $request)
    {
        if ($request->has('back')) {
            return redirect('/')->withInput();
            }

        $contact = $request->only([
            'category_id',
            'first_name',
            'last_name',
            'gender',
            'email',
            'address' ,
            'building',
            'detail',
            ]);
        $contact['tel'] =$request->input('tel1') . $request->input('tel2') . $request->input('tel3');
        Contact::create($contact);
        return view('thanks');
    }

    public function admin()
    {
        $categories = Category::all();
        $contacts = Contact::with('category')->paginate(7);
        return view('admin', compact('categories', 'contacts'));
    }

    public function search(Request $request)
    {
        if ($request->has('reset')) {
            return redirect('/admin')->withInput();
        }
        $query = Contact::query();

        $query = $this->getSearchQuery($request, $query);

        $contacts = $query->paginate(7);
        $categories = Category::all();
        return view('admin', compact('contacts', 'categories'));
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
}