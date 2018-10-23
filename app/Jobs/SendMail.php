<?php

namespace App\Jobs;

use App\Entity\BlogPost;
use App\Entity\User;
use App\Mail\NewBlogPost;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class SendMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /** @var BlogPost */
    protected $post;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(BlogPost $post)
    {
        $this->post = $post;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // only notify users who consented
        $users = User::where('notify', 1)->get();

        if ( $users->isNotEmpty() ) {
            Mail::to($users)->queue(new NewBlogPost($this->post));
        }
    }
}
