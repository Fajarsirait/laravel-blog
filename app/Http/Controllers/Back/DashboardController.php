<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Role;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('back.dashboard.index', [
            'total_article'    => Article::count(),
            'total_categories' => Category::count(),
            'latest_articles'   => Article::with('Categories')->whereStatus(1)->latest()->take(5)->get(),
            'popular_articles'   => Article::with('Categories')->whereStatus(1)->orderBy('views', 'desc')->take(5)->get(),
        ]);
    }
}
