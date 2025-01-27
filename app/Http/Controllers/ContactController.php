<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    // Display the contact form page
    public function index()
    {
        return view('contact'); // Assuming the contact Blade view is named 'contact.blade.php'
    }

    // Store the submitted contact form data
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'تم إرسال رسالتك بنجاح');
    }
}
