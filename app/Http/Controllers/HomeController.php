<?php

namespace App\Http\Controllers;

use App\Models\Article;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $latestNews = Article::latest()->take(2)->get();
        $lastNews = Article::latest()->take(3)->get();
        // $cricketNews = Article::where('Subcategory', 'cricket')->latest()->get();
        $cricketNews = Article::whereHas('subcategory', function ($query) {
            $query->where('name', 'cricket');
        })->latest()->get();
        $footballNews = Article::whereHas('subcategory', function ($query) {
            $query->where('name', 'football');
        })->latest()->get();
        $topView = Article::orderByDesc('views')->limit(3)->get();

        $otherSportsNews = Article::whereHas('category', function ($query) {
            $query->where('name', 'sports');
        })
            ->whereHas('subcategory', function ($query) {
                $query->whereNotIn('name', ['cricket', 'football']);
            })
            ->latest()
            ->get();


        return view('welcome', compact('latestNews', 'lastNews', 'cricketNews', 'footballNews', 'topView', 'otherSportsNews'));
        // dd($latestNews);
    }
    public function details($id)
    {
        $lastNews = Article::latest()->take(3)->get();
        $news = Article::findOrFail($id);
        $news->increment('views');
        return view('news_details', compact('news', 'lastNews'));
    }
}
