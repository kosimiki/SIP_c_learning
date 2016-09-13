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
		check_if_exist($username_column,$_POST["text"]);
		not_empty($_POST["text"]);
		break;
		case "passid":
		check_if_exist($username_column,$_POST["text"]);
		not_empty($_POST["text"]);
		break;
		case "fullnameid":
		not_empty($_POST["text"]);
		break;
		case "mailid":
		check_if_exist($username_column,$_POST["text"]);
		not_empty($_POST["text"]);
		break;
		case "dateid":
		not_empty($_POST["text"]);
		break;	
	}
	
	
	
function not_empty($incomeing_data)
{
	if ($incomeing_data != "")
		{
        echo "";
		}
	else 
		{
		echo "✘ Field is empty";
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
		
		if (sizeof($result)>0)
		{	
	
			echo "✘".$column_name." alredy in use";
		}
        else if($incomeing_data=="")
			echo "";
		else
			echo "✔";
		}
	catch(PDOException $e)
    {
		echo "Connection failed: " . $e->getMessage();
    }	
	
}
?>