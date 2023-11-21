<?php
    require 'database.php';
    $uid = null;
    if ( !empty($_GET['uid'])) {
        $uid = $_REQUEST['uid'];
    }
     
    $pdo = Database::connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "SELECT * FROM students where `UID` = ?";
	$q = $pdo->prepare($sql);
	$q->execute(array($uid));
	$data = $q->fetch(PDO::FETCH_ASSOC);
	Database::disconnect();
	
	$msg = null;
    $msg2 = null;
	if (isset($data['UID']) == false) {
		$msg = "The UID of your Card is not registered !!!";
		$data['UID']=$uid;
        $data['ID']="--------";
        $data['fname']="--------";
        $data['lname']="--------";
        $data['email']="--------";
        $data['phone']="--------";
        $data['discord']="--------";
        $data['codeforces']="--------";
	} else {
		$msg2 = "This UID Exist !!!";
	}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
	<style>
		td.lf {
			padding-left: 15px;
			padding-top: 12px;
			padding-bottom: 12px;
		}
	</style>
</head>
 
	<body>	
		<div>
			<form>
				<table  width="452" border="1" bordercolor="#10a0c5" align="center"  cellpadding="0" cellspacing="1"  bgcolor="#000" style="padding: 2px">
					<tr>
						<td  height="40" align="center"  bgcolor="#10a0c5"><font  color="#FFFFFF">
						<b>User Data</b></font></td>
					</tr>
					<tr>
						<td bgcolor="#f9f9f9">
							<table width="452"  border="0" align="center" cellpadding="5"  cellspacing="0">
								<tr>
									<td width="113" align="left" class="lf">UID</td>
									<td style="font-weight:bold">:</td>
									<td align="left"><?php echo $data['UID'];?></td>
								</tr>
								<tr bgcolor="#f2f2f2">
                                    <td align="left" class="lf">ID</td>
                                    <td style="font-weight:bold">:</td>
                                    <td align="left"><?php echo $data['ID'];?></td>
                                </tr>
                                <tr>
                                    <td align="left" class="lf">First Name</td>
                                    <td style="font-weight:bold">:</td>
                                    <td align="left"><?php echo $data['fname'];?></td>
                                </tr>
                                <tr bgcolor="#f2f2f2">
                                    <td align="left" class="lf">Last Name</td>
                                    <td style="font-weight:bold">:</td>
                                    <td align="left"><?php echo $data['lname'];?></td>
                                </tr>
                                <tr>
                                    <td align="left" class="lf">Email</td>
                                    <td style="font-weight:bold">:</td>
                                    <td align="left"><?php echo $data['email'];?></td>
                                </tr>
                                <tr bgcolor="#f2f2f2">
                                    <td align="left" class="lf">Phone</td>
                                    <td style="font-weight:bold">:</td>
                                    <td align="left"><?php echo $data['phone'];?></td>
                                </tr>
                                <tr>
                                    <td align="left" class="lf">Discord</td>
                                    <td style="font-weight:bold">:</td>
                                    <td align="left"><?php echo $data['discord'];?></td>
                                </tr>
                                <tr bgcolor="#f2f2f2">
                                    <td align="left" class="lf">Codeforces</td>
                                    <td style="font-weight:bold">:</td>
                                    <td align="left"><?php echo $data['codeforces'];?></td>
                                </tr>
							</table>
						</td>
					</tr>
				</table>
			</form>
		</div>
        <?php
        if($msg != null)
            echo "<p style='color:red;'>" . $msg . "</p>";
        else
            echo "<p style='color:green;'>" . $msg2 . "</p>";
        ?>
	</body>
</html>