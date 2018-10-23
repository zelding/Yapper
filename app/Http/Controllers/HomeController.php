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
        // guards, permissions ?
    }

    /**
     * Show the application dashboard.
     *
     * @param Request $request future filters
     *
     * @return View
     */
    public function index(Request $request) : View
    {
        // TODO: paginate, filter

        $recentPosts = BlogPost::with("author", "comments.user")
                               ->where('status', 1)
                               ->orderBy('created_at', 'desc')
                               ->take(10)
                               ->get();

        return view('home', [
            'posts' => $recentPosts
        ]);
    }
}
