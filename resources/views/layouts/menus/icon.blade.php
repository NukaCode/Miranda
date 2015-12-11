<nav class="iconav">
  <a class="iconav-brand" href="#" style="height: 66px; padding-top: 15px; padding-bottom: 10px;">
    <span class="ionicon ion-planet"></span>
    Miranda
  </a>
  <div class="iconav-slider">
    <ul class="nav nav-pills iconav-nav">
      @foreach (Menu::render('iconMenu')->links as $item)
        <li class="{{ $item->active ? 'active' : '' }}">
          <a href="{!! $item->url !!}" title="{!! $item->name !!}" data-toggle="tooltip" data-placement="right" data-container="body">
            <span class="{!! $item->icon !!}"></span>
            <small class="iconav-nav-label visible-xs-block">{!! $item->name !!}</small>
          </a>
        </li>
      @endforeach
    </ul>
  </div>
</nav>
