@props(['id'=>null, 'isOn' => false])

<div class="main-toggle-group-demo">
    <div class="main-toggle main-toggle-success {{ $isOn ? 'on' : ''}}" id="{{$id}}">
        <span></span>
    </div>
</div>
