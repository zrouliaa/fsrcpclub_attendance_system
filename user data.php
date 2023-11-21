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

        .table {
            margin: auto;
            width: 90%;
        }

        thead {
            color: #FFFFFF;
        }
    </style>

    <title>Student Data : FSR CP Connect</title>
</head>

<body>
    <h2>FSR CP CLUB - FSR CP Connect</h2>
    <ul class="topnav">
        <li><a href="home.php">Home</a></li>
        <li><a class="active" href="user data.php">Student Data</a></li>
        <li><a href="registration.php">Registration</a></li>
        <li><a href="read tag.php">Read Tag UID</a></li>
        <li><a href="student attendance.php">Attendance</a></li>
    </ul>
    <br>
    <div class="container">
        <div class="row"></div>
            <h3>Student Data Table</h3>
        </div>
        <div class="row">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr bgcolor="#10a0c5" color="#FFFFFF">
                        <th>UID</th>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email Address</th>
                        <th>Phone Number</th>
                        <th>Discord Username</th>
                        <th>Codeforces Username</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'database.php';
                    $pdo = Database::connect();
                    $sql = 'SELECT * FROM students ORDER BY ID ASC';
                    foreach ($pdo->query($sql) as $row) {
                        echo '<tr>';
                        echo '<td>' . $row['UID'] . '</td>';
                        echo '<td>' . $row['ID'] . '</td>';
                        echo '<td>' . $row['fname'] . '</td>';
                        echo '<td>' . $row['lname'] . '</td>';
                        echo '<td>' . $row['email'] . '</td>';
                        echo '<td>' . $row['phone'] . '</td>';
                        echo '<td>' . $row['discord'] . '</td>';
                        echo '<td>' . $row['codeforces'] . '</td>';
                        echo '<td><a class="btn btn-success" href="user data edit page.php?id=' . $row['ID'] . '">Edit</a>';
                        echo ' ';
                        echo '<a class="btn btn-danger" href="user data delete page.php?id=' . $row['ID'] . '">Delete</a>';
                        echo '</td>';
                        echo '</tr>';
                    }
                    Database::disconnect();
                    ?>
                </tbody>
            </table>
        </div>
    </div> <!-- /container -->
</body>

</html>