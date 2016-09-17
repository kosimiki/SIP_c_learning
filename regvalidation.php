<?php
	$username_column="username"; 
	$pass_column="password"; 
	$fullname_column="fullname";
	$mail_column="email";
	$sex_column="sex";
	$birth_column="date_of_birth";
	$min_lenght=8;
	
		
	switch ($_POST["col"])
	{
		case "usernameid":
		{
		$pattern='/^\S+$/';
			if (is_valid_size($username_column,$_POST["text"],$pattern))
		{
			check_if_exist($username_column,$_POST["text"]);
		}
		}
		
	
		
		break;
		case "passid":
		{
		$pattern="/^\S+$/";
			if (is_valid_size($pass_column,$_POST["text"],$pattern))
		{
			check_if_exist($pass_column,$_POST["text"]);
		}
		}
		
		
		break;
		case "fullnameid":
		{
		$pattern="/^[a-zA-Z]{1}\X+$/";
			if (is_valid_size($fullname_column,$_POST["text"],$pattern))
		{
			echo '<div style="color:green"> ✔ valid </div>';
		}			
		break;
		}
		
		case "mailid":
		if (email_validation($_POST["text"]))
		{
			check_if_exist($mail_column,$_POST["text"]);
		}
		
		
		
		break;
		case "dateid":
		if (strlen($_POST["text"])>0)
		{
			echo '<div style="color:green"> ✔  </div>';
		}
			
		break;	
	}
function is_valid_size($column_name,$incomeing_data,$pattern)
{
	if (!preg_match($pattern, $incomeing_data))
	{
			echo '<div style="color:red"> ✘ Useing unavailable characters </div>';
			return false;
	}
	if ($column_name=="fullname")
	{
		return true;
	}
	if (strlen($incomeing_data)==0)
	{
		echo '<div style="color:red"> ✘ Field is empty  </div>';
		return false;
	}
	if (strlen($incomeing_data)<8)
	{
		echo '<div style="color:red"> ✘'.$column_name.' too short</div>';
		return false;
	}
		
	if (strlen($incomeing_data)>32)
	{
		echo '<div style="color:red"> ✘'.$column_name.' too long</div>';
		return false;
	}
	
	return true;
		
	
		
}
function email_validation($incomeing_data)
{
	$pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/";
	if (preg_match($pattern,$incomeing_data))
	{
		echo '<div style="color:green"> ✔ email address is valid </div>';
		return true;
	}
		
	else 
	{
		echo '<div style="color:red"> ✘ invalid email address </div>';
		return false;
	}
		
}		

function check_if_exist($column_name,$incomeing_data){
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
		
		
		if (sizeof($result)>0 )
		{		
			echo '<div style="color:red"> ✘'.$incomeing_data.' alredy in use </div>';
		}	
		else 
		{
			
			echo '<div style="color:green"> ✔ unused </div>';
		}
			
		
		}

	catch(PDOException $e)
    {
		echo "Connection failed: " . $e->getMessage();
    }	
	
}
?>