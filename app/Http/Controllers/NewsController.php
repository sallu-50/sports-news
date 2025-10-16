<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function index()
    {
        $latestNews = Article::latest()->take(2)->get();
        return view('news.index', compact('latestNews'));
    }

    public function news()
    {
        return view('news_details');  // news_details.blade.php রিটার্ন হবে
    }

    public function showByCategory(Category $category)
    {
        $articles = $category->articles()->latest()->paginate(10);
        return view('category.show', compact('category', 'articles'));
    }
}
