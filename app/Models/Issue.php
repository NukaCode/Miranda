<?php

namespace App\Models;

use App\Models\Issue\Comment;
use App\Models\Issue\Status;

class Issue extends BaseModel
{
    public $table = 'issues';

    protected static $observer = \App\Models\Observers\IssueObserver::class;

    protected $fillable = [
        'name',
        'key',
        'description',
        'created_by',
        'assigned_to',
        'project_id',
        'status_id',
        'parent_id',
    ];

    protected $appends = [
        'project_name',
        'creator_name',
        'assignee_name',
        'status_name',
        'parsed_description',
    ];

    protected $with = [
        'comments',
    ];

    public function postComment($request)
    {
        $comment = new Comment($request);

        $this->comments()->save($comment);
    }

    public function getProjectNameAttribute()
    {
        return $this->project->name;
    }

    public function getStatusNameAttribute()
    {
        return $this->status->name;
    }

    public function getCreatorNameAttribute()
    {
        return $this->creator->display_name;
    }

    public function getAssigneeNameAttribute()
    {
        return $this->assignee != null ? $this->assignee->display_name : null;
    }

    public function getParsedDescriptionAttribute()
    {
        $parsedown = new \Parsedown();

        return $parsedown->text($this->description);
    }

    public function scopeByProject($query, $projectId)
    {
        return $query->where('project_id', $projectId);
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'issue_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function assignee()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function parent()
    {
        return $this->belongsTo(Issue::class, 'parent_id');
    }

    public function child()
    {
        return $this->hasOne(Issue::class, 'parent_id');
    }
}
