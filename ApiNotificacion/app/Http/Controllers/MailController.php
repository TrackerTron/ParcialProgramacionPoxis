<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\SendMail;


class MailController extends Controller
{
    public function Enviar(Request $request){
        
        $job = new SendMail(
            
            $request -> post ("from"),
            $request -> post ("subject"),
            $request -> post ("to")
        );

        $this->dispatch($job);
        return [ 'status' => 'nos vemo\'' ];
    }

}
