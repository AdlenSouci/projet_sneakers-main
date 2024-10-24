<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class MailController extends Controller
{
    public function test()
    {
        Mail::to('adlenssouci03@gmail.com')->send(new ContactMail());
        return response()->json(['message' => 'Votre message a bien été envoyé.']);
    }

    public function contact(Request $request)
    {
        $data = $request->all();
        Mail::to('adlenssouci03@gmail.com')->send(new ContactMail($data));
        return response()->json(['message' => 'Votre message a bien été envoyé.']);
    }
}
