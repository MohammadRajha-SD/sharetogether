@php
    $occupations = App\Models\Occupation::all();
    $categories = App\Models\Category::whereNull('parent_id')->get();
@endphp

<form role="form" method="POST" action="{{route('profile.update')}}">
    @csrf
    @method('patch')

	<x-frontend.form.input name="latitude" type="hidden" />
    <x-frontend.form.input name="longitude" type="hidden" />

    <x-frontend.form.input  name="name" col="" :value="$user->name" />
    <x-frontend.form.input  name="username" col="" :value="$user->username" />

    <x-frontend.form.select name="occupation" :data="$occupations" col="" :value="$user->details->occupation->id" />
    <x-frontend.form.multi-select name="interests" :data="$categories" col="" :values="$user->interestIds()" />
    <x-frontend.form.select name="occupation" :data="$occupations" col="" :value="$user->details->occupation->id" />

    <x-frontend.form.textarea  name="bio" col="" :value="$user->details->bio" />

    <x-frontend.form.button  type="submit">Update Profile</x-frontend.form.button>
</form>

<script>
	document.addEventListener('DOMContentLoaded', (event) => {
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(function(position) {
				document.getElementById('latitude').value = position.coords.latitude;
				document.getElementById('longitude').value = position.coords.longitude;
			});
		}
	});
</script>
