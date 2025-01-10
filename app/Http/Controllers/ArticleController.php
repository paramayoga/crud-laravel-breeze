<?php

namespace App\Http\Controllers;
use App\Models\Article;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
{
    $articles = Article::all();
    return response()->json($articles);
}

public function store(Request $request)
{
    $article = Article::create($request->all());
    return response()->json($article);
}

public function update(Request $request, $id)
{
    $article = Article::find($id);
    $article->update($request->all());
    return response()->json($article);
}

public function destroy($id)
{
    $article = Article::find($id);
    $article->delete();
    return response()->json('Deleted successfully');
}
}
