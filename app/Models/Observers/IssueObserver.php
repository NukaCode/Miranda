<?php

namespace App\Models\Observers;

use App\Models\Project;

class IssueObserver
{

    public function creating($model)
    {
        $project = Project::find($model->project_id);

        $model->key        = $project->key_name . '-' . ($project->issues()->count() + 1);
        $model->created_by = auth()->id();
    }

}
