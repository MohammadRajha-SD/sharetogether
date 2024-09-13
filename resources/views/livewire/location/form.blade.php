<div>
{{--    <form method="POST" action="{{ route('profile.location.update') }}" class="mt-5 space-y-6">--}}
    <form wire:submit.prevent="updateLocation">
        <x-frontend.form.select2
            name="country"
            :data="$countries"
            col=""
            model="country"
            change="CountyChanged"
            :value="$country"
        />
        <x-frontend.form.select2
            name="state"
            :data="$states"
            col=""
            model="state"
            change="stateChanged"
            :value="$state"
        />

        <x-frontend.form.select2
            name="city"
            :data="$cities"
            col=""
            model="city"
            :value="$city"
        />

        <x-frontend.form.button type="submit" class="mt-3">Update Current Location</x-frontend.form.button>
    </form>
</div>
