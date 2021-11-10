<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SubscriptionSuccessMail;
use App\Mail\ConfirmRegistrationMail;
use App\Mail\DigestMail;
use App\Mail\UnsubscribeMail;
use App\Mail\UnsubscribeSuccessMail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //

    public function subscriptionSuccess(){
        return new SubscriptionSuccessMail();
    }

    public function confirm(){
        return new ConfirmRegistrationMail();
    }

    public function digest(){
        Mail::to('info@ajgarcia.com')->send(new DigestMail());
        return new DigestMail();
    }

    public function unsub(){
        return new UnsubscribeMail();
    }

    public function unsubsuccess(){
        return new UnsubscribeSuccessMail();
    }

}
