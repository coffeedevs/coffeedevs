<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contact(ContactRequest $request)
    {
        Mail::send('emails.contact', $request->toArray(), function ($mail) use ($request) {
            $mail->from('contacto@coffeedevs.com', 'Contacto Coffee');
            $mail->to('coffeedevs@gmail.com')->subject('Tenemos una nueva consulta');
        });
    }
}
