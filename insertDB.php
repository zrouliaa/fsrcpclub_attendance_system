<?php
     
    require 'database.php';
 
    if ( !empty($_POST)) {
        // keep track post values
        $uid = $_POST["uid"];
        $id = $_POST["id"];
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $discord = $_POST["discord"];
        $codeforces = $_POST["codeforces"];
        
		// insert data
        $pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO students (`UID`, ID, fname, lname, email, phone, discord, codeforces) values(?, ?, ?, ?, ?, ?, ?, ?)";
		$q = $pdo->prepare($sql);
		$q->execute(array($uid, $id, $fname, $lname, $email, $phone, $discord, $codeforces));
		Database::disconnect();
		header("Location: user data.php");
    }
?>