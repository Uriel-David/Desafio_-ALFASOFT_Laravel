<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::where('deleted_at', null)->get();

        if (empty($contacts)) {
            return view('index', []);
        }

        return view('index')->with('contacts', $contacts);
    }

    public function contactsTrashed()
    {
        $contacts = Contact::onlyTrashed()->get();

        if (empty($contacts)) {
            return view('contacts.trashed', []);
        }

        return view('contacts.trashed')->with('contacts', $contacts);
    }

    /**
     * restore specific post
     *
     * @return void
     */
    public function restore($id)
    {
        Contact::withTrashed()->find($id)->restore();

        return Redirect::route('contact.index');
    }

    /**
     * restore all post
     *
     * @return response()
     */
    public function restoreAll()
    {
        Contact::onlyTrashed()->restore();

        return Redirect::route('contact.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request)
    {
        if (!$request->validated()) {
            return Redirect::route('contact.index');
        }

        $contact = new Contact;
        $contact->name = $request->name;
        $contact->contact = $request->contact;
        $contact->email = $request->email;
        $contact->save();

        return Redirect::route('contact.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contact::find($id);

        if (empty($contact)) {
            return Redirect::route('contacts.index');
        }

        return view('contacts.show')->with('contact', $contact);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contact::find($id);

        if (empty($contact)) {
            return Redirect::route('contacts.index');
        }

        return view('contacts.edit')->with('contact', $contact);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContactRequest $request, $id)
    {
        if (!$request->validated()) {
            return Redirect::route('contact.index');
        }

        $contact = Contact::find($id);
        $contact->name = $request->name;
        $contact->contact = $request->contact;
        $contact->email = $request->email;
        $contact->update();

        return Redirect::route('contact.index');
    }

    /**
     * Remove the specified resource from storage (soft delete).
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contact::find($id)->delete();

        return Redirect::route('contact.index');
    }
}
