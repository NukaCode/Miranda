<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use NukaCode\Core\Controllers\BaseController as CoreBaseController;
use NukaCode\Menu\DropDown;
use NukaCode\Menu\Link;
use Thomaswelton\LaravelGravatar\Facades\Gravatar;

abstract class BaseController extends CoreBaseController
{
    use DispatchesJobs, ValidatesRequests, AuthorizesRequests;

    public function __construct()
    {
        parent::__construct();

        $this->setJavascriptData('csrfToken', csrf_token());

        $this->setIconMenu();
        $this->setRightMenu();
    }

    protected function setPageTitle($pageTitle)
    {
        $this->setViewData(compact('pageTitle'));
    }

    private function setIconMenu()
    {
        $iconMenu = \Menu::getMenu('iconMenu');

        $iconMenu->link('home', function (Link $link) {
            $link->name = 'Overview';
            $link->url  = route('home');
            $link->icon = 'fa fa-home';
        });
        $iconMenu->link('projects', function (Link $link) {
            $link->name = 'Projects';
            $link->url  = route('project.index');
            $link->icon = 'fa fa-bars';
        });
        $iconMenu->link('issues', function (Link $link) {
            $link->name = 'Issues';
            $link->url  = route('issue.index');
            $link->icon = 'fa fa-ticket';
        });
    }

    private function setRightMenu()
    {
        $rightMenu = \Menu::getMenu('rightMenu');

        if (auth()->check()) {
            $rightMenu->link('create_issue', function (Link $link) {
                $link->name    = 'Create Issue';
                $link->url     = route('issue.create');
                $link->type    = 'button';
                $link->classes = 'btn btn-primary-outline';
            });
            $rightMenu->dropDown('user', auth()->user()->display_name, function (DropDown $dropDown) {
                $dropDown->type  = 'profile';
                $dropDown->image = Gravatar::src(auth()->user()->email, 30);

                $dropDown->link('user_profile', function (Link $link) {
                    $link->name = 'Profile';
                    $link->url  = route('user.profile');
                });
            });
        } else {
            $rightMenu->link('login', function (Link $link) {
                $link->name = 'Login';
                $link->url  = route('auth.login');
            });
            $rightMenu->link('register', function (Link $link) {
                $link->name = 'Register';
                $link->url  = route('auth.register');
            });
        }
    }

    /**
     * Sets the dashhead details for the method.
     *
     * @param $subTitle
     * @param $title
     */
    protected function setDetails($subTitle, $title)
    {
        $this->setViewData(compact('subTitle', 'title'));
    }

    /**
     * Set up the breadcrumbs for the area.
     *
     * @param array $breadcrumbs
     */
    protected function setBreadcrumbs(array $breadcrumbs = [])
    {
        $this->setViewData(compact('breadcrumbs'));
    }
}
