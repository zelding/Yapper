<?php

namespace App\Mail;

use App\Entity\BlogPost;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * Class NewBlogPost
 *
 * Notification mail for a new blog post for all users subscribed
 * Queued
 *
 * @package App\Mail
 */
class NewBlogPost extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /** @var BlogPost */
    protected $post;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(BlogPost $post)
    {
        $this->post = $post;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.new_post', ['post' => $this->post]);
    }
}
