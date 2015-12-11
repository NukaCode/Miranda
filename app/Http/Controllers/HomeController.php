<?php

namespace App\Http\Controllers;

class HomeController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->setDetails('Dashboards', 'Overview');
    }

}
