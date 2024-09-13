@props(['name', 'type'=> 'tel', 'col' => 'col-md-6 col-sm-12 col-lg-6'])
<div class="{{$col}}">
    <label for="{{$name}}">{{ucwords($name)}}</label>
    <div class="input-group">
        <input class="form-control" id="{{$name}}" name="{{$name}}" type="tel" />
    </div>
</div>