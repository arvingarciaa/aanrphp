<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ArtifactAANR;
use App\Consortia;
use App\Content;
use App\ContentSubtype;
use App\ConsortiaMember;
use App\Log;
use Illuminate\Support\Facades\DB;
use Session;

class ArtifactAANRController extends Controller{
    public function uploadPDFArtifact(Request $request)
    {
        $this->validate($request, array(
            'file' => 'required|file|max:10240|mimes:pdf'
        ));
        
        if($request->hasFile('file')){
            $pdfFile = $request->file('file');
            $pdfName = uniqid().$pdfFile->getClientOriginalName();
            $pdfFile->move(public_path('/storage/files/'), $pdfName);
            $artifactaanr = new ArtifactAANR;
            $file = $tech->files()->create([
                'filename' => $pdfName,
                'filesize' => 1,
                'category' => $request->category,
                'filetype' => pathinfo(storage_path().'/storage/files/'.$pdfName, PATHINFO_EXTENSION),
                'technology_id' => $artifactaanr_id
            ]);
            
        }
        return redirect()->back()->with('success', 'File Uploaded!');
    }

    public function addView(Request $request){
        $artifact_key = $request->get('content_id');
        if (!Session::has($artifact_key)) {
            ArtifactAANR::find($artifact_key)->increment('views');
            Session::put($artifact_key, 1);
        } 
    }

    public function addArtifact(Request $request){
        $user = auth()->user();
        if($request->api_link != null){
            $url = $request->api_link;
            $data = @file_get_contents($url);
            if($data == false){
                $publications = [];
            } else {
                $publications = json_decode($data);
            }
            foreach($publications as $publication){
                $title = $publication->title;
                $author = $publication->author;
                $description = $publication->summary;
                $content_id = Content::where('type' , '=', 'Publications')->first();
                $consortia_id = Consortia::where('short_name' , '=', 'STAARRDEC')->first()->id;
                if($content_id){
                    $content_id = $content_id->id;
                }
                $contentsubtype_id = ContentSubtype::where('name' , '=', $publication->materialtype)->first();
                if($contentsubtype_id){
                    $contentsubtype_id = $contentsubtype_id->id;
                }
                $keywords = $publication->subjects;
                $file = $publication->filelocation;
                $imglink = $publication->thumbnail;
                $date_published = strtotime($publication->publicationdate);

                $artifact = ArtifactAANR::firstOrNew(['title' => $title]);
                $artifact->date_published = date("Y-m-d",$date_published);
                $artifact->description = $description;
                $artifact->imglink = $imglink;
                $artifact->author = $author;
                $artifact->keywords = $keywords;
                if($file){
                    $artifact->file = $file;
                    $artifact->file_type = 'pdf_link';
                }
                $artifact->consortia_id = $consortia_id;
                $artifact->content_id = $content_id;
                $artifact->contentsubtype_id = $contentsubtype_id;
                $artifact->save();
            }
        } else {
            if($request->file('csv_file')){
                $upload = $request->file('csv_file');
                $filePath = $upload->getRealPath();
                $file = fopen($filePath, 'r');

                $header = fgetcsv($file);
                while($columns = fgetcsv($file)){
                    if($columns[0] == ""){
                        continue;
                    }

                    $data = array_combine($header, $columns);
                    foreach($data as $key => &$value){
                        $key = strtolower($key);
                        $value = ($key == "gad") ? (integer)$value:(string)$value;
                    }


                    $title = $data['title'];
                    $date_published = strtotime($data['date_published']);
                    $description = $data['abstract'];
                    $link = $data['link'];
                    $imglink = $data['imagelink'];
                    $author = $data['authors'];
                    $author_institution = $data['CMI'];
                    $keywords = $data['keywords'];
                    $content_id = Content::where('type' , '=', $data['content_type'])->first()->id;
                    $contentsubtype_id = ContentSubtype::where('name' , '=', $data['subcontent_type'])->first()->id;
                    $consortia_id = Consortia::where('short_name' , '=', $data['consortia'])->first()->id;
                    $consortia_member_id = ConsortiaMember::where('name' , '=', $data['CMI'])->first()->id;
                    
                    $artifact = ArtifactAANR::firstOrNew(['title' => $title]);
                    $artifact->date_published = date("Y-m-d",$date_published);
                    $artifact->description = $description;
                    $artifact->link = $link;
                    $artifact->imglink = $imglink;
                    $artifact->author = $author;
                    $artifact->author_institution = $author_institution;
                    $artifact->keywords = $keywords;
                    $artifact->content_id = $content_id;
                    $artifact->contentsubtype_id = $contentsubtype_id;
                    $artifact->consortia_id = $consortia_id;
                    $artifact->consortia_member_id = $consortia_member_id;
                    $artifact->save();
                }

            } else {
                $this->validate($request, [
                    'title' => 'required',
                    'date_published' => 'before:tomorrow',
                    'content' => 'required',
                    'consortia' => 'required',
                    'manual_file' => 'file|max:10240|mimes:pdf,jpeg,png'
                ]);
                $artifactaanr = new ArtifactAANR;
                $artifactaanr->title = $request->title;
                $artifactaanr->date_published = $request->date_published;
                $artifactaanr->description = $request->description;
                $artifactaanr->content_id = $request->content;
                $artifactaanr->consortia_id = $request->consortia;
                $artifactaanr->consortia_member_id = $request->consortia_member;
                $artifactaanr->contentsubtype_id = $request->subcontent_type;
                $artifactaanr->link = $request->link;
                $artifactaanr->embed_link = $request->embed_link;
                $artifactaanr->author = $request->author;
                $artifactaanr->author_institution = $request->author_institution;
                $artifactaanr->author_affiliation = $request->author_affiliation;
                $artifactaanr->keywords = $request->keywords;
                $artifactaanr->is_gad = $request->is_gad;
                $artifactaanr->imglink = $request->imglink;
                if($request->hasFile('manual_file')){
                    $pdfFile = $request->file('manual_file');
                    $pdfName = uniqid().$pdfFile->getClientOriginalName();
                    $pdfFile->move(public_path('/storage/files/'), $pdfName);
                    $artifactaanr->file = $pdfName;
                    $artifactaanr->file_type = pathinfo(storage_path().'/storage/files/'.$pdfName, PATHINFO_EXTENSION);
                }   
                $artifactaanr->save();
                $artifactaanrobject = ArtifactAANR::find($artifactaanr->id);
                $artifactaanrobject->isp()->sync($request->isp);
                $artifactaanrobject->commodities()->sync($request->commodities);
                foreach(DB::table('artifactaanr_isp')->where('artifactaanr_id', '=', $artifactaanr->id)->get() as $entry){
                    $temp_sector_id = DB::table('isp')->where('id', '=', $entry->isp_id)->first()->sector_id;
                    $temp_industry_id = DB::table('sectors')->where('id', '=', $temp_sector_id)->first()->industry_id;
                    DB::table('artifactaanr_isp')->where('id', '=', $entry->id)->update(['industry_id' => DB::table('industries')->where('id', '=', $temp_industry_id)->first()->id]);
                }
                foreach(DB::table('artifactaanr_commodity')->where('artifactaanr_id', '=', $artifactaanr->id)->get() as $entry){
                    $temp_isp_id = DB::table('commodities')->where('id', '=', $entry->commodity_id)->first()->isp_id;
                    $temp_sector_id = DB::table('isp')->where('id', '=', $temp_isp_id)->first()->sector_id;
                    $temp_industry_id = DB::table('sectors')->where('id', '=', $temp_sector_id)->first()->industry_id;
                    DB::table('artifactaanr_commodity')->where('id', '=', $entry->id)->update(['industry_id' => DB::table('industries')->where('id', '=', $temp_industry_id)->first()->id]);
                }
                
                $artifactaanrobject->save();
            }
        }

        return redirect()->back()->with('success','ArtifactAANR Added.'); 
    }
    
    public function editArtifact(Request $request, $artifact_id){
        $this->validate($request, array(
            'title' => 'required',
            'date_published' => 'before:tomorrow',
            'file' => 'file|max:10240|mimes:pdf,jpeg,png'
        ));
        $user = auth()->user();
        $temp_changes = '';
        $log = new Log;
        if($user->role != 5 && $user->role != 1){
            return redirect()->back()->with('error','Your account is not authorized to use this function.'); 
        } else {
            $artifactaanr = ArtifactAANR::find($artifact_id);
            if($artifactaanr->title != $request->title){
                $temp_changes = $temp_changes.'<strong>Title:</strong> '.$artifactaanr->title.' <strong>-></strong> '.$request->title.'<br>';
            }
            if($artifactaanr->date_published != $request->date_published){
                $temp_changes = $temp_changes.'<strong>Date Published:</strong> '.$artifactaanr->date_published.' <strong>-></strong> '.$request->date_published.'<br>';
            }
            if($artifactaanr->description != $request->description){
                $temp_changes = $temp_changes.'<strong>Description:</strong> '.$artifactaanr->description.' <strong>-></strong> '.$request->description.'<br>';
            }
            if($artifactaanr->content_id != $request->content){
                $temp_changes = $temp_changes.'<strong>Content ID:</strong> '.$artifactaanr->content_id.' <strong>-></strong> '.$request->content.'<br>';
            }
            if($artifactaanr->contentsubtype_id != $request->subcontent_type){
                $temp_changes = $temp_changes.'<strong>Subcontent Type ID:</strong> '.$artifactaanr->contentsubtype_id.' <strong>-></strong> '.$request->subcontent_type.'<br>';
            }
            if($artifactaanr->consortia_id != $request->consortia){
                $temp_changes = $temp_changes.'<strong>Consortia ID:</strong> '.$artifactaanr->consortia_id.' <strong>-></strong> '.$request->consortia.'<br>';
            }
            if($artifactaanr->consortia_member_id != $request->consortia_member){
                $temp_changes = $temp_changes.'<strong>Consortia Member ID:</strong> '.$artifactaanr->consortia_member_id.' <strong>-></strong> '.$request->consortia_member.'<br>';
            }
            if($artifactaanr->link != $request->link){
                $temp_changes = $temp_changes.'<strong>Link:</strong> '.$artifactaanr->link.' <strong>-></strong> '.$request->link.'<br>';
            }
            if($artifactaanr->author != $request->author){
                $temp_changes = $temp_changes.'<strong>Author:</strong> '.$artifactaanr->author.' <strong>-></strong> '.$request->author.'<br>';
            }
            if($artifactaanr->embed_link != $request->embed_link){
                $temp_changes = $temp_changes.'<strong>Embed Link:</strong> '.$artifactaanr->embed_link.' <strong>-></strong> '.$request->embed_link.'<br>';
            }
            if($artifactaanr->author_institution != $request->author_institution){
                $temp_changes = $temp_changes.'<strong>Author Insitution:</strong> '.$artifactaanr->author_institution.' <strong>-></strong> '.$request->author_institution.'<br>';
            }
            if($artifactaanr->author_affiliation != $request->author_affiliation){
                $temp_changes = $temp_changes.'<strong>Author Affiliation:</strong> '.$artifactaanr->author_affiliation.' <strong>-></strong> '.$request->author_affiliation.'<br>';
            }
            if($artifactaanr->keywords != $request->keywords){
                $temp_changes = $temp_changes.'<strong>Keywords:</strong> '.$artifactaanr->keywords.' <strong>-></strong> '.$request->keywords.'<br>';
            }
            if($artifactaanr->gad != $request->gad){
                $temp_changes = $temp_changes.'<strong>GAD:</strong> '.$artifactaanr->gad.' <strong>-></strong> '.$request->gad.'<br>';
            }
            if($artifactaanr->imglink != $request->imglink){
                $temp_changes = $temp_changes.'<strong>Image Link:</strong> '.$artifactaanr->imglink.' <strong>-></strong> '.$request->imglink.'<br>';
            }
            if($artifactaanr->is_gad != $request->is_gad){
                $temp_changes = $temp_changes.'<strong>Is GAD?:</strong> '.$artifactaanr->is_gad.' <strong>-></strong> '.$request->is_gad.'<br>';
            }


            $artifactaanr->title = $request->title;
            $artifactaanr->date_published = $request->date_published;
            $artifactaanr->description = $request->description;
            $artifactaanr->content_id = $request->content;
            $artifactaanr->contentsubtype_id = $request->subcontent_type;
            $artifactaanr->consortia_id = $request->consortia;
            $artifactaanr->consortia_member_id = $request->consortia_member;
            $artifactaanr->link = $request->link;
            $artifactaanr->author = $request->author;
            $artifactaanr->embed_link = $request->embed_link;
            $artifactaanr->author_institution = $request->author_institution;
            $artifactaanr->author_affiliation = $request->author_affiliation;
            $artifactaanr->keywords = $request->keywords;
            $artifactaanr->gad = $request->gad;
            $artifactaanr->imglink = $request->imglink;
            $artifactaanr->is_gad = $request->is_gad;
            $artifactaanr->isp()->sync($request->isp);
            $artifactaanr->commodities()->sync($request->commodities);
            if($request->hasFile('file')){
                $pdfFile = $request->file('file');
                $pdfName = uniqid().$pdfFile->getClientOriginalName();
                $pdfFile->move(public_path('/storage/files/'), $pdfName);
                $artifactaanr->file = $pdfName;
                $artifactaanr->file_type = pathinfo(storage_path().'/storage/files/'.$pdfName, PATHINFO_EXTENSION);
            }
            $artifactaanr->save();
            foreach(DB::table('artifactaanr_isp')->where('artifactaanr_id', '=', $artifactaanr->id)->get() as $entry){
                $temp_sector_id = DB::table('isp')->where('id', '=', $entry->isp_id)->first()->sector_id;
                $temp_industry_id = DB::table('sectors')->where('id', '=', $temp_sector_id)->first()->industry_id;
                DB::table('artifactaanr_isp')->where('id', '=', $entry->id)->update(['industry_id' => DB::table('industries')->where('id', '=', $temp_industry_id)->first()->id]);
            }
            foreach(DB::table('artifactaanr_commodity')->where('artifactaanr_id', '=', $artifactaanr->id)->get() as $entry){
                $temp_isp_id = DB::table('commodities')->where('id', '=', $entry->commodity_id)->first()->isp_id;
                $temp_sector_id = DB::table('isp')->where('id', '=', $temp_isp_id)->first()->sector_id;
                $temp_industry_id = DB::table('sectors')->where('id', '=', $temp_sector_id)->first()->industry_id;
                DB::table('artifactaanr_commodity')->where('id', '=', $entry->id)->update(['industry_id' => DB::table('industries')->where('id', '=', $temp_industry_id)->first()->id]);
            }

            $log->user_id = $user->id;
            $log->user_email = $user->email;
            $log->changes = $temp_changes;
            $log->action = 'Edited \''. $artifactaanr->title.'\' details';
            $log->IP_address = $request->ip();
            $log->resource = 'Artifacts';
            $log->save();

            return redirect()->back()->with('success','ArtifactAANR Updated.'); 
        }
    }

    public function addISPIndustryID(Request $request){
        foreach(DB::table('artifactaanr_isp')->all() as $entry){
            $temp_sector_industry_id = DB::table('isp')->where('id', '=', $entry->isp_id)->first()->industry_id;
            $entry->industry_id = DB::table('industry')->where('id', '=', $temp_sector_industry_id)->id;
        }
        return redirect()->back()->with('success','Artifact ISP Industry ID added.'); 
    }

    public function deleteArtifact(Request $request){

        $user = auth()->user();
        $temp_changes = '';
        $log = new Log;
        if($user->role != 5 && $user->role != 1){
            return redirect()->back()->with('error','Your account is not authorized to use this function.'); 
        } else {
            if(!$request->input('artifactaanr_check')){
                return redirect()->back()->with('error','No content selected.');
            } else {
                $temp_changes = 'Deleted: ';
                $artifactaanr = ArtifactAANR::whereIn('id', $request->input('artifactaanr_check'))->get();
                foreach ($artifactaanr as $artifact) {
                    if($artifact->file){
                        $filePath = public_path().'/storage/files/'.$artifact->file;
                        unlink($filePath);
                    }
                    $temp_changes = $temp_changes.$artifact->title.'<br>';
                    $artifact->isp()->detach();
                    $artifact->commodities()->detach();
                    $artifact->delete();
                }

                $log->user_id = $user->id;
                $log->user_email = $user->email;
                $log->changes = $temp_changes;
                $log->action = 'Deleted content';
                $log->IP_address = $request->ip();
                $log->resource = 'Artifacts';
                $log->save();

                return redirect()->back()->with('success','AANR Content Deleted.'); 
            }
        }
    }

    public function deleteSingleArtifact($artifact_id){
        $artifactaanr = ArtifactAANR::find($artifact_id);
        if($artifactaanr->file){
            $filePath = public_path().'/storage/files/'.$artifactaanr->file;
            unlink($filePath);
        }
        $artifactaanr->isp()->detach();
        $artifactaanr->commodities()->detach();
        $artifactaanr->delete();
        return redirect()->back()->with('success','AANR Content Deleted.');
    }

    public function fetchConsortiaMemberDependent(Request $request){
        $consortia_member = $request->get('consortia_member');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = ConsortiaMember::where($consortia_member, $value)->get();
        if($data->count() != 0){
            $output = '<option value="">Select SUC/Unit/Institution</option>';
        } else {
            $output = '<option value=""> ----------------------</option>';
        }
        foreach($data as $row){
            if($row->id == $request->get('consortia_member_id')){
                $output .= '<option value="'.$row->id.'" selected>'.$row->name.'</option>';
            } else {
                $output .= '<option value="'.$row->id.'">'.$row->name.'</option>';
            }
        }
        echo $output;
    }

    public function fetchContentSubtypeDependent(Request $request){
        $content_subtype = $request->get('content_subtype');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = ContentSubtype::all()->where($content_subtype, $value);
        if($data->count() != 0){
            $output = '<option value="">Select '.ucfirst($dependent).'</option>';
        } else {
            $output = '<option value=""> ----------------------</option>';
        }
        foreach($data as $row){
            if($row->id == $request->get('contentsubtype_id')){
                $output .= '<option value="'.$row->id.'" selected>'.$row->name.'</option>';
            } else {
                $output .= '<option value="'.$row->id.'">'.$row->name.$request->get('contentsubtype_id').'</option>';
            }
        }
        echo $output;
    }

    public function fetchCommodityDependent(Request $request){
        $commodity = $request->get('commodity');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = Commodity::all()->where($commodity, $value);
        $output = '<option value="">Select '.ucfirst($dependent).'</option>';
        foreach($data as $row){
            $output .= '<option value="'.$row->id.'">'.$row->name.'</option>';
        }
        echo $output;
    }
}
