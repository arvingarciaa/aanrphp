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
        Mail::to('info@ajgarcia.com')->send(new SubscriptionSuccessMail());
        return new SubscriptionSuccessMail();
    }

    public function confirm(){
        Mail::to('info@ajgarcia.com')->send(new ConfirmRegistrationMail());
        return new ConfirmRegistrationMail();
    }

    public function digest(){
        Mail::to('arvinjohnbgarcia@gmail.com')->send(new DigestMail());
        return new DigestMail();
    }

    public function unsub(){
        Mail::to('info@ajgarcia.com')->send(new UnsubscribeMail());
        return new UnsubscribeMail();
    }

    public function unsubsuccess(){
        Mail::to('info@ajgarcia.com')->send(new UnsubscribeSuccessMail());
        return new UnsubscribeSuccessMail();
    }

}
