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
    public function index(Request $request) : View
    {
        // TODO: paginate

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
