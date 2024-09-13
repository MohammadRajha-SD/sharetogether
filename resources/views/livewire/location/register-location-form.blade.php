<div wire:ignore>
    <x-frontend.form.select2
        name="country"
        :data="$countries"

        model="country"
        change="CountyChanged"
        :value="$country"
    />
    <x-frontend.form.select2
        name="state"
        :data="$states"
        model="state"
        change="stateChanged"
        :value="$state"
    />
    <x-frontend.form.select2
            name="city"
            :data="$cities"

            model="city"
            :value="$city"
        />
</div>
