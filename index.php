<!DOCTYPE HTML>
<html>  
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>



<form action="login.php" method="post" >
Username: <input type="text" name="username" onkeyup="Bemenet(this.value,'usernameid')"> <div id="usernameid"></div><br> 

Password: <input type="text" name="pass" onkeyup="Bemenet(this.value,'passid')"> <div id="passid"></div><br>
<input type="Login">

</form>
</body>
</html>