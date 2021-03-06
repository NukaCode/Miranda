<?php

namespace App\Http\Controllers;

use App\Http\Requests\Issue\CommentRequest;
use App\Http\Requests\Issue\CreateIssueRequest;
use App\Http\Requests\Issue\UpdateIssueRequest;
use App\Models\Issue;
use App\Models\Project;
use App\Models\Type\CommentType;

class IssueController extends ResourceController
{
    protected $title = 'Issues';

    protected $property = 'issue';

    protected $model;

    public function __construct(Issue $issue)
    {
        parent::__construct();

        $this->model = $issue;

        $faker = \Faker\Factory::create();
        $this->setViewData(compact('faker'));

        $this->setBreadCrumbs([
            'All Issues' => 'issue.index',
            'New Issue'  => 'issue.create',
        ]);
    }

    public function byProject($projectId)
    {
        $issues   = Issue::byProject($projectId)->get();
        $statuses = Issue\Status::all();
        $types    = CommentType::where('key_name', '!=', 'external')->get();

        $this->setViewPath('issue.index');
        $this->setJavascriptData(compact('issues', 'statuses', 'types'));
    }

    public function comment(CommentRequest $request, $id)
    {
        $issue = $this->model->find($id);
        $issue->postComment($request->all());
        $issue = $this->model->find($id);

        return response()->json($issue);
    }

    public function create()
    {
        parent::create();

        $projects = Project::all()->lists('name', 'id');

        $this->setViewData(compact('projects'));
    }

    public function store(CreateIssueRequest $request)
    {
        $this->model->create($request->all());

        return redirect(route('issue.index'))->with('message', 'Issue created.');
    }

    public function update(UpdateIssueRequest $request, $id)
    {
        $issue = $this->model->find($id);
        $issue->update($request->all());

        return response()->json($issue);
    }

    public function delete($id)
    {
        //
    }
}
