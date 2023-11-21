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
    <script src="jquery.min.js"></script>
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

        .greyscale {
            filter: grayscale(100%);
        }
    </style>
    <script>
        $(document).ready(function() {
            function removeGreyscale(uid) {
                var studentCards = $("#studentCards").find(".student-card");
                studentCards.each(function() {
                    var card = $(this);
                    var hiddenInput = card.find("input[type='hidden']");
                    var id = hiddenInput.attr("name");
                    if (uid === id) {
                        card.find("img").removeClass("greyscale");
                    }
                });
            }

            function checkUID() {
                $.get("UIDContainer.php", function(response) {
                    var uid = response.trim();
                    removeGreyscale(uid);
                    startSession(uid);
                    //remove response from UIDContainer.php
                    $.ajax({
                        type: "POST",
                        url: "UIDContainer.php",
                        data: {
                            UIDresult: ""
                        },
                        success: function(data) {
                            // alert("UID removed!");
                        }
                    });
                });
            }

            function startSession(studentID) {
                $.ajax({
                    type: "POST",
                    url: "http://localhost/attendance/student session.php",
                    data: {
                        // start_session: true
                        student_id: studentID
                    },
                    success: function(data) {
                        if (data) {
                            // alert("Session started!");
                            // ...
                        }
                    }
                });
            }

            checkUID();

            setInterval(checkUID, 500);

            // $('#startSessionBtn').click(function() {
            //     $('#startSessionBtn').toggleClass('btn-primary btn-danger');
            //     startSession();
            // });
        });
    </script>
    <title>Home : FSR CP Connect</title>
</head>

<body>
    <h2>FSR CP CLUB - FSR CP Connect</h2>
    <ul class="topnav">
        <li><a href="home.php">Home</a></li>
        <li><a href="user data.php">Student Data</a></li>
        <li><a href="registration.php">Registration</a></li>
        <li><a href="read tag.php">Read Tag UID</a></li>
        <li><a class="active" href="student attendance.php">Attendance</a></li>
    </ul>
    <br>
    <h2>Attendance System</h2>
    <br>
    <div class="container">
        <div class="row">
            <!-- Left Part -->
            <div class="col-md border text-center">
                <h3>New Session</h3>
                <button id="startSessionBtn" class="btn btn-primary" style="margin-top: 18%; margin-bottom: 18%;">
                    Start New Session
                </button>
                <button id="startSessionBtn" class="btn btn-danger" style="margin-top: 18%; margin-bottom: 18%;" disabled>
                    End Session
                </button>
            </div>

            <!-- Right Part -->
            <div class="col-md border">
                <h3>Sessions history</h3>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr bgcolor="#10a0c5" color="#FFFFFF">
                            <th>ID</th>
                            <th>Attendance</th>
                            <th>Start time</th>
                            <th>End time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'database.php';
                        $pdo = Database::connect();
                        $records_per_page = 5;
                        $page = isset($_GET['page']) ? $_GET['page'] : 1;
                        $offset = ($page - 1) * $records_per_page;
                        $sql = "SELECT * FROM sessions_history ORDER BY ID ASC LIMIT $offset, $records_per_page";
                        $records = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

                        $total_records = $pdo->query("SELECT COUNT(*) FROM sessions_history")->fetchColumn();
                        $total_pages = ceil($total_records / $records_per_page);

                        Database::disconnect();
                        ?>

                        <?php for ($i = 0; $i < 5; $i++) : ?>
                            <tr>
                                <?php if (isset($records[$i])) : ?>
                                    <td><?= $records[$i]['id'] ?></td>
                                    <td><?= $records[$i]['attendance'] ?></td>
                                    <td><?= $records[$i]['start_time'] ?></td>
                                    <td><?= $records[$i]['end_time'] ?></td>
                                <?php else : ?>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                <?php endif; ?>
                            </tr>
                        <?php endfor; ?>
                    </tbody>
                </table>

                <ul class="pagination justify-content-center">
                    <?php
                    $sql = "SELECT COUNT(*) FROM sessions_history";
                    $total_records = $pdo->query($sql)->fetchColumn();
                    $total_pages = ceil($total_records / $records_per_page);
                    ?>
                    <li class="page-item <?= $page <= 1 ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $page - 1 ?>" tabindex="-1" aria-disabled="true">Previous</a>
                    </li>
                    <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                        <li class="page-item <?= $page == $i ? 'active' : '' ?>"><a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a></li>
                    <?php endfor; ?>
                    <li class="page-item <?= $page >= $total_pages ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $page + 1 ?>">Next</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            <i class="fa fa-table mr-1"></i>
            LIVE STATUS
        </div>
        <div class="card-body">
            <div class="row" id="studentCards">
                <?php
                $pdo = Database::connect();
                $sql = "SELECT * FROM students";
                $students = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
                Database::disconnect();

                foreach ($students as $student) {
                    $id = $student['ID'];
                    $uid = $student['UID'];
                    $imageURL = "images/{$id}.png";
                ?>
                    <div class="col-md-2 mb-4">
                        <div class="card student-card" onclick="startSession('<?php echo $id; ?>')">
                            <img class="card-img-top greyscale" src="<?php echo $imageURL;?>">
                            <input type="hidden" name="<?php echo $uid?>">
                        </div>
                    </div>

                    <!-- <div class="col-md-2 mb-4">
                        <div class="card student-card" data-scanned="false">
                            <img class="card-img-top greyscale" src="<?php echo $imageURL; ?>">
                            <input type="hidden" name="<?php echo $uid ?>">
                        </div>
                    </div> -->


                <?php } ?>
            </div>


        </div>
    </div>

</body>

</html>




































<!-- <script>
        // $(document).ready(function() {
        //     function removeGreyscale(uid) {
        //         var studentCards = $("#studentCards").find(".student-card");
        //         studentCards.each(function() {
        //             var card = $(this);
        //             var hiddenInput = card.find("input[type='hidden']");
        //             var id = hiddenInput.attr("name");
        //             if (uid === id) {
        //                 card.find("img").removeClass("greyscale");
        //             }
        //         });
        //     }

        //     function checkUID() {
        //         $.get("UIDContainer.php", function(response) {
        //             var uid = response.trim();
        //             removeGreyscale(uid);
        //         });
        //     }

        //     checkUID(); // Check initially

        //     setInterval(checkUID, 500); // Check every 500ms
        // });



        // $(document).ready(function() {
        //     $("#getUID").load("UIDContainer.php");
        //     setInterval(function() {
        //         $("#getUID").load("UIDContainer.php");
        //     }, 500);
        // });
    </script> -->