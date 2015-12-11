<?php

namespace App\Models;

use App\Traits\HasRoles;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Support\Facades\Hash;

/**
 * App\Models\User
 *
 * @property integer                                              $id
 * @property string                                               $email
 * @property string                                               $password
 * @property string                                               $first_name
 * @property string                                               $last_name
 * @property string                                               $remember_token
 * @property \Carbon\Carbon                                       $created_at
 * @property \Carbon\Carbon                                       $updated_at
 * @property string                                               $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|Role[] $roles
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereFirstName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereLastName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\NukaCode\Core\Models\BaseModel orderByCreatedAsc()
 * @method static \Illuminate\Database\Query\Builder|\NukaCode\Core\Models\BaseModel orderByNameAsc()
 * @method static \Illuminate\Database\Query\Builder|\NukaCode\Core\Models\BaseModel active()
 * @method static \Illuminate\Database\Query\Builder|\NukaCode\Core\Models\BaseModel inactive()
 */
class User extends BaseModel implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword, SoftDeletes, HasRoles;

    protected $table = 'users';

    protected $fillable = [
        'email',
        'password',
        'display_name',
        'first_name',
        'last_name',
    ];

    protected $hidden = [
        'remember_token',
        'password',
    ];

    /**
     * Make sure to hash the user's password on save
     *
     * @param string $value The value of the attribute (Auto Set)
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Get the e-mail address where password reminders are sent.
     *
     * @return string
     */
    public function getReminderEmail()
    {
        return $this->email;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }
}
