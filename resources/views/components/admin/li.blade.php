@props(['name', 'route' => null])

<li><a class="slide-item" href="{{ $route ? route($route) : '#' }}">{{ucwords($name)}}</a></li>
