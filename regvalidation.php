<?php
	$username_column="username";
	$pass_column="password"; 
	$fullname_column="fullname";
	$mail_column="email";
	$sex_column="sex";
	$birth_column="date_of_birth";
	
	switch ($_POST["col"])
	{
		case "usernameid":
		check_if_exist_or_empty($username_column,$_POST["text"]);
		
		break;
		case "passid":
		check_if_exist_or_empty($pass_column,$_POST["text"]);
		
		break;
		case "fullnameid":
		
		break;
		case "mailid":
		check_if_exist_or_empty($mail_column,$_POST["text"]);
		email_validation($_POST["text"]);
		
		break;
		case "dateid":
		
		break;	
	}
function email_validation($incomeing_data)
{
	$pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/";
	if (preg_match($pattern,$incomeing_data))
		echo '<div style="color:green"> ✔ email address is valid </div>';
	else 
		echo '<div style="color:red"> ✘ invalid email address </div>';
}		

function check_if_exist_or_empty($column_name,$incomeing_data){
	try {		 
		$servername = "sql7.freemysqlhosting.net";
		$dbname= "sql7134314";
		$username = "sql7134314";
		$password = "hWd6tkFykS";
		
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE,
		PDO::ERRMODE_EXCEPTION);
		
			
		$stmt = $conn->prepare("SELECT ".$column_name." From users
		where ".$column_name."=:value");
		$stmt->bindParam(':value',$incomeing_data );
		$stmt -> execute();
		$result = $stmt ->fetchAll();
		
		
		if (sizeof($result)>0)
		{		
			echo '<div style="color:red"> ✘'.$incomeing_data.' alredy in use </div>';
		}
        else if($incomeing_data=="")
			echo '<div style="color:red"> ✘ Field is empty  </div>';
		else 
			echo '<div style="color:green"> ✔ unused </div>';
		}

	catch(PDOException $e)
    {
		echo "Connection failed: " . $e->getMessage();
    }	
	
}
?>