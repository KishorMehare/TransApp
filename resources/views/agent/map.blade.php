<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Data List
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div>
                        <h1 class="text-2xl font-semibold text-gray-900">Data List</h1>
                    </div>

                    <div class="mt-6">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBXMuNDHQ-H0GSnH22r9f5iAfmn5mGuxAM"></script>
    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>

    <h1>Vehicle Positions</h1>
    <div id="map"></div>
    <script>
        function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 10,
            center: { lat: 0, lng: 0 } // Set initial map center
        });

        // Initialize an empty array to hold LatLng objects
        var routeCoordinates = [];

        // Loop through GPS data and add markers
        @foreach($gpsData as $data)
            var position = { lat: {{ $data->latitude }}, lng: {{ $data->longitude }} };
            routeCoordinates.push(position); // Add position to routeCoordinates array
            new google.maps.Marker({
                position: position,
                map: map,
                title: "Vehicle"
            });
        @endforeach

        // Create a polyline using the routeCoordinates array
        var routePath = new google.maps.Polyline({
            path: routeCoordinates,
            geodesic: true,
            strokeColor: '#FF0000',
            strokeOpacity: 1.0,
            strokeWeight: 2
        });

        // Set the polyline on the map
        routePath.setMap(map);
    }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBXMuNDHQ-H0GSnH22r9f5iAfmn5mGuxAM&callback=initMap"></script>
</div>
                </div>
            </div>
        </div>
    </div>

    <footer class="fixed bottom-0 w-full bg-gray-900 text-white text-center py-4">
        This is the footer.
    </footer>
</x-app-layout>
