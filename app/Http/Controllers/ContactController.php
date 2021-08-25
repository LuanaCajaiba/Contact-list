<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ contact;

class ContactController extends Controller
{

    public function index()
    {
        $contacts = contact::orderBy('created_at', 'desc')->paginate(10);
        return view('contacts.index',['contacts' => $contacts]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(ContactRequest $request)
    {
        $contact = new Contact;
        $contact->name      = $request->name;
        $contact->contact   = $request->contact;

    }

}
