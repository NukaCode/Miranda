<?php

namespace App\Http\Controllers;

abstract class ResourceController extends BaseController
{
    protected $title = 'Not Set';

    protected $property = null;

    protected $model = null;

    public function index()
    {
        $this->setDetails('Dashboards', $this->title);

        $models = $this->model->all();

        $this->setViewData($this->property .'s', $models);
        $this->setJavascriptData($this->property .'s', $models);
    }

    public function show($id)
    {
        $this->setDetails($this->title, 'Details');

        $model = $this->model->findOrFail($id);

        $this->setViewData($this->property, $model);
    }

    public function create()
    {
        $this->setDetails($this->title, 'Create');
    }

    public function edit($id)
    {
        $this->setDetails($this->title, 'Edit');

        $model = $this->model->findOrFail($id);

        $this->setViewData($this->property, $model);
    }
}
