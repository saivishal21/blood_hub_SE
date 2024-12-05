<!DOCTYPE html>
<html>
<head>
    <title>Donors Map</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfLOA04BQ90vAjnqR7iVPonBqh321b9AM"></script>
</head>
<body>
    <h1>Donors Near You</h1>
    <div id="map" style="width: 100%; height: 500px;"></div>

    <script>
        function initMap() {
            const map = new google.maps.Map(document.getElementById('map'), {
                center: { lat: 0, lng: 0 },
                zoom: 2
            });

            fetch('get_donors_location.php')
                .then(response => response.json())
                .then(donors => {
                    donors.forEach(donor => {
                        const marker = new google.maps.Marker({
                            position: { lat: parseFloat(donor.latitude), lng: parseFloat(donor.longitude) },
                            map: map,
                            title: donor.name
                        });
                    });
                });
        }

        window.onload = initMap;
    </script>
</body>
</html>
