<?php

namespace App\Http\Controllers;

use App\Entity\BlogPost;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return View
     */
    public function index(Request $request)
    {
        // TODO: paginate

        $recentPosts = BlogPost::with("author")
                               ->where('status', 1)
                               ->take(10)
                               ->orderBy('created_at', 'desc')
                               ->get();

        return view('home', [
            'posts' => $recentPosts
        ]);
    }
}
