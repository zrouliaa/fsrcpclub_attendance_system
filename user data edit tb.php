<?php
    require 'database.php';
 
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( !empty($_POST)) {
        // keep track post values
        $uid = $_POST['uid'];
        $id = $_POST['id'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $discord = $_POST['discord'];
        $codeforces = $_POST['codeforces'];
         
        $pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "UPDATE students  set `UID` = ?, ID = ?, fname = ?, lname = ?, email = ?, phone = ?, discord = ?, codeforces = ? WHERE ID = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($uid,$id,$fname,$lname,$email,$phone,$discord,$codeforces,$id));
		Database::disconnect();
		header("Location: user data.php");
    }
?>