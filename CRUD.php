<?php 
session_start();
include("db_connect.php");
?>
<?php
if($_POST["type"]=="loginAjaxCall")
{
	$email = $_POST["email"];
	$pwd = md5($_POST["password"]); 
	
	$query = "SELECT * FROM `registration` WHERE email='{$email}' AND  password='{$pwd}' ";
    $result = mysqli_query($dbconnection,$query);
	$rowcount=mysqli_num_rows($result);
	//echo $rowcount;
	if($rowcount >0)
	{
		//echo "if";exit;	
		$_SESSION["email"] = $email;
		$_SESSION["password"] = $pwd;
		//header("Location:DashboardPage.php");
		echo "success";
	}
	else
	{
		echo "failure";
		//header("Location:HomePage.php");
	}
}
if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["type"]=="RegAjaxCall")
{
	$fname = $_POST["firstname"]; 
    $lname = $_POST["lastname"];
	$email = $_POST["email"];
	$pwd = md5($_POST["password"]);   
	
	if(strlen($_POST["middlename"]))
		$mname = $_POST["middlename"];
	else
		$mname = "";

	if(isset($_POST["mobileno"]))
		$phone = $_POST["mobileno"];
	else
		$phone = null;

    $query = "insert into registration(fullName,middleName,lastName,email,mobileNo,password) "; 
    $query .= "values('{$fname}','{$mname}','{$lname}','{$email}','{$phone}','{$pwd}')";
	
    $result = mysqli_query($dbconnection,$query);
	if($result && mysqli_affected_rows($dbconnection)==1)
	{
		echo '<script language="javascript">';
        echo 'alert("registration completed ")';
        echo '</script>';
	
		header("Location:HomePage.php");
	}
	else
	{
		echo "else";
		echo $query;
	}
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["type"]=="StudentInsertAjaxCall") 
{
	$sid = $_POST["id"]; 
	$sname = $_POST["name"]; 
	$email = $_POST["email"]; 
	$class = $_POST["class"]; 
	$year = $_POST["year"]; 
	$city = $_POST["city"]; 
	$country = $_POST["country"]; 
	
	if(empty($sid))
		$query = "insert into student(name,email,class,year,city,country) values('{$sname}','{$email}','{$class}','{$year}','{$city}','{$country}')";
	else
		$query = "insert into student values({$sid},'{$sname}','{$email}','{$class}','{$year}','{$city}','{$country}')";
	
	$result = mysqli_query($dbconnection,$query);
	if(mysqli_affected_rows($dbconnection)==1)
	{
		header("Location:DashboardPage.php");
	}
	else
	{
		echo "some error occured";

	}
}

if($_POST["type"]=="StudentUpdateAjaxCall")
{
	$sid = $_POST["mid"]; 
	$name = $_POST["mname"]; 
	$email = $_POST["memail"]; 
	$class = $_POST["mclass"]; 
	$year = $_POST["myear"]; 
	$city = $_POST["mcity"]; 
	$country = $_POST["mcountry"]; 
	
	$query = "update student set name='{$name}', email='{$email}',class='{$class}',year={$year},city='{$city}'";
    $query .=",country='{$country}',email='{$email}' where sid={$sid}";
	$result = mysqli_query($dbconnection,$query);
	if(mysqli_affected_rows($dbconnection)==1)
	{
		echo "success";
	}
	else
	{
		echo "failed";
	}
}

if($_POST["type"]=="StudentDeleteAjaxCall")
{
	$sid = $_POST["sid"];
$query = "delete from student where sid={$sid}";
$result = mysqli_query($dbconnection,$query);
if(mysqli_affected_rows($dbconnection) == 1)
{
  echo "success";
}
else
{
  echo "$query";
  echo mysqli_affected_rows($dbconnection);
}
}

if($_POST["type"]=="StudentEditAjaxCall")
{
	$sid= $_POST["sid"];
  $query="select * from student where sid={$sid}";
  $result=mysqli_query($dbconnection,$query);
  if($result && mysqli_affected_rows($dbconnection)==1)
  {
	  $row=mysqli_fetch_assoc(($result));
	  echo json_encode($row);
  }  
  else
	  echo "failure";
}
?>