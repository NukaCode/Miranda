<!doctype html>
<html>
<head>
  @include('layouts.partials.header')
</head>
<body>
<div class=container" id="content" style="margin-left: 80px; margin-top: 5px;">
  @if (isset($content))
    {!! $content !!}
  @else
    @yield('content')
  @endif
</div>

@include('layouts.partials.modals')

@section('footer')
  @include('layouts.partials.footer')
@show

@include('layouts.partials.javascript')

</body>
</html>
