@props(['name', 'col' => 'col-md-6 col-sm-12 col-lg-6', 'data' => [], 'values' => []])
@php
    $collection = collect($values);

    $values = $collection->toArray();
    
    $values = old($name) ? old($name) : $values;
@endphp

<div class="form-group {{$col}}">
    <p class="mg-b-10">{{ucwords($name)}}</p>
    <select class="select2" name="{{$name}}[]" multiple>
        @foreach ($data as $d)
            <option value="{{$d['id']}}" {{ in_array($d['id'], $values) ? 'selected' : '' }} >{{ucwords($d['name'])}}</option>
        @endforeach
    </select>
</div>

