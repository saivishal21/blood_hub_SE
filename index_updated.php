<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Hub</title>
    <!-- Bootstrap files -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="bootstrap/css//bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- External CSS file -->
    <link rel="stylesheet" href="css/styles.css">
    <style>
        /* General Page Styles */
        body {
            background-color: #f5f5f5; /* Light background */
            color: #333333; /* Text color for legibility */
        }

        /* Navbar styles */
        .navbar {
            background-color: #b22222; /* Blood Red */
        }
        .navbar-brand, .nav-link {
            color: #ffffff !important; /* White text */
        }
        .nav-link:hover {
            color: #add8e6 !important; /* Light Blue on hover */
        }

        /* Button styles */
        .btn-primary {
            background-color: #ff4500; /* Bright Red */
            border-color: #ff4500;
        }
        .btn-primary:hover {
            background-color: #b22222; /* Darker Red on hover */
            border-color: #b22222;
        }

        /* Carousel item styles */
        .carousel-item img {
            width: auto;
            height: 570px;
            object-fit: cover;
        }

        /* Section headings */
        h2, h3, h4 {
            color: #b22222; /* Blood Red for headings */
        }

        /* Footer styles */
        footer {
            background-color: #333333; /* Dark background */
            color: #ffffff; /* White text */
        }
        footer a {
            color: #add8e6; /* Light Blue links */
        }
        footer a:hover {
            color: #ff4500; /* Bright Red on hover */
        }
    </style>


</head>
<body>
    <section>
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <img src ="images/logo_blood-transformed.png">
        <a class="navbar-brand" href="index.php">Blood Hub</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item ml-auto">
                <a class="nav-link" href="admin/login.php">Admin</a>
            </li>
            <li class="nav-item ml-auto">
                <a class="nav-link" href="donor/login.php">Donor</a>
            </li>
            <li class="nav-item ml-auto">
                <a class="nav-link" href="patient/login.php">Patient</a>
            </li>
            </ul>
        </div>
    </nav>
    </section>
    <section>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
<button type="button" data-bs-target="#carouselExampleCaptions"
    data-bs-slide-to="0" class="active"
        aria-current="true" aria-label="Slide 1"></button>
<button type="button" data-bs-target="#carouselExampleCaptions"
    data-bs-slide-to="1"
        aria-label="Slide 2"></button>
<button type="button" data-bs-target="#carouselExampleCaptions"
    data-bs-slide-to="2"
        aria-label="Slide 3"></button>
<button type="button" data-bs-target="#carouselExampleCaptions"
    data-bs-slide-to="3"
        aria-label="Slide 4"></button>    
</div>
<div class="carousel-inner">
    <div class="carousel-item active" >
        
    
<img src="images/b02.png" class="d-block w-100" alt="gadgets">
<div class="carousel-caption d-none d-md-block">
</div>
</div> 

<div class="carousel-item">
<img src="images/b01.png" class="d-block w-100 " alt="men outfits">
<div class="carousel-caption d-none d-md-block">
</div>
</div>
<div class="carousel-item">
<img src="images/b03.png" class="d-block w-100" alt="women trends">
<div class="carousel-caption d-none d-md-block">
</div>
</div>
<div class="carousel-item">
    <img src="images/b04.png" class="d-block w-100" alt="men outfits">
    <div class="carousel-caption d-none d-md-block">
    </div>
    </div>
</div>

<button class="carousel-control-prev" type="button"
data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
<span class="carousel-control-prev-icon" aria-hidden="true"></span>
<span class="visually-hidden">Previous</span>
</button>
<button class="carousel-control-next" type="button"
data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
<span class="carousel-control-next-icon" aria-hidden="true"></span>
<span class="visually-hidden">Next</span>
</button>
</div>   
</section>
<!-- Main content -->
<div class="container-fluid" style="margin:50px;">
    <div class="row container" style="text-align: justify;">
        <div class="col-md-8 mx-auto content-left">
            <h4>Importance of Blood</h4>
            <p>
            Blood is a vital component essential for the proper functioning of the human body. Its significance lies in its roles that contribute to overall health and well-being. Firstly, blood serves as a transportation system, delivering oxygen to every cell, facilitating cellular functions, and transporting nutrients derived from food to support growth and energy needs. Blood's clotting abilities are crucial for wound healing, preventing excessive bleeding through the action of platelets. Furthermore, blood serves as a carrier for hormones, facilitating communication between various glands and regulating essential body functions like metabolism, growth, and stress response. In essence, the importance of blood lies in its comprehensive contribution to maintain a balanced and healthy internal environment.
            </p>
        </div>
        <div class="col-md-3 content-right">
            <img class="img-fluid" src="../Blood Hub/images/logo.png" height="auto" width="70%">
        </div>
    </div>
</div>

<div class="container-fluid" style="margin:50px;">
    <div class="row container" style="text-align: justify;">
    <div class="col-md-3 content-right">
            <img class="img-fluid" src="../Blood Hub/images/image1.jpg" height="auto" width="70%">
        </div>
        <div class="col-md-8 mx-auto content-left">
            <h4>Importance of Donating Blood</h4>
            <p>
            Donating blood is a selfless act with far-reaching impacts on both individuals and communities. The primary significance of blood donation lies in its capacity to save lives. Whether for patients undergoing surgeries, cancer patients, or those with blood disorders, donated blood is often a critical component in emergency medical situations, acting as a lifeline. Regular blood donations are vital for ensuring a stable and sufficient blood supply in healthcare facilities. This helps prevent shortages, especially during emergencies and disasters, contributing to better emergency preparedness and response. Beyond its impact on recipients, blood donation offers health benefits for donors, including a reduced risk of certain diseases and improved cardiovascular health. It is a renewable resource, and the act of donating blood encourages a sense of community responsibility.
            </p>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-11 m-auto" style="text-align: justify;">
            <h4>What is Blood Hub?</h4>
            <p>
                Blood Hub is a user-friendly web-based application designed to streamline and enhance the efficiency of Donor, Patient and Admin operations. In this the donors can register for donating blood and patients can request for blood. The donors can register themseleves as an emergency available donor in his area. The patient can have a direct contact of the emergency available donor straight from the patient dashboard using an efficient search. The Blood Hub comes with three dashboards where the Admin, Donor and Patient can manage their operations respectively.
            </p>
            <p>
            The main objective of Blood Hub is to establish a direct contact between donor and patient in the emergency cases based on area and type of blood group that patient need. The other objective is to update the blood stock availability dynamically, that leads to enhance the efficiency of admin operations.
            </p>
        </div>
    </div>
</div>
<div class="container-fluid" style="margin-bottom: 5%;">
    <div class="row">
        <div class="col-11  m-auto">
        <h4>Type of Blood Groups</h4><br>
        <div class="card container">
            <h4>A+</h4>
            <hr>
            <p>Antigens : A <br>
               Antibodies : Anti-B<br>
               Compatibility : Can receive blood from A+, A-, O+, O-<br>
               Universal Donor for Plasma : No</p>
        </div>
        <div class="card">
            <h4>B+</h4>
            <hr>
            <p>Antigens : B<br>
            Antibodies : Anti-A<br>
            Compatibility : Can receive blood from B+, B-, O+, O-<br>
            Universal Donor for Plasma : No</p>
        </div>
        <div class="card">
            <h4>AB+</h4>
            <hr>
            <p>Antigens : A and B<br>
Antibodies : None<br>
Compatibility : Can receive blood from any blood type<br>
Universal Donor for Plasma: Yes</p>
        </div>
        <div class="card">
            <h4>O+</h4>
            <hr>
            <p>Antigens : None<br>
Antibodies : Anti-A and Anti-B<br>
Compatibility : Can receive blood from O+, O-<br>
Universal Donor for Plasma : No</p>
        </div>
        <div class="card">
            <h4>A-</h4>
            <hr>
            <p>Antigens : A<br>
Antibodies : Anti-B<br>
Compatibility : Can receive blood from A-, O-<br>
Universal Donor for Plasma : No</p>
        </div>
        <div class="card">
            <h4>B-</h4>
            <hr>
            <p>Antigens : B <br>
Antibodies : Anti-A<br>
Compatibility : Can receive blood from B-, O-<br>
Universal Donor for Plasma : No</p>
        </div>
        <div class="card">
            <h4>AB-</h4>
            <hr>
            <p>Antigens : A and B<br>
Antibodies : None<br>
Compatibility : Can receive blood from AB-, A-, B-, O-<br>
Universal Donor for Plasma : Yes</p>
        </div>
        <div class="card">
            <h4>O-</h4>
            <hr>
            <p>Antigens : None<br>
Antibodies : Anti-A and Anti-B<br>
Compatibility : Can receive blood from O-<br>
Universal Donor for Plasma : No</p>
        </div>
        
        </div>
    </div>
</div>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 bg-danger footer">
            <marquee>Blood Hub - Connecting lives in emergencies and dynamically updating blood stock availability one drop at a time.</marquee>
        </div>
    </div>
</div>

</body>

</html>
