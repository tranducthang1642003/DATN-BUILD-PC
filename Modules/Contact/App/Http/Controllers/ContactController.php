<?php

namespace Modules\Contact\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Modules\Contact\App\Emails\SendWeeklyPostsEmail;
use Modules\Contact\Entities\Contact; 
use Modules\Settings\Entities\Menu;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menuItems = Menu::all();

       return view('public.contact.index',compact('menuItems'));
    }

    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        $contact = new Contact();
        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->message = $request->input('message');
        $contact->save();

        $details = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
        ];

        Mail::to('recipient@example.com')->send(new SendWeeklyPostsEmail($details));

        return redirect()->route('contact.index')->with('success', 'Your message has been sent successfully!');
    }
}

