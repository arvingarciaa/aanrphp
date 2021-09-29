<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Consortia;
use Illuminate\Support\Facades\Hash;


class UsersController extends Controller
{
    public function createUser(Request $request){
        $this->validate($request, array(
            'first_name' => 'required|max:200',
            'last_name' => 'required|max:200'
        ));

        $user = new User;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->password = Hash::make($request->password);
        if($request->select_org == 'other'){
            $user->is_organization_other = 1;
            $user->organization = $request->others_org;
        } else {
            $user->is_organization_other = 0;
            $user->organization = $request->select_org;
        }
        $user->email = $request->email;
        $user->age_range = $request->age_range;
        $user->gender = $request->gender;
        $user->contact_number = $request->contact_number;
        $user->save();
        Auth::loginUsingId($user->id);

        return redirect('/')->with('success','Registration Success! Welcome.'); 
    }

    public function editUser(Request $request, $user_id){
        $this->validate($request, array(
            'first_name' => 'required|max:200',
            'last_name' => 'required|max:200'
        ));

        $user = User::find($user_id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->birthdate = $request->birthdate;
        $user->region = $request->region;
        $user->city = $request->city;
        $user->zip_code = $request->zipcode;
        $user->contact_number = $request->contact_number;
        $user->age_range = $request->age_range;
        $user->gender = $request->gender;
        $user->subscribed = $request->subscribe;
        $user->interest = json_encode($request->interest);
        if($request->select_org == 'other'){
            $user->is_organization_other = 1;
            $user->organization = $request->others_org;
        } else {
            $user->is_organization_other = 0;
            $user->organization = $request->select_org;
        }
        $user->save();
        Auth::loginUsingId($user->id);

        return redirect()->back()->with('success','User account changes saved.');
    }

    public function sendConsortiaAdminRequest(Request $request, $user_id){
      
        $user = User::find($user_id);
        $user->consortia_admin_request = 1;
        $user->consortia_admin_id = $request->consortia_admin_id;
        $user->save();

        return redirect()->back()->with('success','Request Sent. Please wait for admin approval.'); 
    }

    public function consortiaAdminRequestApprove(Request $request, $user_id){
      
        $user = User::find($user_id);
        $user->consortia_admin_request = 2;
        $user->role = 2;
        $user->save();

        return redirect()->back()->with('success','Request approved.'); 
    }

    public function consortiaAdminRequestDecline(Request $request, $user_id){
      
        $user = User::find($user_id);
        $user->consortia_admin_request = 0;
        $user->role = 1;
        $user->consortia_admin_id = null;
        $user->save();

        return redirect()->back()->with('success','Request declined.'); 
    }

    public function deleteUser( $user_id){
        $user = User::find($user_id);
        $user->delete();

        return redirect()->back()->with('success','User Account Deleted.'); 
    }
}
