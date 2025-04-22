<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $query = $request->input('query');

        if (empty($query)) {
            return redirect()->route('home');
        }

        $results = Article::query()
            ->where('title', 'LIKE', "%{$query}%")
            // ->orWhereHas('category', function ($q) use ($query) {
            //     $q->where('name', 'LIKE', "%{$query}%");
            // })
            // ->orWhereHas('subcategory', function ($q) use ($query) {
            //     $q->where('name', 'LIKE', "%{$query}%");
            // })
            ->get(['id', 'title', 'slug']);

        return view('search.result', compact('results'));
    }

    public function show($value)
    {
        $article = Article::where('slug', $value)
            ->orWhere('title', $value)
            ->firstOrFail();

        // Title er keyword gulo alada korchi
        $keywords = explode(' ', $article->title);

        // Related articles ber kora
        $relatedArticles = Article::where('id', '!=', $article->id)
            ->where(function ($query) use ($keywords) {
                foreach ($keywords as $word) {
                    $query->orWhere('title', 'like', "%{$word}%");
                }
            })
            ->limit(5) // joto gula dekhate chao
            ->get();

        return view('search.result', compact('article', 'relatedArticles'));
    }
}
