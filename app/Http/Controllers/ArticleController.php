<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show', 'articleSearch', 'byCategory', 'indexFilter');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->get();
        $categories = Category::all();
        return view('article.index', compact('articles', 'categories'));
    }

    public function indexFilter(Request $request)
    {
        $selezionaPerCategoria = $request->input('byCategory');
        $selezionaPerData = $request->input('byDate');
        $selezionaPerTempoLettura = $request->input('byReadTime');

        $query = Article::where('is_accepted', true);

        // query categoria
        if ($selezionaPerCategoria) {
            $query->where('category_id', $selezionaPerCategoria);
        }

        //query per data
        if ($selezionaPerData === 'asc') {
            $query->orderBy('created_at', 'asc');
        } elseif ($selezionaPerData === 'desc') {
            $query->orderBy('created_at', 'desc');
        }
        
        $articles = $query->get();


        // query per tempo di lettura
        if ($selezionaPerTempoLettura) {
            $articles = $articles->filter(function ($article) use ($selezionaPerTempoLettura) {
                $timeToReadArticle = $article->readDuration();
    
                if ($selezionaPerTempoLettura == 'less_equal_5' && $timeToReadArticle <= 5) {
                    return true;
                } elseif ($selezionaPerTempoLettura == 'between_5_10' && $timeToReadArticle < 10 && $timeToReadArticle > 5) {
                    return true;
                } elseif ($selezionaPerTempoLettura == 'less_equal_15' && $timeToReadArticle < 15 && $timeToReadArticle > 10) {
                    return true;
                }
    
                return false;
            });
        }
        return view('article.index', compact('articles'))->with($request->input());
    }



    public function articleSearch(Request $request)
    {
        $query = $request->input('query');
        $articles = Article::search($query)->where('is_accepted', true)->orderBy('created_at', 'desc')->get();
        return view('article.search-index', compact('articles', 'query'));
    }

    public function byCategory(Category $category)
    {
        $articles = $category->articles()->where('is_accepted', true)->orderBy('created_at', 'desc')->get();
        return view('article.by-category', compact('category', 'articles'));
    }

    public function byUser(User $user)
    {
        $articles = $user->articles()->where('is_accepted', true)->orderBy('created_at', 'desc')->get();
        return view('article.by-user', compact('user', 'articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('article.create');
    }

    // SOSTITUITA CON LIVEWIRE
    /* public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:articles|min:5',
            'subtitle' => 'required|min:5',
            'body' => 'required|min:10',
            'image' => 'image|required',
            'category' => 'required',
            'tags' => 'required',

        ]);

        $article = Article::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'body' =>  $request->body,
            'image' =>  $request->file('image')->store('public/images'),
            'category_id' =>  $request->category,
            'user_id' => Auth::user()->id,
            'slug' => Str::slug($request->title),
        ]);

        $tags = explode(',', $request->tags);

        foreach ($tags as $i => $tag) {
            $tags[$i] = trim($tag);
        }

        foreach ($tags as $tag) {
            $newTag = Tag::updateOrCreate(['name' => $tag], ['name' => strtolower($tag)]);
            $article->tags()->attach($newTag);
        }

        return redirect(route('home'))->with('message', 'Articolo creato correttamente');
    } */


    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
/*     public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|min:5|unique:articles,title,' . $article->id,
            'subtitle' => 'required|min:5',
            'body' => 'required|min:10',
            'category' => 'required',
            'tags' => 'required',

        ]);

        $article->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'body' =>  $request->body,
            'category_id' =>  $request->category,
            'is_accepted' => NULL,
            'slug' => Str::slug($request->title),
        ]);

        if ($request->image) {
            Storage::delete($article->image);
            $article->update([
                'image' => $request->file('image')->store('public/image'),
            ]);
        }

        $tags = explode(',', $request->tags);

        foreach ($tags as $i => $tag) {
            $tags[$i] = trim($tag);
        }

        $newTags = [];

        foreach ($tags as $tag) {
            $newTag = Tag::updateOrCreate(['name' => $tag], ['name' => strtolower($tag)]);
            $newTags[] = $newTag->id;
        }
        $article->tags()->sync($newTags);

        return redirect(route('writer.dashboard'))->with('message', 'Hai aggiornato correttamente l\'articolo scelto');
    } */


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        foreach ($article->tags as $tag) {
            $article->tags()->detach($tag);
        }

        $article->delete();


        return redirect(route('writer.dashboard'))->with('message', 'Hai eliminato correttamente l\'articolo scelto');
    }
}
