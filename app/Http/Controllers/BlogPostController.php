<?php

namespace App\Http\Controllers;

use App\Entity\BlogPost;
use App\Entity\User;
use App\Http\Requests\DeleteBlogPost;
use App\Http\Requests\StoreBlogPost;
use App\Http\Requests\UndeleteBlogPost;
use App\Http\Requests\UpdateBlogPost;
use App\Jobs\SendMail;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

/**
 * Class BlogPostController
 *
 * @package App\Http\Controllers
 */
class BlogPostController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin')
             ->except([
                 'show',
                 'user'
             ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() : View
    {
        // TODO: paginate

        $posts = BlogPost::withTrashed()->get();

        return view('blog_post.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response|View
     */
    public function create() : View
    {
        return view('blog_post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreBlogPost $request
     * @return Response
     */
    public function store(StoreBlogPost $request) : RedirectResponse
    {
        $post = new BlogPost();
        $post->title      = $request->get('title');
        $post->summary    = $request->get('summary');
        $post->content    = $request->get('content');
        $post->user_id    = Auth::user()->id;
        $post->status     = $request->get('status', 0);
        $post->created_at = new Carbon();
        $post->save();
        $post->refresh();

        if ( $post->status ) {
            SendMail::dispatch($post);
        }

        return redirect()->route('post.show', ['post' => $post])
                         ->with('status', 'saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  BlogPost $post
     * @return Response
     */
    public function show(BlogPost $post) : View
    {
        $post->load("comments.user");

        return view('blog_post.show', [
            "post" => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param BlogPost $post
     * @return Response
     */
    public function edit(BlogPost $post) : View
    {
        return view('blog_post.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateBlogPost  $request
     * @param BlogPost        $post
     *
     * @return Response
     */
    public function update(UpdateBlogPost $request, BlogPost $post) : RedirectResponse
    {
        $post->title      = $request->get('title');
        $post->summary    = $request->get('summary');
        $post->content    = $request->get('content');
        $post->status     = $request->get('status', 0);
        $post->updated_at = new Carbon();
        $post->save();

        return redirect()->route('post.show', ['post' => $post])
                         ->with('status', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteBlogPost $request
     * @param  BlogPost       $post
     *
     * @return Response
     */
    public function destroy(DeleteBlogPost $request, BlogPost $post) : RedirectResponse
    {
        $post->deleted_at = new Carbon();
        $post->save();

        return redirect()->route('home')
                         ->with('status', 'Deleted successfully');
    }

    /**
     * Restore a soft-deleted post
     *
     * @param UndeleteBlogPost $request
     * @param BlogPost         $post
     *
     * @return RedirectResponse
     */
    public function undelete(UndeleteBlogPost $request, BlogPost $post) : RedirectResponse
    {
        $post->deleted_at = null;
        $post->status = 0;
        $post->save();

        return redirect()->route('post.show', ['post' => $post])
                         ->with('status', 'Restored successfully');
    }

    /**
     * Show posts of a given author
     *
     * @param User $user
     * @return Response|View
     */
    public function user(User $user) : View
    {
        // TODO: paginate

        $recentPosts = BlogPost::with("author")
                               ->where('user_id', $user->id)
                               ->where('status', 1)
                               ->take(10)
                               ->orderBy('created_at', 'desc')
                               ->get();

        return view('home', [
            'posts' => $recentPosts
        ]);
    }
}
