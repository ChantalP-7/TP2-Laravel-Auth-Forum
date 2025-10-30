<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function create() {
        return view('article.create');
    }

    public function store(Request $request) {
        $request->validate([
            'title.en' => 'required|string|max:255',
            'title.fr' => 'required|string|max:255',
            'content.en' => 'required|string|max:3000',
            'content.fr' => 'required|string|max:3000',
        ]);

         $article = Article::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);

        return redirect()->route('article.create')->with('success', 'Article added sucessfully !');
    }
}
