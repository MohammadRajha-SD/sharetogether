@props(['name', 'label', 'value' => ''])
@php
    $value = ($value === '' ? old($name) : $value);
@endphp

<div class="form-group">
    <label for="{{$name}}">{{ucwords($name)}}</label>
    <textarea id="{{$name}}" class="form-control" name="{{$name}}" rows="5"> {{$value}}</textarea>
</div>