<?php 
session_start();
include("db_connect.php");
if(isset($_SESSION["email"]) && isset($_SESSION["password"]))
{
	include("includes/header.html");
?>

<div class="container" >
  <div class="row" style="">
   <h3 style="text-align:center;padding:20px;">Dashboard Page</h3>
   <button type="submit" style="position:absolute;right:20px;top:23px;" id="logoutbtn" onclick="Logout()">Logout</button>
  </div>
  <div class="row">
  <table class="table" style="border: 1px groove #f8f8f8;">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
		<th>Class</th>
		<th>Year</th>
		<th>City</th>
		<th>Country</th>
		<th></th>
      </tr>
    </thead>
    <tbody>
	<?php
	$query="select * from student order by sid";
	$result=mysqli_query($dbconnection,$query);
	while($row=mysqli_fetch_assoc($result))
	{
		
	?>
	  <tr>
        <td><?php echo $row["sid"];?></td>
        <td><?php echo $row["name"];?></td>
        <td><?php echo $row["email"];?></td>
		<td><?php echo $row["class"];?></td>
		<td><?php echo $row["year"];?></td>
		<td><?php echo $row["city"];?></td>
		<td><?php echo $row["country"];?></td>
		<td>

		  <button  class="btn btn-default edit"  id="edit-<?php echo $row["sid"];?>">Edit</button>
		  <button class="btn btn-default delete" id="delete-<?php echo $row["sid"];?>" >Delete</button>
		</td>
      </tr>
    <?php 
    }
    ?>
	</tbody>
  </table>
  </div>
  <div class="row">
  <div class="col-sm-3"></div>
  <div class="col-sm-6">
  <div class="jumbotron" style="background-color:#f8f8f8 !important;">
   <form class="form-horizontal" action="crud.php" method="post" name="StudentForm" onsubmit="return validateForm('StudentForm')">
   <input type="hidden" class="form-control " name="type" value="StudentInsertAjaxCall">
  <div class="form-group">
    <label class="control-label col-sm-5 value" for="id">Student ID:</label>
    <div class="col-sm-7">
      <input type="text" class="form-control" id="id" name="id">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-5 required" for="name">Student Name:</label>
    <div class="col-sm-7"> 
      <input type="text" class="form-control " id="name" name="name" >
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-5 required" for="email">Email:</label>
    <div class="col-sm-7">
      <input type="email" class="form-control " id="email" name="email">
	  <p id="emailError"></p>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-5 required" for="class">Class:</label>
    <div class="col-sm-7">
      <input type="text" class="form-control " id="class" name="class">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-5 required" for="year" >Enrollement Year:</label>
    <div class="col-sm-7">
      <input type="number" class="form-control " id="year" name="year" >
	  <p id="yearError"></p>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-5" for="city">City:</label>
    <div class="col-sm-7">
      <input type="text" class="form-control " id="city" name="city" >
    </div>
  </div>
    <div class="form-group">
    <label class="control-label col-sm-5" for="country">Country:</label>
    <div class="col-sm-7">
      <input type="text" class="form-control" id="country" name="country" >
    </div>
  </div>
  <div align="center">
      <button type="submit" class="btn btn-default" id="btnSave">Save</button>
	  <button type="reset" class="btn btn-default" id="btnReset">Clear</button>
	  <p id="mandatoryError"></p>
  </div>
</form>

   </div>
   </div>
   <div class="col-sm-3"></div>
  </div>
</div>

<!-- modal starts -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Student Details</h4>
      </div>
      <div class="modal-body">
	    <!-- form starts -->
          <div class="form-group" >
             <label class="control-label col-sm-5" for="mid">Student ID:</label>
             <div class="col-sm-7">
               <input type="text" class="form-control" id="mid" readonly>
             </div>
          </div>
          <div class="form-group" >
            <label class="control-label col-sm-5 required" for="sname">Student Name:</label>
            <div class="col-sm-7"> 
              <input type="text" class="form-control" id="mname" >
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-5 required " for="email">Email:</label>
            <div class="col-sm-7">
              <input type="email" class="form-control" id="memail" >
			  <p id="memailError"></p>
            </div>
          </div>
		  <div class="form-group">
            <label class="control-label col-sm-5 required" for="class">Class:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="mclass" >
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-5 required" for="year">Enrollement Year:</label>
            <div class="col-sm-7">
              <input type="number" class="form-control" id="myear" min="1980" max="2050">
			  <p id="myearError"></p>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-5" for="city">City:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="mcity" >
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-5" for="country">Country:</label>
            <div class="col-sm-7">
             <input type="text" class="form-control" id="mcountry" >
            </div>
          </div>       
      </div>
	  <div align="center">
        <button  class="btn btn-default " id="updatebtn">Update</button>
	    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
		<p id="mmandatoryError" ></p>
      </div> <br>
	  <!-- form ends -->
    </div>
  </div>
</div>
<!-- modal ends -->
<script>
function validateForm(WhichForm) // to determine modal form or save student form
{
	if(WhichForm == "StudentForm")
	{
		var type="";
		var sid=document.forms["StudentForm"]["id"].value.trim();
		var sname=document.forms["StudentForm"][type+"name"].value.trim();
		var email=document.forms["StudentForm"][type+"email"].value.trim();
		var sclass=document.forms["StudentForm"][type+"class"].value.trim();
		var year=document.forms["StudentForm"][type+"year"].value.trim();
		var city=document.forms["StudentForm"][type+"city"].value.trim();
		var country=document.forms["StudentForm"][type+"country"].value.trim();
	}
	else
	{
		var type="m";
		var sid=document.getElementById(type+"id").value.trim();
		var sname=document.getElementById(type+"name").value.trim();
		var email=document.getElementById(type+"email").value.trim();
		var sclass=document.getElementById(type+"class").value.trim();
		var year=document.getElementById(type+"year").value.trim();
		var city=document.getElementById(type+"city").value.trim();
		var country=document.getElementById(type+"country").value.trim();
	}
	

	if (sname == "" || email=="" || sclass=="" || year=="" ) 
	{
	   document.getElementById(type+"mandatoryError").innerHTML ="* Please fill all the mandatory fields";
       return false;
    }
	else
		document.getElementById(type+"mandatoryError").innerHTML ="";
	
	var reg1 = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	if (reg1.test(email) == false) 
     {
        document.getElementById(type+"emailError").innerHTML ="* Please enter a valid email";
        return false;
     }
	 else
	   document.getElementById(type+"emailError").innerHTML ="";
   
	var reg2 = /\d{4}/;
	if(reg2.test(year) == false )
	   {
		document.getElementById(type+'yearError').innerHTML="* Please enter a valid year in four digits ";
		return false;
	   }
	   else if(year <1980 || year >2050)
	   {
		   document.getElementById(type+'yearError').innerHTML="* Enter a valid year between 1980 and 2050 ";
		   return false;
	   }
	   else
	     document.getElementById(type+"yearError").innerHTML ="";	
	return true;
}
function Logout()
{
	var sure=confirm("Are sure want to logout");
	if(sure == true)
	   document.location.href="Logout.php";
    else
		return false;
	
	
	//var btn=document.getElementById("logoutbtn");
	//btn.addEventListener('click',function(){
	//	document.Location.href="Logout.php";
	//});
	
	//window.open("Logout.php");
}
$(document).ready(function(){
	
	$("#updatebtn").click(function(){
		var mid = $("#mid").val();
		var mname = $("#mname").val();
		var memail = $("#memail").val();
		var mclass = $("#mclass").val();
		var myear = $("#myear").val();
		var mcity = $("#mcity").val();
		var mcountry = $("#mcountry").val();
		
		if(validateForm("ModalForm"))
		{
			$.ajax({
				type : 'POST',
			    url  : 'crud.php',
		        data : {mid: mid, mname:mname, memail:memail, mclass:mclass, myear:myear, mcity:mcity, mcountry:mcountry,type:"StudentUpdateAjaxCall"},
			    success :function(data,status){
			    	if(status == "success")
			    		window.location = "DashboardPage.php";
			    	else
			    		alert("else delete");
			    }
            });
		    $("#myModal").modal('hide');
		}
	});
	$(".delete").click(function(){
		var sure=confirm("Are sure want to delete");
	    if(sure)
		{
			var params=(this.id).split("-");
		    var sid=params[1];
		    $.ajax({
			   type : 'POST',
			   url  : 'crud.php',
			   data : {sid:sid,type:"StudentDeleteAjaxCall"},
			   success :function(data,status){
				   if(status == "success")
					window.location = "DashboardPage.php";
				else
					alert("else delete");
			    }
		   });
		}
        else
		  return false;
		
	});
	$(".edit").click(function(){
		var params=(this.id).split("-");
		var sid=params[1];
		$.ajax({ 
			type:'POST',
			url: 'crud.php',
			data: {sid:sid,type:"StudentEditAjaxCall"},
			success:function(data,status){
				if(status == "success")
				{
				 var result=$.parseJSON(data);
				 $("#mid").val(result["sid"]);
				 $("#mname").val(result["name"]);
			     $("#memail").val(result["email"]);
				 $("#mclass").val(result["class"]);
				 $("#myear").val(result["year"]);
				 $("#mcity").val(result["city"]);
				 $("#mcountry").val(result["country"]);
				 $("#myModal").modal('show');
				}
				else
				{
				 	alert("edit else");
				}
			}
		});
	});
	
});

</script>
</body>
</html>
<?php
}
else
	header("Location:HomePage.php");
?>