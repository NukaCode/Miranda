<?php

namespace App\Http\Controllers;

class UserController extends BaseController
{
    public function __construct()
    {
        parent::__construct();

        $this->setBreadCrumbs([
            //
        ]);
    }

    public function index()
    {
        $this->setDetails('Dashboards', 'Users');
    }

    public function show($id)
    {
        $this->setDetails('Users', 'Details');
    }

    public function create()
    {
        $this->setDetails('Users', 'Create');
    }

    public function store()
    {
        //
    }

    public function edit($id)
    {
        $this->setDetails('Users', 'Edit');
    }

    public function update($id)
    {
        //
    }

    public function delete($id)
    {
        //
    }
}
