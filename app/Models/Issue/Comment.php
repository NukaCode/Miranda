<?php

namespace App\Models\Issue;

use App\Models\BaseModel;
use App\Models\Issue;
use App\Models\Type\CommentType;
use App\Models\User;
use Thomaswelton\LaravelGravatar\Facades\Gravatar;

class Comment extends BaseModel
{
    public $table = 'issue_comments';

    protected static $observer = \App\Models\Observers\CommentObserver::class;

    protected $fillable = [
        'user_id',
        'issue_id',
        'type_id',
        'body',
    ];

    protected $appends = [
        'created_at_readable',
        'avatar',
    ];

    protected $with = [
        'user',
    ];

    public function getCreatedAtReadableAttribute()
    {
        return $this->created_at->format('F jS Y h:ia');
    }

    public function getAvatarAttribute()
    {
        return Gravatar::src($this->user->email, 30);
    }

    public function issue()
    {
        return $this->belongsTo(Issue::class, 'issue_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function type()
    {
        return $this->belongsTo(CommentType::class, 'type_id');
    }
}
