<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CKEditorController extends Controller
{
    //
    public function store(Request $request)
   {
      $path_url = 'storage/' . Auth::id();

      if ($request->hasFile('upload')) {
         $originName = $request->file('upload')->getClientOriginalName();
         $fileName = pathinfo($originName, PATHINFO_FILENAME);
         $extension = $request->file('upload')->getClientOriginalExtension();
         $fileName = Str::slug($fileName) . '_' . time() . '.' . $extension;
         $request->file('upload')->move(public_path($path_url), $fileName);
         $url = asset($path_url . '/' . $fileName);
      }

      return response()->json(['url' => $url]);
   }

}
