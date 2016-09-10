<?php
	echo "".$_POST["birth"];
	if ($_POST["username"]==NULL || $_POST["pass"]==NULL || $_POST["fullname"]==NULL || $_POST["mail"]==NULL 
|| $_POST["sex"]==NULL || $_POST["birth"]==NULL)
	{
		echo "The lack of information caused an error";
	}
	else
	{
	try {
		$servername = "sql7.freemysqlhosting.net";
		$dbname= "sql7134314";
		$username = "sql7134314";
		$password = "hWd6tkFykS";
		
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	  
		$conn->setAttribute(PDO::ATTR_ERRMODE,
		PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare("INSERT INTO users (Username, Password,Fullname,Email,Sex,Date_of_birth)
		VALUES (:Username, :Password , :Fullname , :Email, :Sex , :Date_of_birth)");
		$stmt->bindParam(':Username', $_POST["username"]);
		$stmt->bindParam(':Password', $_POST["pass"]);
		$stmt->bindParam(':Fullname', $_POST["fullname"]);
		$stmt->bindParam(':Email', $_POST["mail"]);
		$stmt->bindParam(':Sex', $_POST["sex"]);
		$stmt->bindParam(':Date_of_birth', $_POST["birth"]);
		$stmt->execute();
		echo "New records created successfully";
    }
	catch(PDOException $e)
    {
		echo "Connection failed: " . $e->getMessage();
    }
		$conn = null;
	}

?>