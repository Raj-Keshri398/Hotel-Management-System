<!DOCTYPE html>
<html>
<head>
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<style>
#search_container {
  top: 0;
  right: 0;
  margin-bottom: 10px;
  float: right;
}

table {
  width: 100%; 
  background-color: #f5f5f5;
}

#a {
  padding: 3px;
  border: 1px solid #ddd;
}

#search_btn{
  background-color: black;
  color: white;
} 

#back_btn{
 background-color: black;
 color: white;
 float: left;
 border-radius: 50%;
 height: 15px;
 width: 15px;
 padding: 8px;
}
</style>
</head>
<body>
<tr>
<th><a href="employee.php" id="back_btn"><i class='bx bx-arrow-back'></i></a></th>
</tr>
<div id="search_container">
  <form name="f" method="post" action="searchemployee.php">
    <table>
      <tr>
        <th><input type="text" name="t1" placeholder="Search Booking Details"></th>
        <th><input type="submit" name="b1" value="Submit" id="search_btn"></th>
	<th><input type="submit" name="b2" value="Delete" id="search_btn"></th>
      </tr>
    </table>
  </form>
</div>
<?php
  include 'connect.php';
  class searchemployee extends connect
  {
  	public function __construct()
	{
	  parent::__construct();
	}
	public function allsearch()
	{
	  if($this->db_handle)
	  {
	  	$result=mysqli_query($this->db_handle,"select * from employee");
		print"<table border=1>
		<tr>
			<th>Employee ID</th>
			<th>Hotel Code</th>
			<th>Role ID</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Date Of Birth</th>
			<th>Gender</th>
			<th>Phone Number</th>
			<th>Email </th>
			<th>Password</th>
			<th>Salary</th>
		</tr>";
		while($db_field=mysqli_fetch_assoc($result))
		{
			print"<tr>";
			print"<td>".$db_field['employeeid']."</td>";
			print"<td>".$db_field['hotelcode']."</td>";
			print"<td>".$db_field['roleid']."</td>";
			print"<td>".$db_field['firstname']."</td>";
			print"<td>".$db_field['lastname']."</td>";
			print"<td>".$db_field['dob']."</td>";
			print"<td>".$db_field['gender']."</td>";
			print"<td>".$db_field['phoneno']."</td>";
			print"<td>".$db_field['email']."</td>";
			print"<td>".$db_field['password']."</td>";
			print"<td>".$db_field['salary']."</td>";
		}
	   }
	}
	public function submit()
	{
	  if($this->db_handle)
	  {
		$b=$_POST['t1'];
	  	$result=mysqli_query($this->db_handle,"select * from employee where employeeid LIKE '%$b%' AND phoneno LIKE '%$b%' ");
		print"<table border=1>
		<tr>
			<th>Employee ID</th>
			<th>Hotel Code</th>
			<th>Role ID</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Date Of Birth</th>
			<th>Gender</th>
			<th>Phone Number</th>
			<th>Email </th>
			<th>Password</th>
			<th>Salary</th>
		</tr>";
		while($db_field=mysqli_fetch_assoc($result))
		{
			print"<tr>";
			print"<td>".$db_field['employeeid']."</td>";
			print"<td>".$db_field['hotelcode']."</td>";
			print"<td>".$db_field['roleid']."</td>";
			print"<td>".$db_field['firstname']."</td>";
			print"<td>".$db_field['lastname']."</td>";
			print"<td>".$db_field['dob']."</td>";
			print"<td>".$db_field['gender']."</td>";
			print"<td>".$db_field['phoneno']."</td>";
			print"<td>".$db_field['email']."</td>";
			print"<td>".$db_field['password']."</td>";
			print"<td>".$db_field['salary']."</td>";
		}
	   }
	}
	public function delete()
  	{
	   if($this->db_handle)
		{		
			$d=$_POST['t1'];
	  		$s="delete from employee where employeeid='$d'";
	 		 mysqli_query($this->db_handle,$s);
	  		echo"<script language=javascript>alert('Record Delete')</script>";
	  		echo"<script>window.open('searchroom.php',_self)</script>";
		}
	   else
			echo"<script language=javascript>alert('Database Not Found')</script>";
  	}
  }
$ob=new searchemployee();
if(isset($_REQUEST["b5"]))
$ob->allsearch();
if(isset($_REQUEST["b1"]))
{
$ob->submit();
}
if(isset($_REQUEST["b2"]))
{
$ob->delete();
}
?>