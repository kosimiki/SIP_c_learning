<!DOCTYPE HTML>
<html>  
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>



<form action="logvalidation.php" method="post" >
Username: <input type="text" name="username"> <div id="usernameid"></div><br> 
Password: <input type="text" name="password"> <div id="passid"></div><br>
<button>Login</button>
</form>
<br/>
<button onclick="window.location.href='/reg_view.php'">Registration</button>

</body>
</html>