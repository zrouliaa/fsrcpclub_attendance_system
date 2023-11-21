<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['start_session'])) {
    $pdo = Database::connect();
    
    $pdo->query("INSERT INTO sessions_history (attendance, start_time) VALUES ('Session Started', NOW())");
    $session_id = $pdo->lastInsertId();
    
    $students = $pdo->query("SELECT ID FROM students")->fetchAll(PDO::FETCH_COLUMN);
    
    $session_table = "session_" . $session_id;
    
    $pdo->query("CREATE TABLE $session_table (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        student_id VARCHAR(20) DEFAULT NULL,
        entry_time DATETIME DEFAULT NULL,
        leave_time DATETIME DEFAULT NULL
    )");
    
    foreach ($students as $student_id) {
        $pdo->query("INSERT INTO $session_table (student_id) VALUES ($student_id)");
    }

    Database::disconnect();

    echo 'success';
}
?>
