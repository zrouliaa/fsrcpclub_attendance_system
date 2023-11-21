<?php
$Write = "<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
file_put_contents('UIDContainer.php', $Write);
?>

<!DOCTYPE html>
<html lang="en">

</html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <style>
        html {
            font-family: Arial;
            display: inline-block;
            margin: 0px auto;
            text-align: center;
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

        img {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
    </style>

    <title>Home : FSR CP Connect</title>
</head>

<body>
    <h2>FSR CP CLUB - FSR CP Connect</h2>
    <ul class="topnav">
        <li><a class="active" href="home.php">Home</a></li>
        <li><a href="user data.php">Student Data</a></li>
        <li><a href="registration.php">Registration</a></li>
        <li><a href="read tag.php">Read Tag UID</a></li>
        <li><a href="student attendance.php">Attendance</a></li>
    </ul>
    <br>
    <!-- <h3>Attendance System</h3> -->

    <img src="LOGO_CP.png" alt="" style="width:40%;">
</body>

</html>