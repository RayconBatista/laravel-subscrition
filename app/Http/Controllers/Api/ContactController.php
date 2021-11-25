<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactSite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function sendContact(ContactFormRequest $request)
    {
        Mail::send(new ContactSite($request->all()));

        return response()->json([
            'message'   => 'success',
        ]);
    }
}
