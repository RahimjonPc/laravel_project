<?php

namespace App\Http\Controllers;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use App\Models\Contact;


class ContactController extends Controller {

    public function submit(ContactRequest $req) {
        $contact = new Contact();
        $contact->name = $req->input('name');
        $contact->email = $req->input('email');
        $contact->subject = $req->input('subject');
        $contact->message = $req->input('message');

        $contact->save();

        return redirect()->route('home')->with('success', 'Good job!');
    }


    public function allData() {
        $contact = new Contact;
        // return view('message', ['data' => $contact->orderBy('id', 'asc')->take(1)->get()]);
        return view('message', ['data' => $contact->all()]);
    }

    public function ShowOneMessage($id) {
        $contact = new Contact;
        return view('one-message', ['data' => $contact->find($id)]);
    }

    public function updateMessage($id) {
        $contact = new Contact;
        return view('update-message', ['data' => $contact->find($id)]);
    }

    public function updateMessageSubmit($id, ContactRequest $req) {
        $contact = Contact::find($id);
        $contact->name = $req->input('name');
        $contact->email = $req->input('email');
        $contact->subject = $req->input('subject');
        $contact->message = $req->input('message');

        $contact->save();

        return redirect()->route('contact-data-one', $id)->with('success', 'Message was updated');
    }

    public function deleteMessage($id) {
        Contact::find($id)->delete();
        return redirect()->route('contact-data')->with('success', 'Successfully deleted');
    }
}
