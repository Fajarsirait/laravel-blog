<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $keyword = request()->keyword;

        if ($keyword) {
            $articles = Article::with('Categories')
                ->whereStatus(1)
                ->where('title', 'like', "%{$keyword}%")
                ->latest()
                ->paginate(3);
        } else {
            $articles = Article::with('Categories')->whereStatus(1)->latest()->paginate(4);
        }
        return view('front.home.index', [
            'latest_post' => Article::latest()->first(),
            'articles' => $articles,
            'categories' => Category::latest()->get()
        ]);
    }
}
