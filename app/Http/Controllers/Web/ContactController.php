<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Mail;
use Mockery\Exception;

class ContactController extends Controller
{
    public function contact(ContactRequest $request)
    {
        try {
            $sent = Mail::send('emails.contact', $request->toArray(), function ($mail) use ($request) {
                $mail->from(env('MAIL_FROM', 'contacto@coffeedevs.com'), 'Contacto Coffee');
                $mail->to(env('MAIL_TO', 'coffeedevs@gmail.com'))->subject('Tenemos una nueva consulta');
            });

            $response = [
                'message' => 'success',
                'sendstatus' => 1,
            ];
        } catch (Exception $ex) {
            $response = [
                'message' => 'error',
                'sendstatus' => 0,
            ];
        }

        return $response;
    }
}
