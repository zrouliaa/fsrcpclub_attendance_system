<?php
require 'database.php';
$id = null;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "SELECT * FROM students where `ID` = ?";
$q = $pdo->prepare($sql);
$q->execute(array($id));
$data = $q->fetch(PDO::FETCH_ASSOC);
Database::disconnect();
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

    <title>Edit : FSR CP Connect</title>

</head>

<body>

    <h2 align="center">FSR CP CLUB - FSR CP Connect</h2>

    <div class="container">

        <div class="center" style="margin: 0 auto; width:495px; border-style: solid; border-color: #f2f2f2;">
            <div class="row">
                <h3 align="center">Edit Student Data</h3>
                <p id="defaultGender" hidden><?php echo $data['gender']; ?></p>
            </div>

            <form class="form-horizontal" action="user data edit tb.php?id=<?php echo $id ?>" method="post">
                <div class="control-group">
                    <label class="control-label">UID</label>
                    <div class="controls">
                        <input style="width:490px;" name="uid" type="text" placeholder="" value="<?php echo $data['UID']; ?>" readonly>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">ID</label>
                    <div class="controls">
                        <input style="width:490px;" name="id" type="text" placeholder="" value="<?php echo $data['ID']; ?>" required>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">First Name</label>
                    <div class="controls">
                        <input style="width:490px;" name="fname" type="text" placeholder="" value="<?php echo $data['fname']; ?>" required>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Last Name</label>
                    <div class="controls">
                        <input style="width:490px;" name="lname" type="text" placeholder="" value="<?php echo $data['lname']; ?>" required>
                    </div>
                </div>
                
                <div class="control-group">
                    <label class="control-label">Email</label>
                    <div class="controls">
                        <input style="width:490px;" name="email" type="text" placeholder="" value="<?php echo $data['email']; ?>" required>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Phone</label>
                    <div class="controls">
                        <input style="width:490px;" name="phone" type="text" placeholder="" value="<?php echo $data['phone']; ?>" required>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Discord</label>
                    <div class="controls">
                        <input style="width:490px;" name="discord" type="text" placeholder="" value="<?php echo $data['discord']; ?>" required>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Codeforces</label>
                    <div class="controls">
                        <input style="width:490px;" name="codeforces" type="text" placeholder="" value="<?php echo $data['codeforces']; ?>" required>
                    </div>
                </div><br>

                <div class="form-actions">
                    <button type="submit" class="btn btn-success">Update</button>
                    <a class="btn" href="user data.php">Back</a>
                </div>
            </form>
        </div>
    </div> <!-- /container -->
</body>

</html>