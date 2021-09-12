<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscriber;

class SubscribersController extends Controller
{
    public function addSubscriber(Request $request){
        $this->validate($request, array(
            'first_name' => 'required|max:200',
            'last_name' => 'required|max:200'
        ));

        $user = auth()->user();
        $subscriber = new Subscriber;
        $subscriber->first_name = $request->first_name;
        $subscriber->last_name = $request->last_name;
        $subscriber->email = $request->email;
        $subscriber->save();

        return redirect()->back()->with('success','Subscriber Added.'); 
    }
    
    public function editSubscriber(Request $request, $subscriber_id){
        $this->validate($request, array(
            'first_name' => 'required|max:200',
            'last_name' => 'required|max:200'
        ));
        
        $user = auth()->user();
        $subscriber = Subscriber::find($subscriber_id);
        $subscriber->first_name = $request->first_name;
        $subscriber->last_name = $request->last_name;
        $subscriber->email = $request->email;
        $subscriber->save();

        return redirect()->back()->with('success','Subscriber Updated.'); 
    }

    public function deleteSubscriber($subscriber_id, Request $request){
        $subscriber = Subscriber::find($subscriber_id);
        $subscriber->delete();

        return redirect()->back()->with('success','Subscriber Deleted.'); 
    }
}
