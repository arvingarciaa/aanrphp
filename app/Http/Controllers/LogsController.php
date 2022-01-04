<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Log;
use Response;
use Carbon\Carbon;

class LogsController extends Controller
{
    //
    public function exportLogs()
    {
        /*$table = Log::all();
        $output='';
        foreach ($table as $row) {
            $output.=  implode(",",$row->toArray());
            $output.= '\n';
        }
        $headers = array(
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="ExportFileName.csv"',
        );
        
        return Response::make(rtrim($output, "\n"), 200, $headers);*/

        $now = Carbon::now();
        $headers = [
                'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0'
            ,   'Content-type'        => 'text/csv'
            ,   'Content-Disposition' => 'attachment; filename=aanrlog_'.$now->format('dmy').'.csv'
            ,   'Expires'             => '0'
            ,   'Pragma'              => 'public'
        ];

        $list = Log::all()->toArray();

        # add headers for each column in the CSV download
        array_unshift($list, array_keys($list[0]));

        $callback = function() use ($list) 
        {
            $FH = fopen('php://output', 'w');
            foreach ($list as $row) { 
                fputcsv($FH, $row);
            }
            fclose($FH);
        };

        return response()->stream($callback, 200, $headers);
    }
}
