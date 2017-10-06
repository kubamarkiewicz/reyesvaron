<?php namespace KubaMarkiewicz\Neotecman\Api;

use Illuminate\Routing\Controller;
use Input;
use KubaMarkiewicz\Neotecman\Models\Settings;

class Contact extends Controller
{

    public function send()
    {
		// send email ---------------------------------------------------------------------
        $message = "De: ".Input::get('name')." ".Input::get('email')."\n";
        $message .= "Asunto: ".Input::get('subject')."\n";
        $message .= "Mensaje: \n".Input::get('message');

        $result = mail(Settings::get('contact_email'), 'Mensaje de web', $message, 'From: info@neotecman.com');

        return response()->json($result, 200, array(), JSON_PRETTY_PRINT);
    }

}