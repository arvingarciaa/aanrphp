<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agenda;

class AgendasController extends Controller
{
    public function addAgenda(Request $request){
        $this->validate($request, array(
            'agenda' => 'required|max:255'
        ));

        $user = auth()->user();
        $agenda = new Agenda;
        $agenda->agenda = $request->agenda;
        $agenda->agenda_types = $request->agenda_types;
        $agenda->sector_id = $request->sector;
        $agenda->end_year = $request->end_year;
        $agenda->start_year = $request->start_year;
        $agenda->save();

        return redirect()->back()->with('success','Agenda Added.'); 
    }
    
    public function editAgenda(Request $request, $agenda_id){
        $this->validate($request, array(
            'agenda' => 'required|max:255'
        ));
        
        $user = auth()->user();
        $agenda = Agenda::find($agenda_id);
        $agenda->agenda = $request->agenda;
        $agenda->agenda_types = $request->agenda_types;
        $agenda->sector_id = $request->sector;
        $agenda->end_year = $request->end_year;
        $agenda->start_year = $request->start_year;
        $agenda->save();

        return redirect()->back()->with('success','Agenda Updated.'); 
    }

    public function deleteAgenda($agenda_id, Request $request){
        $agenda = Agenda::find($agenda_id);
        $agenda->delete();

        return redirect()->back()->with('success','Agenda Deleted.'); 
    }
}
