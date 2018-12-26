<?php
include("includes/header.html");
?>

<div class="container homeContainer">
<div class="row homeRow" >
  <div class="col-sm-3"></div>
  <div class="col-sm-6" >
  <h3 style="text-align:center;">Registration</h3>
  <div class="jumbotron" style="background-color:#f8f8f8 !important;">
  <!--form starts-->
  <form class="form-horizontal" action="crud.php" method="post" name="RegForm" onsubmit="return validateForm()">
  <input type="hidden" class="form-control " name="type" value="RegAjaxCall">
  <div class="form-group">
    <label class="control-label col-sm-5 value required" for="firstname">First Name:</label>
    <div class="col-sm-7">
      <input type="text" class="form-control " id="firstname" name="firstname">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-5" for="middlename">Middle Name:</label>
    <div class="col-sm-7"> 
      <input type="text" class="form-control" id="middlename" name="middlename" >
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-5 required" for="lastname">Last Name:</label>
    <div class="col-sm-7">
      <input type="text" class="form-control" id="lastname" name="lastname" >
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-5 required" for="email">Email:</label>
    <div class="col-sm-7">
      <input type="text" class="form-control" id="email" name="email" >
	  <!-- since we are doing email validation externally input field changed to text rather than email field-->
	  <p id="emailError"></p>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-5" for="mobileno">Mobile No:</label>
    <div class="col-sm-7">
      <input type="number" class="form-control" id="mobileno" name="mobileno" >
	  <p id="mobilenoError"></p>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-5 required" for="password" >Password:</label>
    <div class="col-sm-7">
      <input type="password" class="form-control" id="password" name="password" >
	  <p id="passwordError"></p>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-5 required" for="cnfrmpwd">Confirm Password:</label>
    <div class="col-sm-7">
      <input type="password" class="form-control" id="cnfrmpwd" name="cnfrmpwd" >
	  <p id="pwdError"></p>
    </div>
  </div>
  <div align="center">
      <button type="submit" class="btn btn-default" >Submit</button><br>
	  <p id="mandatoryError"></p>
  </div>
  </form>
<!--form ends-->
 </div>
  </div>
  <div class="col-sm-3"></div>
</div>
 
</div>

<script>
function validateForm()
{
	var firstname=document.forms["RegForm"]["firstname"].value.trim();
	var lastname=document.forms["RegForm"]["lastname"].value.trim();
	var email=document.forms["RegForm"]["email"].value.trim();
	var mobileno=document.forms["RegForm"]["mobileno"].value.trim();
	var password=document.forms["RegForm"]["password"].value.trim();
	var cnfrmpwd=document.forms["RegForm"]["cnfrmpwd"].value.trim();
	
	if (firstname == "" || lastname=="" || email=="" || password=="" || cnfrmpwd=="") 
	{
	   document.getElementById("mandatoryError").innerHTML ="* Please fill all the mandatory fields";
       return false;
    }
	else
	   document.getElementById("mandatoryError").innerHTML ="";
   
    var reg1 = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	if (reg1.test(email) == false) 
     {
        document.getElementById("emailError").innerHTML ="* Please enter a valid email";
        return false;
     }
	 else
	   document.getElementById("emailError").innerHTML ="";
	 
    if(mobileno.length > 0) // since it is not mandatory field
	{		 
	   var reg2=/^[1-9]{1}\d{9}$/;
	   if(reg2.test(mobileno) == false )
	   {
		document.getElementById('mobilenoError').innerHTML="* Invalid number; must be ten digits";
		return false;
	   }
	   else
	     document.getElementById("mobilenoError").innerHTML ="";
	}  
    else	
		document.getElementById("mobilenoError").innerHTML ="";
	
	  var letter=/^[a-zA-Z]/;
   if(letter.test(password)==false)
   {
     		document.getElementById('passwordError').innerHTML ="* password should start with an alphabet";
			return false;
   }
   else if(password.length<8 || password.length>15)
   {
			document.getElementById('passwordError').innerHTML ="* password size should be 8 to 15 characters";
		return false;
   }
   else
     document.getElementById('passwordError').innerHTML="";
 
	if(password != cnfrmpwd)
	{
		document.getElementById('pwdError').innerHTML = '* passwod and confirm passwod are not matching';
	 return false;
	}
	else
	{
		document.getElementById('pwdError').innerHTML = '';
	 //return false;
	}

}
</script>
</body>
</html>
