@props(['type'=> 'button', 'class' => ''])

<button class="btn btn-outline-danger waves-effect waves-light w-md {{$class}}" type="{{$type}}">{{$slot}}</button>
