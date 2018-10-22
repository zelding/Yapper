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
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

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

    protected $connection = 'mongodb';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id', 'title', 'summary', 'content'
    ];

    /**
     * Attributes that are converted to Carbon (DateTime superset)
     *
     * @var string[]
     */
    protected $dates = [
        'created_at', 'updated_at', 'deleted_at'
    ];
}
