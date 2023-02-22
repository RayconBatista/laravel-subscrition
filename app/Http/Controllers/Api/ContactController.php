<?php

namespace App\Http\Controllers\Api;

use App\Events\RegisteredMessage;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactFormRequest;

class ContactController extends Controller
{
    public function sendContact(ContactFormRequest $request)
    {
        event(new RegisteredMessage($request->all()));

        return response()->json([
            'message'   => 'success',
        ]);
    }
}
