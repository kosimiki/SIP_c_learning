<!DOCTYPE HTML>
<html>  
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>


function Bemenet(str,id)
{
	$.post("regvalidation.php",
		{
		col: id,
        text: str
        },
		
        function(respondtext){			
			$('#'+id).html(respondtext);
			
			
		}
				
		);
	
	
}


 
</script>


 
</script>
</head>
<body>
Sign up<br>
<form action="registration.php" method="post" >
Username: <input type="text" name="username" onkeyup="Bemenet(this.value,'usernameid')"> <div id="usernameid"></div><br> 
Password: <input type="password" name="pass" onkeyup="Bemenet(this.value,'passid')"> <div id="passid"></div><br>
Fullname: <input type="text" name="fullname" onkeyup="Bemenet(this.value,'fullnameid')"> <div id="fullnameid"></div><br>
E-mail: <input type="email" name="mail" onkeyup="Bemenet(this.value,'mailid')"> <div id="mailid"></div><br>
Sex: <input type="radio" name="sex" value ="0" checked> male 
<input type="radio" name="sex" value ="1" > female <br>
Birthdate: <input type="date" name="birth" onkeyup="Bemenet(this.value,'dateid')"> <div id="dateid"></div><br>
<input type="submit">
</form>

</body>
</html>