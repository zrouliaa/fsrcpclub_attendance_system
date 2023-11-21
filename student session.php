<?php
include 'database.php';
$pdo = Database::connect();

if (isset($_POST['student_id'])) {
    $studentID = $_POST['student_id'];

    //check if the id already exists in the database
    $stmt = $pdo->prepare("SELECT * FROM session_4 WHERE student_id = ?");
    $stmt->execute([$studentID]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$row) {

        // Get the current time
        $entryTime = date("Y-m-d H:i:s");

        // Insert the entry time into the session_1 table
        $stmt = $pdo->prepare("INSERT INTO session_4 (student_id, entry_time) VALUES (?, ?)");
        $stmt->execute([$studentID, $entryTime]);

        // Return a success message
        echo "success";
    } else {
        // Get the current time
        $leaveTime = date("Y-m-d H:i:s");

        // Update the leave time in the session_1 table
        $stmt = $pdo->prepare("UPDATE session_4 SET exit_time = ? WHERE student_id = ?");
        $stmt->execute([$leaveTime, $studentID]);

        // Return a success message
        echo "success";
    }
}

Database::disconnect();
