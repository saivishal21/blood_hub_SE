<?php
session_start();
if (isset($_SESSION['email'])) {
    include('../includes/connection.php');

    $query = "select * from requests where patient_id = $_SESSION[uid]";
    $query_run = mysqli_query($connection, $query);
    $total_request = mysqli_num_rows($query_run);

    $query = "select * from requests where patient_id = $_SESSION[uid] AND status = 1";
    $query_run = mysqli_query($connection, $query);
    $request_acc = mysqli_num_rows($query_run);

    $query = "select * from requests where patient_id = $_SESSION[uid] AND status = 2";
    $query_run = mysqli_query($connection, $query);
    $request_rej = mysqli_num_rows($query_run);

    $query = "select * from requests where patient_id = $_SESSION[uid] AND status = 1";
    $query_run = mysqli_query($connection, $query);
    $blood_requested = 0;

    while ($row = mysqli_fetch_assoc($query_run)) {
        $blood_requested = $blood_requested + number_format($row['no_units']);
    }

    if (isset($_POST['request_blood'])) {
        $query = "insert into requests values(null, $_SESSION[uid], '$_POST[units]', '$_POST[bgroup]', '$_POST[reason]', 0)";
        $query_result = mysqli_query($connection, $query);

        if ($query_result) {
            echo "<script type='text/javascript'>
                alert('Request submitted successfully...');
                window.location.href = 'patient_dashboard.php';  
            </script>";
        } else {
            echo "<script type='text/javascript'>
                alert('Error...Please try again.');
                window.location.href = 'patient_dashboard.php';
            </script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/styles.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Google Maps API Script -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfLOA04BQ90vAjnqR7iVPonBqh321b9AM&callback=initMap" async defer></script>

    <style>
        body {
            background-color: #EFF5F5;
        }

        .info_card {
            box-shadow: 3px 3px 3px gray;
            height: 200px;
            border-left: 2px solid gray;
            border-top: 2px solid gray;
            padding-top: 4%;
            padding-left: 3%;
            margin: 2%;
            border-radius: 3%;
        }

        .info_card:hover {
            box-shadow: 3px 3px 3px gray;
            height: 200px;
            border-left: 2px solid gray;
            border-top: 2px solid gray;
            padding-top: 4%;
            padding-left: 3%;
            margin: 2%;
            border-radius: 3%;
            height: 210px;
            font-size: large;
        }

        .nav-link {
            color: white;
            opacity: 0.9;
            cursor: pointer;
        }

        .nav-link:hover {
            color: white;
            cursor: pointer;
            opacity: 1;
            text-decoration: underline;
        }

        #emergency-donors-container {
            display: none;
            position: absolute;
            width: 100%;
            background-color: white;
            z-index: 1;
            padding: 10px;
        }

        #map {
            height: 400px;
            width: 100%;
            border: 1px solid #ccc;
            margin-top: 20px;
        }
    </style>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#emergency-donors").click(function () {
                $("#emergency-donors-container").toggle();
                $("#main-container").hide(); // Hide main container
            });

            // Function to handle the search button click
            $("#searchEmergencyDonors").click(function () {
                var searchQuery = $("#searchQuery").val();
                var bloodGroupFilter = $("#bloodGroupFilter").val();

                // AJAX request for searching and filtering emergency donors
                $.ajax({
                    type: "POST",
                    url: "emergency_donors.php",
                    data: {
                        searchQuery: searchQuery,
                        bloodGroupFilter: bloodGroupFilter
                    },
                    success: function (response) {
                        console.log("Response data:", response);
                        $("#emergency-donors-container").html(response);
                        $("#emergency-donors-container").show();
                    },
                    error: function (xhr, status, error) {
                        console.error("AJAX error:", status, error);
                    }
                });
            });

            $("#request_blood").click(function () {
                $("#emergency-donors-container").hide();
                $("#main-container").show(); // Show main container
                $.ajax({
                    type: "POST",
                    url: "request_blood.php",
                    success: function (response) {
                        $("#emergency-donors-container").hide(); // Hide emergency donors container
                        $("#main-container").html(response);
                        $("#main-container").show(); // Show main container
                    },
                    error: function (xhr, status, error) {
                        console.error("AJAX error:", status, error);
                    }
                });
            });

            $("#request_history").click(function () {
                $("#emergency-donors-container").hide();
                $("#main-container").show(); // Show main container
                $.ajax({
                    type: "POST",
                    url: "request_history.php",
                    success: function (response) {
                        $("#emergency-donors-container").hide(); // Hide emergency donors container
                        $("#main-container").html(response);
                        $("#main-container").show(); // Show main container
                    },
                    error: function (xhr, status, error) {
                        console.error("AJAX error:", status, error);
                    }
                });
            });
        });

        // Initialize the Google Map
        function initMap() {
    // Default map center (example: coordinates for New York City)
    const defaultCenter = { lat: 40.7128, lng: -74.0060 };

    // Create a map object and specify the DOM element for display
    const map = new google.maps.Map(document.getElementById("map"), {
        center: defaultCenter,
        zoom: 10, // Adjust zoom level as needed
    });

    // Geocoding Service to fetch coordinates from the address
    const geocoder = new google.maps.Geocoder();

    // Function to geocode the address entered by the user
    function geocodeAddress() {
        const address = $("#searchQuery").val();

        if (address) {
            geocoder.geocode({ address: address }, (results, status) => {
                if (status === "OK") {
                    // Center the map on the address location
                    map.setCenter(results[0].geometry.location);
                    map.setZoom(15);

                    // Place a marker at the address
                    const marker = new google.maps.Marker({
                        map: map,
                        position: results[0].geometry.location,
                    });
                } else {
                    // Display an error message based on the status
                    if (status === "ZERO_RESULTS") {
                        alert("No results found for the address entered. Please try a more detailed address.");
                    } else if (status === "OVER_QUERY_LIMIT") {
                        alert("The geocoding API request limit has been exceeded. Please try again later.");
                    } else {
                        alert("Geocode was not successful for the following reason: " + status);
                    }
                }
            });
        } else {
            alert("Please enter a valid address.");
        }
    }

    // Attach event listener to the search button to trigger geocode when clicked
    $("#searchEmergencyDonors").click(function () {
        geocodeAddress();
    });
}

    </script>
</head>

<body>
    <nav class="navbar bg-danger">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" style="color: white;" href="index.php"><img src="logo_blood-transformed.png">Blood Hub</a>
            </div>
            <div style="color: white;">
                <strong>Name: </strong> <?php echo $_SESSION['name']; ?>
            </div>
            <ul class="nav navbar">
                <li class="nav-item">
                    <a class="nav-link" href="patient_dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="emergency-donors">Emergency Available Donors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="request_blood">Request Blood</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="request_history">Requests History</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div id="emergency-donors-container" style="background-color: #EFF5F5;">
        <div class="container">
            <div class="row mt-3">
                <div class="col-md-4">
                    <label for="bloodGroupFilter">Blood Group:</label>
                    <select id="bloodGroupFilter" class="form-control">
                        <option value="">- Select -</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="searchQuery">Address:</label>
                    <input type="text" id="searchQuery" class="form-control" placeholder="Enter address">
                </div>
                <div class="col-md-4 mt-2">
                    <button class="btn btn-primary" id="searchEmergencyDonors">Search</button>
                </div>
            </div>
        </div>

        <!-- Google Map -->
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nearby Users Location</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfLOA04BQ90vAjnqR7iVPonBqh321b9AM&callback=initMap" async defer></script>
    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
</head>
<body>
    <h2>Nearby Users on Map</h2>
    <script>
function initMap() {
    const defaultCenter = { lat: 40.7128, lng: -74.0060 }; // New York as a fallback
    const map = new google.maps.Map(document.getElementById("map"), {
        center: defaultCenter,
        zoom: 12,
    });

    // Default donor markers in case geolocation or fetch fails
    const defaultDonors = [
        { name: "Donor A", lat: 40.73061, lng: -73.935242 },
        { name: "Donor B", lat: 40.748817, lng: -73.985428 },
        { name: "Donor C", lat: 40.712776, lng: -74.005974 },
        { name: "Donor D", lat: 40.758896, lng: -73.985130 },
    ];

    // Try to get the user's location
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            (position) => {
                const userLocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude,
                };

                // Update the map's center to the user's location
                map.setCenter(userLocation);

                // Add a marker for the user's location
                new google.maps.Marker({
                    position: userLocation,
                    map: map,
                    title: "You are here",
                    icon: {
                        url: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png",
                    },
                });

                // Fetch and add donor markers dynamically
                addDonorMarkers(map);
            },
            (error) => {
                console.error("Error getting user location:", error);
                alert("Unable to retrieve your location. Displaying default donors.");

                // Add default donor markers
                addDefaultMarkers(map, defaultDonors);

                // Fetch and add donor markers dynamically
                addDonorMarkers(map);
            },
            {
                enableHighAccuracy: true,
                timeout: 10000,
                maximumAge: 0,
            }
        );
    } else {
        alert("Geolocation is not supported by this browser. Displaying default donors.");
        
        // Add default donor markers
        addDefaultMarkers(map, defaultDonors);

        // Fetch and add donor markers dynamically
        addDonorMarkers(map);
    }
}

// Function to fetch and add donor markers
function addDonorMarkers(map) {
    $.ajax({
        url: 'fetch_donors.php',
        type: 'GET',
        success: function(response) {
            try {
                const donors = JSON.parse(response);
                donors.forEach(donor => {
                    const donorLocation = {
                        lat: parseFloat(donor.latitude),
                        lng: parseFloat(donor.longitude),
                    };

                    new google.maps.Marker({
                        position: donorLocation,
                        map: map,
                        title: donor.name,
                        icon: {
                            url: "http://maps.google.com/mapfiles/ms/icons/red-dot.png",
                        },
                    });
                });
            } catch (error) {
                console.error("Error parsing donor data:", error);
            }
        },
        error: function(xhr, status, error) {
            console.error("Error fetching donors:", error);
        },
    });
}

// Function to add default donor markers
function addDefaultMarkers(map, donors) {
    donors.forEach(donor => {
        const donorLocation = { lat: donor.lat, lng: donor.lng };

        new google.maps.Marker({
            position: donorLocation,
            map: map,
            title: donor.name,
            icon: {
                url: "http://maps.google.com/mapfiles/ms/icons/red-dot.png",
            },
        });
    });
}
</script>



</body>
</html>

        <div class="col-md-12 mt-4" id="map"></div>
    </div>

    <div class="container-fluid">
        <div class="row" id="main-container">
            <div class="col-md-2 info_card" id="blood_requested_container">
                <h5 class="text-danger">Blood Requested</h5>
                <b>Total: <?php echo $blood_requested; ?> Units</b>
            </div>

            <div class="col-md-2 info_card" id="total_requests_container">
                <h5 class="text-danger">Total Requests</h5>
                <b>Total: <?php echo $total_request; ?></b>
            </div>

            <div class="col-md-2 info_card" id="request_pending_container">
                <h5 class="text-danger">Request Pending</h5>
                <b>Total: <?php echo $total_request - $request_acc - $request_rej; ?></b>
            </div>

            <div class="col-md-2 info_card" id="request_accepted_container">
                <h5 class="text-danger">Request Accepted</h5>
                <b>Total: <?php echo $request_acc; ?></b>
            </div>

            <div class="col-md-2 info_card" id="request_rejected_container">
                <h5 class="text-danger">Request Rejected</h5>
                <b>Total: <?php echo $request_rej ?></b>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 bg-danger" id="footer">
                <marquee>Blood Hub - Connecting lives in emergencies and dynamically updating blood stock availability one drop at a time.</marquee>
            </div>
        </div>
    </div>
</body>

</html>

<?php
} else {
    header('Location:login.php');
}
?>
