<nav class="iconav">
  <a class="iconav-brand" href="#">
    <span class="ionicon ion-planet"></span>
    Miranda
  </a>
  <div class="iconav-slider">
    <ul class="nav nav-pills iconav-nav">
      @foreach (Menu::render('leftMenu')->links as $item)
        <li class="{{ $item->active ? 'active' : '' }}">
          <a href="#" title="{!! $item->name !!}" data-toggle="tooltip" data-placement="right" data-container="body">
            <span class="{!! $item->icon !!}"></span>
            <small class="iconav-nav-label visible-xs-block">{!! $item->name !!}</small>
          </a>
        </li>
      @endforeach
    </ul>
  </div>
</nav>
