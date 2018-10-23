<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Jenssegers\Mongodb\Eloquent\HybridRelations;
use \Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class User
 *
 * @package App
 *
 * @property int $id
 * @property string $name
 * @property string $display_name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entity\BlogPost[] $blogPosts
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 *
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Entity\User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\User permission($permissions)
 * @method static bool|null restore()
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\User role($roles)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\User whereDisplayName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\User whereUpdatedAt($value)
 *
 * @method static \Illuminate\Database\Query\Builder|\App\Entity\User withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Entity\User withoutTrashed()
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use Notifiable, HybridRelations, SoftDeletes, HasRoles;

    protected $connection = 'mysql';

    /**
     * Needed for the HasRoles trait
     *
     * @var string
     */
    protected $guard_name = 'web';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'display_name'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = [
        'created_at', 'updated_at', 'deleted_at'
    ];

    public function posts() : HasMany
    {
        return $this->hasMany(BlogPost::class);
    }
}
