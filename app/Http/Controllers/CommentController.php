<?php

namespace App\Http\Controllers;

use App\Entity\BlogPost;
use App\Entity\Comment;
use App\Http\Requests\CreateComment;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

/**
 * Class CommentController
 *
 * Controller to handle Comment things, so far only creation
 *
 * @package App\Http\Controllers
 */
class CommentController extends Controller
{
    /**
     * @param CreateComment $request
     * @param BlogPost      $post
     *
     * @return RedirectResponse
     */
    public function store(CreateComment $request, BlogPost $post) : RedirectResponse
    {
        $comment = new Comment();
        $comment->content    = $request->get('comment');
        $comment->post_id    = $post->_id;
        $comment->user_id    = Auth::user()->id;
        $comment->created_at = new Carbon();
        $comment->save();

        return redirect()->route('post.show', ['post' => $post])
                         ->with('status', 'Comment added successfully');
    }

}
