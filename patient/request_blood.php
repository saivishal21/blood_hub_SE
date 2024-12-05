<?php
session_start();
if (isset($_SESSION['email'])) {
    ?>
    <html>

    <head>
        <style>
            .donate-form {
                box-shadow: 3px 3px 3px gray;
                border-left: 1px solid gray;
                border-top: 1px solid gray;
                border-radius: 7px;
                padding: 7px;
            }

            .column {
                float: left;
                width: 50%;
            }

            /* Clear floats after the columns */
            .row:after {
                content: "";
                display: table;
                clear: both;
            }
        </style>
    </head>

    <body>
        <div class="row">
            <div class="column">
                <div class="row" style="margin-top: 4%;">
                    
                    <div class="col-md-5 m-auto donate-form">

                        <center>
                            <h2>Blood Request Form</h2>
                        </center>
                        <!-- <br> -->
                        <form action="" method="POST">
                            <div style="padding-left:1.5rem">
                                <div class="form-group">
                                    <label for="units">No of Units:</label>
                                    <input type="text" class="form-control" name="units" placeholder="No of units (in ml)">
                                </div><br>

                                <div class="form-group">
                                    <label for="name">Blood Group:</label>
                                    <select name="bgroup" class="form-control" required>
                                        <option value="">-Select-</option>
                                        <option value="A">A</option>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B">B</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                    </select>
                                </div><br>
                                <div class="form-group">
                                    <label for="">Reason</label>
                                    <textarea name="reason" cols="45" rows="3" class="form-control"
                                        placeholder="Mention the reason"></textarea>
                                </div><br>
                            </div>
                            <div class="container-fluid">
                                <!-- <h1>Emergency Email Form</h1>
                        <h3>Quickly mention blood group and location</h3>
                        <form method="post" action="sendmail.php">
                            <label for="subject">Subject of Email</label><br />
                            <input type="text" id="subject" name="subject" size="60" required
                                style="width:100%" /><br /><br />
                            <label for="bodyofmail">Body of Email</label><br />
                            <textarea id="bodyofmail" name="bodyofmail" rows="10" cols="65" required
                                style="width:100%"></textarea><br /><br /> -->

                                <!-- <button type="submit" name="submit" value="Submit" class="btn btn-danger"
                                style="margin-bottom:45px">Submit</button> -->
                                <button type="submit" name="request_blood" value="Request" class="btn btn-danger"
                                    style="margin-bottom:45px">Request</button>
                                <!-- <button type="submit" class="btn btn-danger" name="request_blood" value="Request"></button> -->
                        </form>
                    </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="column">


            <div class="row" style="margin-top: 4%;">
                <div class="col-md-5 m-auto donate-form">
                    <!-- <center>
                    <h4>Blood Request Form</h4>
                </center><br> -->
                    <!-- <form action="" method="POST">
                    <div style="padding-left:1.5rem">
                        <div class="form-group">
                            <label for="units">No of Units:</label>
                            <input type="text" class="form-control" name="units" placeholder="No of units (in ml)">
                        </div><br>

                        <div class="form-group">
                            <label for="name">Blood Group:</label>
                            <select name="bgroup" class="form-control" required>
                                <option value="">-Select-</option>
                                <option value="A">A</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B">B</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                            </select>
                        </div><br>
                        <div class="form-group">
                            <label for="">Reason</label>
                            <textarea name="reason" cols="45" rows="3" class="form-control"
                                placeholder="Mention the reason"></textarea>
                        </div><br>
                    </div> -->
                    <div class="container-fluid">
                        <h2>Emergency Email Form</h2>
                        <h4>Quickly mention blood group and location</h4>
                        <form method="post" action="sendmail.php">
                            <label for="subject">Subject of Email</label><br />
                            <input type="text" id="subject" name="subject" size="60" required
                                style="width:100%" /><br /><br />
                            <label for="bodyofmail">Body of Email</label><br />
                            <textarea id="bodyofmail" name="bodyofmail" rows="5" cols="45" required
                                style="width:100%"></textarea><br /><br />
                            <button type="submit" name="submit" value="Submit" class="btn btn-danger"
                                style="margin-bottom:45px">Submit</button>
                            <!-- <input type="submit" class="btn btn-danger" name="request_blood" value="Request"> -->
                        </form>
                    </div>

                    </form>
                </div>
            </div>
        </div>
        </div>

    </body>

    </html>
    <?php
    if (isset($_POST['request_blood'])) {
        $units = $_POST['units'];
        $bgroup = $_POST['bgroup'];
        $reason = $_POST['reason'];

        // Connect to the database
        $conn = new mysqli("localhost", "root", "", "bbms");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch all donor emails
        $query = "SELECT email FROM donors";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $to = $row['email'];
                $subject = "Urgent Blood Request: $bgroup";
                $message = "Dear Donor,\n\nWe urgently need $units ml of $bgroup blood for the following reason:\n\n$reason\n\nYour support can save a life!\n\nThank you,\nBlood Bank Management System.";
                $headers = "From: no-reply@bbms.com";

                // Send email
                mail($to, $subject, $message, $headers);
            }
            echo "Blood request submitted and emails sent to donors!";
        } else {
            echo "No donors found in the database.";
        }

        $conn->close();
    }
} else {
    header('Location:login.php');
}
?>