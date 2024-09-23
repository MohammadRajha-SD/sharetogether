<ul class="exchange-market-siderbar nav flex-column pt-3" style="flex-wrap: nowrap;">
    @php
    $menuItems = [
        ['route' => '#', 'icon' => 'bi-house', 'text' => 'Home'],
        ['route' => route('exchange.index'), 'icon' => 'bi-shop', 'text' => 'Exchange Market', 'active' => 'exchange.index'],
        ['route' => route('exchange.request'), 'icon' => 'bi-clipboard', 'text' => 'Exchange Requests', 'active' => 'exchange.request']
    ];
    @endphp

    @foreach($menuItems as $item)
    <li class="nav-item nav-item-category mb-2">
        <a class="nav-link nav-link-category d-flex align-items-center {{ isset($item['active']) ? setActive([$item['active']]) : '' }}"
            href="{{ $item['route'] }}">
            <i class="bi {{ $item['icon'] }} pr-2 icon"></i>
            <span class="fw-bold">{{ $item['text'] }}</span>
        </a>
    </li>
    @endforeach

</ul>