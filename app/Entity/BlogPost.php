<?php
/**
 * Yapper
 *
 * @author    lyozsi (kristof.dekany@apex-it-services.eu)
 * @copyright internal usage
 *
 * Date: 10/21/18 11:36 AM
 */

namespace App\Entity;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;
use \Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class BlogPost
 *
 *
 * @mixin Eloquent
 * @package App\Entity
 */
class BlogPost extends Eloquent
{
    use SoftDeletes;

    protected $primaryKey = "_id"; // I don't know why is this lost during inheritence

    protected $connection = 'mongodb';
    protected $collection = 'blog_post';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id', 'title', 'summary', 'content', 'status',
        'created_at', 'updated_at', 'deleted_at'
    ];

    /**
     * Attributes that are converted to Carbon (DateTime superset)
     *
     * @var string[]
     */
    protected $dates = [
        'created_at', 'updated_at', 'deleted_at'
    ];

    public function author() : BelongsTo
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    public function comments() : HasMany
    {
        return $this->hasMany(Comment::class, "post_id");
    }
}
