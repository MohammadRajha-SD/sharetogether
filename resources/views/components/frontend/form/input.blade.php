@props(['name', 'type'=> 'text', 'required' => false,  'col' => 'col-md-6 col-sm-12 col-lg-6', 'label' => '', 'value'=>'', 'autocomplete'=> ''])
@php
    $isRequired = $required ? 'required' : '';
    $old_value = ($type == 'password' ? '' : ($value === '' ? old($name) : $value));
    $label = $label === '' ? $name : $label;
@endphp

<div class="form-group {{$col}}">
    @if ($type != 'hidden')
        <x-frontend.form.label :name="$label" />
    @endif
    <input id="{{$name}}" class="form-control" name="{{$name}}" placeholder="Enter your {{$label}}" type="{{$type}}" value="{{$old_value}}"  autocomplete="{{$autocomplete}}" {{$isRequired}}  />
</div>
