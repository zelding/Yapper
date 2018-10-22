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

        // why the fuck is it working here and not in the fcking seeder?!
        \App\Entity\BlogPost::create([
             "title"      => "Trying to save things here",
             "summary"    => "It seems that DBeaver can only update one cell at the time",
             "content"    => "MongoDB is a free and open-source cross-platform document-oriented database program. Classified as a NoSQL database program, MongoDB uses JSON-like documents with schemata. MongoDB is developed by MongoDB Inc., and is published under a combination of the Server Side Public License and the Apache License. ",
             "status"     => 1,
             "user_id"    => 1,
             "created_at" => "2018-10-22 12:12:12",
             "updated_at" => null,
             "deleted_at" => null
         ]);

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
