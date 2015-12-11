<?php

namespace App\Http\Controllers;

use App\Http\Requests\Project\CreateProjectRequest;
use App\Http\Requests\Project\UpdateProjectRequest;
use App\Models\Project;

class ProjectController extends ResourceController
{
    protected $title = 'Projects';

    protected $property = 'project';

    protected $model;

    public function __construct(Project $project)
    {
        parent::__construct();

        $this->model = $project;

        $this->setBreadCrumbs([
            'List'   => 'project.index',
            'Create' => 'project.create',
        ]);
    }

    public function store(CreateProjectRequest $request)
    {
        $this->model->create($request->all());

        return redirect(route('project.index'))->with('message', 'Project was created.');
    }

    public function update(UpdateProjectRequest $request, $id)
    {
        $project = $this->model->findOrFail($id);
        $data    = array_merge($request->all());
        $project->update($data);

        return redirect(route('project.index'))->with('message', 'Project was updated.');
    }

    public function destroy($id)
    {
        $project = $this->model->findOrFail($id);
        $project->delete();

        return redirect(route('project.index'))->with('message', 'Project deleted.');
    }
}
