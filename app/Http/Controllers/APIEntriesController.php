<?php

namespace App\Http\Controllers;

use App\APIEntries;
use Illuminate\Http\Request;

class APIEntriesController extends Controller
{
    //
    public function addAPIEntry(Request $request){
        $entry = new APIEntries;
        $entry->link = $request->link;
        $entry->description = $request->description;
        $entry->frequency = $request->frequency;
        $entry->save();

        return redirect()->back()->with('success','API Added.'); 
    }

    public function editAPIEntry(Request $request, $entry_id){
        $user = auth()->user();
        $entry = APIEntries::find($entry_id);
        $entry->link = $request->link;
        $entry->description = $request->description;
        $entry->frequency = $request->frequency;
        $article->save();

        return redirect()->back()->with('success','API Updated.'); 
    }

    public function deleteAPIEntry($entry_id, Request $request){
        $entry = APIEntries::find($entry_id);
        $entry->delete();

        return redirect()->back()->with('success','API Deleted.'); 
    }
}
