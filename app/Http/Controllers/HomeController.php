<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request, Category $category = null)
    {
        if ($category && $category->exists) {
            $categoryArticles = $category->articles()->latest()->paginate(10);
            return view('welcome', compact('category', 'categoryArticles'));
        }

        $latestNews = Article::latest()->take(2)->get();
        $lastNews = Article::latest()->take(3)->get();
        
        // HomeController@index
        $cricketNews = Article::whereHas('category', function ($query) {
            $query->where('name', 'ক্রিকেট'); // category name "ক্রিকেট"
        })
        ->latest()
        ->get();

        
        $footballNews = Article::whereHas('category', function ($query) {
            $query->where('name', 'ফুটবল');
        })->latest()->get();
        
        $topView = Article::orderByDesc('views')->limit(3)->get();

        $otherSportsNews = Article::whereHas('category', function ($query) {
            $query->where('name', 'বক্সিং'); // Assuming 'Boxing' is an example of 'other sports'
        })
            ->latest()
            ->get();

        return view('welcome', compact('latestNews', 'lastNews', 'cricketNews', 'footballNews', 'topView', 'otherSportsNews'));
    }
    public function details($id)
    {
        $lastNews = Article::latest()->take(3)->get();
        $news = Article::findOrFail($id);
        $news->increment('views');
        return view('news_details', compact('news', 'lastNews'));
    }
}
