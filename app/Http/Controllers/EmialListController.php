<?php

namespace App\Http\Controllers;

use App\Models\EmailList;
use Illuminate\Http\Request;

class EmialListController extends Controller
{
    public function index()
    {
        $emails = EmailList::latest()->paginate(5);
        return view('products.emailList',compact('emails'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function add()
    {
        return view('products.emialListCreate');
    }
    public function store(Request $request)
    {
        EmailList::create($request->all());
        return Redirect()->route('emialList.create');
    }
}
