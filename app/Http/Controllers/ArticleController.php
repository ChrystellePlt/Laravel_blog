<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class ArticleController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();

        return view('articles.index', compact('articles'));
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|string',
            'description'=> 'required|string',
        ]);

        $image = $request->file('imagearticle');
        $extension = $image->getClientOriginalExtension();
        Storage::disk('public')->put($image->getFilename().'.'.$extension,  File::get($image));

        $article = new Article([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
        ]);

        $article->mime = $image->getClientMimeType();
        $article->original_filename = $image->getClientOriginalName();
        $article->filename = $image->getFilename().'.'.$extension;
        $article->save();
        
        return redirect('/articles')->with('success', 'L\'article a bien été ajouté');
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);

        return view('articles.show', compact('article'));
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);

        return view('articles.edit', compact('article'));
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required|string',
            'description'=> 'required|string',
        ]);

        $article = Article::find($id);
        $article->title = $request->get('title');
        $article->description = $request->get('description');
        $article->save();

        return redirect('/articles')->with('success', 'L\'article a bien été modifié');
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();

        return redirect('/articles')->with('success', 'L\'article a bien été supprimé.');
    }
}
