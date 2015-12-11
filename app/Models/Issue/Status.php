<?php

namespace App\Models\Issue;

use App\Models\BaseModel;
use App\Models\Issue;

class Status extends BaseModel
{
    public $table = 'issue_statuses';

    protected $fillable = [
        'name',
        'key_name',
        'description',
    ];

    public function issues()
    {
        return $this->hasMany(Issue::class, 'status_id');
    }
}
