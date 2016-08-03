<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contact(ContactRequest $request)
    {
        $sent = Mail::send('emails.contact', $request->toArray(), function ($mail) use ($request) {
            $mail->from(env('MAIL_FROM', 'contacto@coffeedevs.com'), 'Contacto Coffee');
            $mail->to(env('MAIL_TO', 'coffeedevs@gmail.com'))->subject('Tenemos una nueva consulta');
        });
        if ($sent > 0) {
            $response = [
                'message' => 'success',
                'sendstatus' => 1,
            ];
        } else {
            $response = [
                'message' => 'error',
                'sendstatus' => 0,
            ];
        }

        return $response;
    }
}
