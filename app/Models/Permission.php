<?php

namespace App\Models;

/**
 * App\Models\Permission
 *
 * @property integer $id
 * @property string $name
 * @property string $label
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \NukaCode\Core\Database\Collection|\App\Models\Role[] $roles
 * @method static \Illuminate\Database\Query\Builder|\NukaCode\Core\Models\BaseModel orderByCreatedAsc()
 * @method static \Illuminate\Database\Query\Builder|\NukaCode\Core\Models\BaseModel orderByNameAsc()
 * @method static \Illuminate\Database\Query\Builder|\NukaCode\Core\Models\BaseModel active()
 * @method static \Illuminate\Database\Query\Builder|\NukaCode\Core\Models\BaseModel inactive()
 * @property mixed $deleted_at
 * @property string $key_name
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Permission whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Permission whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Permission whereKeyName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Permission whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Permission whereUpdatedAt($value)
 */
class Permission extends BaseModel
{
    /**
     * A permission can be applied to roles.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
