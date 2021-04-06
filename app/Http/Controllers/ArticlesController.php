<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function addArticle(Request $request){
        $this->validate($request, array(
            'title' => 'required|max:255'
        ));

        $user = auth()->user();
        $article = new Article;
        $article->title = $request->title;
        $article->industry_id = $request->industry;
        $article->save();

        return redirect()->back()->with('success','Article Added.'); 
    }
    
    public function editArticle(Request $request, $article_id){
        $this->validate($request, array(
            'title' => 'required|max:255'
        ));
        
        $user = auth()->user();
        $article = Article::find($article_id);
        $article->title = $request->title;
        $article->industry_id = $request->industry;
        $article->save();

        return redirect()->back()->with('success','Article Updated.'); 
    }

    public function deleteArticle($article_id, Request $request){
        $article = Article::find($article_id);
        $deletedName = $article->name;
        $article->delete();

        return redirect()->back()->with('success','Article Deleted.'); 
    }
}
