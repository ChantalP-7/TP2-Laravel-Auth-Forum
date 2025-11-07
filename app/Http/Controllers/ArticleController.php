<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index() {        
        $articles = Article::select()->with('category', 'user')
            ->orderby('created_at', 'DESC')->paginate(12);
        return view('article.index', compact('articles'));       
    }
    
    public function create() {
        $categories = Category::all(); // Récupérer toutes les catégories
        return view('article.create', compact('categories'));
    }

    public function store(Request $request) {

        $validate = $request->validate([
            'title.en' => 'required|string|max:255',
            'title.fr' => 'required|string|max:255',
            'content.en' => 'required|string|max:5000',
            'content.fr' => 'required|string|max:5000',
            'category_id' => 'required|exists:categories,id',
        ]);

        $article = new Article();
        $article->setTranslation('title', 'en', $request->input('title.en'));
        $article->setTranslation('title', 'fr', $request->input('title.fr'));
        $article->setTranslation('content', 'en', $request->input('content.en'));
        $article->setTranslation('content', 'fr', $request->input('content.fr'));
        $article->category_id = $request->category_id;
        $article->save();

        // Sauvegarde les traductions pour chaque langue (en, fr)
        foreach (['en', 'fr'] as $lang) {
            $article->setTranslation('title', $lang, $validate['title'][$lang]);
            $article->setTranslation('content', $lang, $validate['content'][$lang]);
        }

        return redirect()
            ->route('article.show', $article->id)
            ->with('success', __('Article created successfully!'));
    }

    public function show(Article $article) {    
    $article->load('category');  // Charger la catégorie associée

    // Vérifie si la catégorie existe
    dd($article->category);  // Cela va afficher la catégorie de l'article

    return view('articles.show', compact('article'));
}
    
    public function edit(Article $article) {
        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article) {
        $validated = $request->validate([
            'title.en' => 'required|string|max:255',
            'title.fr' => 'required|string|max:255',
            'content.en' => 'required|string|max:5000',
            'content.fr' => 'required|string|max:5000',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Sauvegarder les traductions pour chaque langue (en, fr)
        foreach (['en', 'fr'] as $lang) {
            $article->setTranslation('title', $lang, $validated['title'][$lang]);
            $article->setTranslation('content', $lang, $validated['content'][$lang]);
        }

        $article->category_id = $validated['category_id'];
        $article->save();

        return redirect()
            ->route('article.show', $article->id)
            ->with('success', __('Article updated successfully!'));
    }

    public function destroy(Article $article)
    {
        // Supprimer l'article
        $article->delete();
        return redirect()->route('article.index')->withSuccess('Article supprimé avec succès!');
    }
}