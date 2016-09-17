<?php
try {
		$servername = "sql7.freemysqlhosting.net";
		$dbname= "sql7134314";
		$username = "sql7134314";
		$password = "hWd6tkFykS";	
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE,
		PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare("Select Username, Password from users where Username = :Username");
		$stmt->bindParam(':Username', $_POST["username"]);
		$password_user=$_POST["password"];
		$stmt->execute();
		$result = $stmt ->fetchAll();
		if(sizeof($result) == 0)
		{
			echo '<div style="color:red"> ? No such username and/or password. </div>';
		}
		else{
			
			$hashed_password = $result[0]['Password'];
			$password_correct = password_verify ( $password_user , $hashed_password );
			if($password_correct == true)
			{
				echo 'Logged in successfully';
			}
		}
		
    }
	catch(PDOException $e)
    {
		echo "Connection failed: " . $e->getMessage();
    }

$conn = null;
?>