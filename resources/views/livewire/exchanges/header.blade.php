<nav class="horizontalMenu clearfix w-75 ">
    <div class="horizontalMenu-list d-flex align-items-center justify-content-between my-3" style="gap:5px">
        <div class="d-flex align-items-center w-100">
            <input type="text" class="form-control" id="address" name="address" placeholder="Enter address..."
                style="flex: 0 0 80%;" wire:model='address'/>
            <button type="submit" class="btn btn-primary me-2" style="flex: 0 0 20%;"><i
                    class="bi bi-search"></i></button>
        </div>

        <button class="btn btn-primary rounded-pill" style="flex: 0 0 20%;" onclick="getLocation()">Use My
            Location</button>
    </div>
    <script>
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    const latitude = position.coords.latitude;
                    const longitude = position.coords.longitude;

                    Livewire.dispatch('updateLocation', {'latitude':latitude , 'longitude': longitude });
                });
            } else {
                alert('Geolocation is not supported by this browser.');
            }
        }
    </script>
</nav>