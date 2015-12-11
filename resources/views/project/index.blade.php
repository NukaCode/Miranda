<div class="container-fluid">
  @foreach ($projects->chunk(4) as $projectGroup)
    <div class="row">
      @foreach ($projectGroup as $project)
        <div class="col-md-3">
          <div class="panel panel-dark slim-panel project-panel">
            <div class="panel-heading">
              <h3 class="panel-title clearfix">
                <div class="pull-left">
                  {!! $project->name !!}
                </div>
                <div class="pull-right">
                  <div class="dropdown">
                    <i class="fa fa-cog" id="settings_{!! $project->id !!}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="settings_{!! $project->id !!}">
                      <li><a href="{!! route('project.show', $project->id) !!}">Dashboard</a></li>
                      <li><a href="{!! route('project.edit', $project->id) !!}">Edit</a></li>
                      <li><a>Team</a></li>
                      <li role="separator" class="divider"></li>
                      <li><a href="{!! route('project.destroy', $project->id) !!}" data-method="delete">Delete</a></li>
                    </ul>
                  </div>
                </div>
              </h3>
            </div>
            <div class="panel-body">
              <div class="statcard statcard-primary p-a" style="display: inline-block; width: 30%;">
                <h3 class="statcard-number">0</h3>
                <span class="statcard-desc">Open</span>
              </div>
              <div class="statcard statcard-success p-a" style="display: inline-block; width: 38%;">
                <h3 class="statcard-number">0</h3>
                <span class="statcard-desc">In&nbsp;Progress</span>
              </div>
              <div class="statcard statcard-danger p-a" style="display: inline-block; width: 30%;">
                <h3 class="statcard-number">0</h3>
                <span class="statcard-desc">Closed</span>
              </div>
            </div>
            <div class="panel-footer">
              <div class="btn-group btn-group-justified">
                <a href="{!! route('project.issues', $project->id) !!}" class="btn btn-default">Issues</a>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  @endforeach
</div>
