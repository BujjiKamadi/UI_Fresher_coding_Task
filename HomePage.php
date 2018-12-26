<?php 
session_start();
include("db_connect.php");
if(isset($_SESSION["email"]) && isset($_SESSION["password"]))
{
	header("Location:DashboardPage.php");
}
else
{
	include("includes/header.html");
?>
  
<div class="container homeContainer">
<div class="row homeRow" >
  <div class="col-sm-4"></div>
  <div class="col-sm-4" >
  <h3 style="text-align:center;">Login</h3>
  <div class="jumbotron" style="background-color:#f8f8f8 !important;">
   <!--<form action="HomePage.php" method="post">-->
     <div class="form-group">
       <label for="email">Email Id:</label>
       <input type="email" class="form-control" id="email" name="email">
     </div>
     <div class="form-group">
       <label for="pwd">Password:</label>
       <input type="password" class="form-control" id="pwd" name="password" >
     </div>
     <button type="submit" class="btn btn-default" id="btnLogin">Login</button>   
   <!--</form>-->
<div align="right">Or Register here &nbsp;
<button type="submit" class="btn btn-default" id="btnRegister" onclick="NavigateToRegister()">Register</button>
 </div>
 <br>
 <p id="loginError"></p>
  </div>
  <div class="col-sm-4"></div>
</div>
 
</div>
<script>
function NavigateToRegister() {
  window.location = "RegistrationPage.php";
}
$(document).ready(function(){
	$("#btnLogin").click(function(){
		var email=$("#email").val().trim();
		var pwd=$("#pwd").val().trim();
		if(email.length == 0 || pwd.length == 0)
			$("#loginError").text("* Both email and password fields are mandatory");
		else
		{
		  $.ajax({
			type : 'POST',
			url  : 'crud.php',
			data : {email:email,password:pwd,type:"loginAjaxCall"},
			success :function(data,status){
				if(status == "success")
				{
					if(data == "success")
						window.location = "DashboardPage.php";
					else
					   $("#loginError").text("* Entered email or password is wrong");				     
				}
				else
					alert("some error");
			}
		  });
		}
	});
});

</script>
</body>
</html>
<?php 
}
?>