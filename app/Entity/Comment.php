<?php
/**
 * Yapper
 *
 * @author    lyozsi (kristof.dekany@apex-it-services.eu)
 * @copyright internal usage
 *
 * Date: 10/22/18 3:15 PM
 */

namespace App\Entity;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use \Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Comment
 *
 * @mixin Eloquent
 * @package App\Entity
 */
class Comment extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'blog_comment';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id', 'content', 'post_id',
        'created_at', 'updated_at'
    ];

    /**
     * Attributes that are converted to Carbon (DateTime superset)
     *
     * @var string[]
     */
    protected $dates = [
        'created_at', 'updated_at'
    ];

    /**
     * updated timestamps on related entities
     *
     * @var string[]
     */
    protected $touches = [
        'post'
    ];

    /**
     * the post its attached to
     *
     * @return BelongsTo
     */
    public function post() : BelongsTo
    {
        return $this->belongsTo(BlogPost::class);
    }

    /**
     * The user that made the remark
     *
     * @return BelongsTo
     */
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }
}
