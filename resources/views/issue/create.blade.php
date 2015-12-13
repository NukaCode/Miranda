<div class="container-fluid">
  <div class="row">
    <div class="col-md-4">
      <div class="panel panel-dark">
        <div class="panel-heading">
          <h2 class="panel-title">Create a new Issue</h2>
        </div>
        <div class="panel-body">
          {!! BootForm::openHorizontal(['sm' => [4, 8], 'md' => [4, 8], 'lg' => [3, 9]])
              ->action( route('issue.store') )
           !!}
            {!! BootForm::hidden('status_id', 1) !!}
            {!! BootForm::text('Title <span class="text-danger">*</span>', 'name') !!}
            {!! BootForm::select('Project <span class="text-danger">*</span>', 'project_id')
                ->options($projects)
            !!}
            {!! BootForm::textarea('Description', 'description')->rows(5) !!}
            {!! BootForm::submit('Save Project')->class('btn btn-primary') !!}
          {!! BootForm::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>
