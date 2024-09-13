@props(['name', 'route' => 'home', 'icon', 'class'=>'text-dark'])
<style>
    .a-tag{
        font-size:25px;
    }
    .a-icon{
        font-size:25px !important;
    }
</style>
<li aria-haspopup="true">
    <a href="{{route($route)}}" class="{{$class}} a-tag" >
        <i class="fas {{$icon}} a-icon"></i>
        {{ucwords($name)}}
    </a>
</li>
