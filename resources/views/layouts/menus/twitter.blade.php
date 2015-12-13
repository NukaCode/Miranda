<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
            data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
  </div>
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
      <li>
        <div class="dashhead" style="padding-left: 15px; padding-top: 10px;padding-right: 25px;">
          <div class="dashhead-titles">
            <h6 class="dashhead-subtitle">{!! $subTitle or 'Subtitle' !!}</h6>

            <h3 class="dashhead-title">{!! $title or 'Title' !!}</h3>
          </div>
        </div>
      </li>
      @if (isset($breadcrumbs) && count($breadcrumbs) > 0)
        @foreach($breadcrumbs as $text => $route)
          <li>
            {!! dump($route) !!}
            <a href="{!! route($route) !!}">
              {!! $text !!}
            </a>
          </li>
        @endforeach
      @endif
    </ul>
    <div class="hidden-md hidden-lg">
      @if (Menu::exists('rightMenu') && Menu::hasLinks('rightMenu'))
        <ul class="nav navbar-nav navbar-right">
          @each('layouts.menus.twitter.item', Menu::render('rightMenu')->links, 'item')
        </ul>
      @endif
    </div>
    <div class="hidden-sm hidden-xs">
      <div class="container-fluid">
        @if (Menu::exists('rightMenu') && Menu::hasLinks('rightMenu'))
          <ul class="nav navbar-nav navbar-right">
            @each('layouts.menus.twitter.item', Menu::render('rightMenu')->links, 'item')
          </ul>
        @endif
      </div>
    </div>
  </div>
</nav>
<div style="clear: both;"></div>
