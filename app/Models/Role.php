<?php

namespace App\Models;

/**
 * App\Models\Role
 *
 * @property integer $id
 * @property string $name
 * @property string $label
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \NukaCode\Core\Database\Collection|\App\Models\Permission[] $permissions
 * @method static \Illuminate\Database\Query\Builder|\NukaCode\Core\Models\BaseModel orderByCreatedAsc()
 * @method static \Illuminate\Database\Query\Builder|\NukaCode\Core\Models\BaseModel orderByNameAsc()
 * @method static \Illuminate\Database\Query\Builder|\NukaCode\Core\Models\BaseModel active()
 * @method static \Illuminate\Database\Query\Builder|\NukaCode\Core\Models\BaseModel inactive()
 * @property mixed $deleted_at
 */
class Role extends BaseModel
{
    /**
     * A role may be given various permissions.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    /**
     * Grant the given permission to a role.
     *
     * @param  Permission $permission
     * @return mixed
     */
    public function givePermissionTo(Permission $permission)
    {
        return $this->permissions()->save($permission);
    }
}
