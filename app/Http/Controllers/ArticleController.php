<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\Etudiant;
use App\Models\User;
use Dompdf\Dompdf;
//use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ArticleController extends Controller
{
    
    
    public function index() {
        $locale = app()->getLocale();  // Récupère la langue courante

        // Récupérer les articles avec les relations 'category' et 'etudiant'
        $articles = Article::with('category', 'etudiant')
            ->orderBy('created_at', 'DESC')  // Trier par date de création
            ->paginate(3);  // Pagination des articles        
        return view('article.index', compact('articles', 'locale'));
    }

       
    public function create() {
        $categories = Category::all(); // Récupérer toutes les catégories
        $etudiants = Etudiant::all(); // Récupérer toutes les étudiants
        return view('article.create', compact('categories', 'etudiants'));
    }

    public function show($id) {
        $article = Article::find($id);

    // Récupérer les traductions pour le titre et le contenu
    $title = __('article.title'); // Traduction du titre
    $content = __('article.content'); // Traduction du contenu

    // Passer l'article et les traductions à la vue
    return view('article.show', compact('article', 'title', 'content'));
    }
    
    public function showConnect($id) {
        $article = Article::find($id);

    // Récupérer les traductions pour le titre et le contenu
    $title = __('article.title'); // Traduction du titre
    $content = __('article.content'); // Traduction du contenu

    // Passer l'article et les traductions à la vue
    return view('article.show-connect', compact('article', 'title', 'content'));
    }


    /**
     * Fonction pour éditer l'article
     */

    public function edit(Article $article) {

    // Si l'utilisateur authentifié n'est pas celui qui a écrit l'article
    if (auth()->user()->etudiant_id !== $article->etudiant_id) {
        abort(403, 'Unauthorized action.');
    }
    $categories = Category::all(); // Récupérer toutes les catégories
    $etudiants = Etudiant::all(); // Récupérer tous les utilisateurs

    //$article->load('etudiant', 'category'); 

    return view('article.edit', compact('article', 'categories', 'etudiants'));
}

    


    public function update(Request $request, Article $article) {
        $locale = app()->getLocale();

        $data = $request->validate([
            'title.en' => 'required|string|max:255',
            'title.fr' => 'required|string|max:255',
            'content.en' => 'required|string|max:5000',
            'content.fr' => 'required|string|max:5000',
            'category_id' => 'required|exists:categories,id',
        ]);

        

        $article->title = $data['title'];
        $article->content = $data['content'];
        $article->category_id = $request->category_id;
        $article->save();

        return redirect()
            ->route('article.show', $article->id)
            ->with('success', __('Article updated successfully!'));
    }


    public function showArticleEtudiant() {
        // Récupérer tous les articles de l'étudiant connecté
        $article = Article::where('etudiant_id', auth()->user()->etudiant->id)->get();

    // Récupérer les traductions pour le titre et le contenu
    $title = __('article.title'); // Traduction du titre
    $content = __('article.content'); // Traduction du contenu

    // Passer l'article et les traductions à la vue
    
        $articles = Article::where('etudiant_id', auth()->user()->etudiant->id)->get();
        return view('article.show', compact('article', 'title', 'content'));
    }

    public function store(Request $request) {
        $data = $request->validate([
            'title.en' => 'required|string|max:255',
            'title.fr' => 'required|string|max:255',
            'content.en' => 'required|string|max:5000',
            'content.fr' => 'required|string|max:5000',
            'category_id' => 'required|exists:categories,id',  // Assurer que la catégorie existe
        ]);
        /*// Créer un nouvel article
        $article = new Article();
        $article->title = $data['title'];  // Associer les titres multilingues
        $article->content = $data['content'];  // Associer les contenus multilingues
        $article->category_id = $request->category_id;*/

        // Vérifier si l'utilisateur est authentifié
        $user = auth()->user();
    if ($user && $user->etudiant_id) {
            // Créer un nouvel article
            $article = new Article();
            $article->title = $data['title'];
            $article->content = $data['content'];
            $article->category_id = $request->category_id;
            // Associer l'article à l'étudiant via `etudiant_id`
            $article->etudiant_id = $user->etudiant_id;  // Utiliser l'`etudiant_id` de l'utilisateur connecté
            // Sauvegarder l'article
            $article->save();
            return redirect()->route('article.index')->with('success', __('Article created successfully!'));
        
    }else {
            return back()->withErrors(['user' => 'Vous devez être connecté pour créer un article.']);
        }        
        // Retourner à la liste des articles avec un message de succès
        return redirect()->route('article.index')->with('success', __('Article created successfully!'));
    }

    public function destroy(Article $article)
    {
        $this->authorize('delete-article');        
        $article->delete();
        return redirect()->route('article.index')->withSuccess('Article supprimé avec succès!');
    }

    public function pdf(Article $article)
    {
        //$qrCode = QrCode::size(200)->generate(route('article.show', $article->id));
        // return $qrCode;
        $pdf = new Dompdf();
        $pdf->setPaper('letter', 'portrait');
        $pdf->loadHtml(view('article.show-pdf', ["article" => $article/*, "qrCode" => $qrCode*/]));
        $pdf->render();
        return $pdf->stream('article_'.$article->id.'.pdf');
    }
}