<div class="container-fluid">
  <div class="row">
    <div class="col-md-4">
      <div class="panel panel-dark">
        <div class="panel-heading">
          <h2 class="panel-title">Create a new Project</h2>
        </div>
        <div class="panel-body">
          {!! BootForm::openHorizontal(['sm' => [4, 8], 'md' => [4, 8], 'lg' => [3, 9]])
              ->action( route('project.store') )
           !!}
            {!! BootForm::text('Name <span class="text-danger">*</span>', 'name') !!}
            {!! BootForm::text('Key <span class="text-danger">*</span>', 'key_name')
                ->helpBlock('<span class="text-muted">This cannot be changed later.</span>')
                ->style('text-transform: uppercase;')
            !!}
            {!! BootForm::textarea('Description', 'description')->rows(5) !!}
            {!! BootForm::submit('Save Project')->class('btn btn-primary') !!}
          {!! BootForm::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>
