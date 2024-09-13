@props([
    'name',
    'col' => 'col-md-6 col-sm-12 col-lg-6',
    'data' => [],
    'value' => '',
    'model' => '',
    'change' => ''
 ])

@php
    $value = $value === '' ? old($name) : $value;
@endphp

<div class="form-group {{$col}}">
    <p class="mg-b-10">{{ucwords($name)}}</p>
    <select
        class="form-control"
        name="{{$name}}"
        {{ $model ? "wire:model.live={$model}" : '' }}
        {{ $change ? "wire:change={$change}" : '' }}
    >
        <option value="" selected >Select</option>
        @foreach ($data as $d)
            <option value="{{$d['id']}}" {{$value == $d['id'] ? 'selected' : ''}} >{{ucwords($d['name'])}}</option>
        @endforeach
    </select>
</div>
