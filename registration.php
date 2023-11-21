<?php
$Write = "<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
file_put_contents('UIDContainer.php', $Write);
?>

<!DOCTYPE html>
<html lang="en">
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <script src="jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#getUID").load("UIDContainer.php");
            setInterval(function() {
                $("#getUID").load("UIDContainer.php");
            }, 500);
        });
    </script>

    <style>
        html {
            font-family: Arial;
            display: inline-block;
            margin: 0px auto;
        }

        textarea {
            resize: none;
        }

        ul.topnav {
            list-style-type: none;
            margin: auto;
            padding: 0;
            overflow: hidden;
            background-color: #2475C6;
            width: 95%;
        }

        ul.topnav li {
            float: left;
        }

        ul.topnav li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        ul.topnav li a:hover:not(.active) {
            background-color: #4190B7;
        }

        ul.topnav li a.active {
            background-color: #333;
        }

        ul.topnav li.right {
            float: right;
        }

        @media screen and (max-width: 600px) {

            ul.topnav li.right,
            ul.topnav li {
                float: none;
            }
        }
    </style>

    <title>Registration : FSR CP Connect</title>
</head>

<body>

    <h2 align="center">FSR CP CLUB - FSR CP Connect</h2>
    <ul class="topnav">
        <li><a href="home.php">Home</a></li>
        <li><a href="user data.php">Student Data</a></li>
        <li><a class="active" href="registration.php">Registration</a></li>
        <li><a href="read tag.php">Read Tag UID</a></li>
        <li><a href="student attendance.php">Attendance</a></li>
    </ul>

    <div class="container">
        <br>
        <div class="center" style="margin: 0 auto; width:495px; border-style: solid; border-color: #f2f2f2;">
            <div class="row">
                <h3 align="center">Registration Form</h3>
            </div>
            <br>
            <form class="form-horizontal" action="insertDB.php" method="post">
                <div class="control-group">
                    <label class="control-label">UID</label>
                    <div class="controls">
                        <textarea style="width:490px;" name="uid" id="getUID" placeholder="Please Tag your Card / Key Chain to display UID" rows="1" cols="1" required></textarea>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">ID</label>
                    <div class="controls">
                        <input style="width:490px;" name="id" type="text" placeholder="" value="" required>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">First Name</label>
                    <div class="controls">
                        <input style="width:490px;" name="fname" type="text" placeholder="" value="" required>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Last Name</label>
                    <div class="controls">
                        <input style="width:490px;" name="lname" type="text" placeholder="" value="" required>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Email</label>
                    <div class="controls">
                        <input style="width:490px;" name="email" type="text" placeholder="" value="" required>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Phone</label>
                    <div class="controls">
                        <input style="width:490px;" name="phone" type="text" placeholder="" value="" required>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Discord</label>
                    <div class="controls">
                        <input style="width:490px;" name="discord" type="text" placeholder="" value="" required>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Codeforces</label>
                    <div class="controls">
                        <input style="width:490px;" name="codeforces" type="text" placeholder="" value="" required>
                    </div>
                </div><br>

                <div class="form-actions">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>

        </div>
    </div> <!-- /container -->
</body>

</html>