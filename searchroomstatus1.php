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
<th><a href="roomstatus.php" id="back_btn"><i class='bx bx-arrow-back'></i></a></th>
</tr>
<div id="search_container">
  <form name="f" method="post" action="searchroomstatus1.php">
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
  class searchroomstatus1 extends connect
  {
  	public function __construct()
	{
	  parent::__construct();
	}
	public function allsearch()
	{
	  if($this->db_handle)
	  {
	  	$result=mysqli_query($this->db_handle,"select * from roomstatus");
		print"<table border=1>
		<tr>
			<th>Room Number</th>
			<th>Room Type</th>
			<th>Room Status</th>
			<th>Role ID</th>
			<th>Date</th>
			<th>Time</th>
		</tr>";
		while($db_field=mysqli_fetch_assoc($result))
		{
			print"<tr>";
			print"<td>".$db_field['roomno']."</td>";
			print"<td>".$db_field['rmtype']."</td>";
			print"<td>".$db_field['roomstatus']."</td>";
			print"<td>".$db_field['roleid']."</td>";
			print"<td>".$db_field['date']."</td>";
			print"<td>".$db_field['time']."</td>";
		
		}
	   }
	}
	public function submit()
	{
	  if($this->db_handle)
	  {
		$b=$_POST['t1'];
	  	$result=mysqli_query($this->db_handle,"select * from roomstatus where roomno LIKE '%$b%'");
		print"<table border=1>
		<tr>
			<th>Room Number</th>
			<th>Room Type</th>
			<th>Room Status</th>
			<th>Role ID</th>
			<th>Date</th>
			<th>Time</th>
		</tr>";
		while($db_field=mysqli_fetch_assoc($result))
		{
			print"<tr>";
			print"<td>".$db_field['roomno']."</td>";
			print"<td>".$db_field['rmtype']."</td>";
			print"<td>".$db_field['roomstatus']."</td>";
			print"<td>".$db_field['roleid']."</td>";
			print"<td>".$db_field['date']."</td>";
			print"<td>".$db_field['time']."</td>";
		
		}
	   }
	}
	public function delete()
  	{
	   if($this->db_handle)
		{		
			$d=$_POST['t1'];
	  		$s="delete from roomstatus where roomno='$d'";
	 		 mysqli_query($this->db_handle,$s);
	  		echo"<script language=javascript>alert('Record Delete')</script>";
	  		echo"<script>window.open('searchroomstatus1.html',_self)</script>";
		}
	   else
			echo"<script language=javascript>alert('Database Not Found')</script>";
  	}
  }
$ob=new searchroomstatus1();
if(isset($_REQUEST["b5"]))
$ob->allsearch();
if(isset($_REQUEST["b1"]))
$ob->submit();
if(isset($_REQUEST["b2"]))
$ob->delete();
?>