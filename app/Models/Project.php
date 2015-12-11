<?php

namespace App\Models;

class Project extends BaseModel
{
    public $table = 'projects';

    protected $fillable = [
        'name',
        'key_name',
        'description',
        'parent_id'
    ];

    public function issues()
    {
        return $this->hasMany(Issue::class, 'project_id');
    }

    public function parent()
    {
        return $this->belongsTo(Project::class, 'parent_id');
    }

    public function child()
    {
        return $this->hasOne(Project::class, 'parent_id');
    }
}
