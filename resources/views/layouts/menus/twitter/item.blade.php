@if ($item->isDropDown() && $item->hasLinks())
  <li class="dropdown {!! $item->active ? 'active' : '' !!}">
    @if ($item->type == 'profile')
      <a class="dropdown-toggle" data-toggle="dropdown">
        <img src="{!! $item->image !!}" class="profile-image img-circle" />&nbsp;{!! $item->name !!}&nbsp;<b class="caret"></b>
      </a>
    @else
      <a class="dropdown-toggle" data-toggle="dropdown">{!! $item->name !!}<b class="caret"></b></a>
    @endif
    <ul class="dropdown-menu">
      @each('layouts.menus.twitter.item', $item->links, 'item')
    </ul>
  </li>
@else
  <li class="{{ $item->active ? 'active' : '' }}">
    @if (isset($item->type))
      @if ($item->type == 'text')
        <p class="navbar-text">{!! $item->name !!}</p>
      @elseif ($item->type == 'button')
        <div class="btn-group dashhead-toolbar-item btn-group-thirds">
          <a href="{!! $item->url !!}" class="{!! $item->classes !!}">{!! $item->name !!}</a>
        </div>
      @endif
    @else
      {!! HTML::link($item->url, $item->name, $item->options) !!}x
    @endif
  </li>
@endif
