<?php

namespace App\Models\Type;

use App\Models\BaseModel;
use App\Models\Issue;

class CommentType extends BaseModel
{
    public $table = 'issue_comment_types';

    protected $fillable = [
        'name',
        'key_name',
        'description',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class, 'type_id');
    }
}
