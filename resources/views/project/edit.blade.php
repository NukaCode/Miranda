<div class="container-fluid">
  <div class="row">
    <div class="col-md-4">
      <div class="panel panel-dark">
        <div class="panel-heading">
          <h2 class="panel-title">Updating {!! $project->name !!}</h2>
        </div>
        <div class="panel-body">
          {!! BootForm::openHorizontal(['sm' => [4, 8], 'md' => [4, 8], 'lg' => [3, 9]])
              ->action( route('project.update', $project->id) )->put()
          !!}
            {!! BootForm::text('Name <span class="text-danger">*</span>', 'name', $project->name) !!}
            {!! BootForm::textarea('Description', 'description')->value($project->description)->rows(5) !!}
            {!! BootForm::submit('Save Project')->class('btn btn-primary') !!}
          {!! BootForm::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>
