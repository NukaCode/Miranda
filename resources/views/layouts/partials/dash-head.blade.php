<div class="dashhead">
  <div class="dashhead-titles">
    <h6 class="dashhead-subtitle">{!! $subTitle or 'Sub Title' !!}</h6>

    <h3 class="dashhead-title">{!! $title or 'Title' !!}</h3>
  </div>

  <div class="dashhead-breadcrumbs">
    <ul class="nav nav-bordered">
      @if (isset($breadcrumbs) && count($breadcrumbs) > 0)
        @foreach ($breadcrumbs as $text => $route)
          <li><a href="{!! $route !!}">{!! $text !!}</a></li>
        @endforeach
      @endif
    </ul>
  </div>

  <div class="dashhead-toolbar">
    @if (Menu::exists('rightMenu') && Menu::hasLinks('rightMenu'))
      <ul class="nav navbar-nav navbar-right">
        @each('layouts.menus.twitter.item', Menu::render('rightMenu')->links, 'item')
      </ul>
    @endif
  </div>
</div>
