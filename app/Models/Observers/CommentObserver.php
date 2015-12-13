<?php

namespace App\Models\Observers;

class CommentObserver
{

    public function creating($model)
    {
        $model->user_id = auth()->id();
    }

}
