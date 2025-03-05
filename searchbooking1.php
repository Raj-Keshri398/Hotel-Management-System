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
<th><a href="frontpage.php" id="back_btn"><i class='bx bx-arrow-back'></i></a></th>
</tr>
<div id="search_container">
  <form name="f" method="post" action="searchbooking1.php">
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
  class searchbooking extends connect
  {
  	public function __construct()
	{
	  parent::__construct();
	}
	public function allsearch()
	{
	  if($this->db_handle)
	  {
	  	$result=mysqli_query($this->db_handle,"select * from booking");
		print"<table border=1>
		<tr>
			<th>Booking ID</th>
			<th>Hotel Code</th>
			<th>Guest ID</th>
			<th>Room Number</th>
			<th>Deposit Payment</th>
			<th>Room Charge</th>
			<th>Check In Date</th>
			<th>Check Out Date</th>
			<th>Check In Time</th>
			<th>Check Out Time</th>
			<th>Number of Adult</th>
			<th>Number of Child</th>
		</tr>";
		while($db_field=mysqli_fetch_assoc($result))
		{
			print"<tr>";
			print"<td>".$db_field['bookingid']."</td>";
			print"<td>".$db_field['hotelcode']."</td>";
			print"<td>".$db_field['guestid']."</td>";
			print"<td>".$db_field['roomno']."</td>";
			print"<td>".$db_field['deppayment']."</td>";
			print"<td>".$db_field['roomchg']."</td>";
			print"<td>".$db_field['checkindate']."</td>";
			print"<td>".$db_field['checkoutdate']."</td>";
			print"<td>".$db_field['checkintime']."</td>";
			print"<td>".$db_field['checkouttime']."</td>";
			print"<td>".$db_field['numofadult']."</td>";
			print"<td>".$db_field['numofchild']."</td>";
		
		}
	   }
	}
	public function submit()
	{
	  if($this->db_handle)
	  {
		$b=$_POST['t1'];
	  	$result=mysqli_query($this->db_handle,"select * from booking where bookingid='$b' OR guestid='$b'");
	 	print"<table border=1>
		<tr>
			<th>Booking ID</th>
			<th>Hotel Code</th>
			<th>Guest ID</th>
			<th>Room Number</th>
			<th>Deposit Payment</th>
			<th>Room Charge</th>
			<th>Check In Date</th>
			<th>Check Out Date</th>
			<th>Check In Time</th>
			<th>Check Out Time</th>
			<th>Number of Adult</th>
			<th>Number of Child</th>
		</tr>";
		while($db_field=mysqli_fetch_assoc($result))
		{
				print"<tr>";
				print"<td>".$db_field['bookingid']."</td>";
				print"<td>".$db_field['hotelcode']."</td>";
				print"<td>".$db_field['guestid']."</td>";
				print"<td>".$db_field['roomno']."</td>";
				print"<td>".$db_field['deppayment']."</td>";
				print"<td>".$db_field['roomchg']."</td>";
				print"<td>".$db_field['checkindate']."</td>";
				print"<td>".$db_field['checkoutdate']."</td>";
				print"<td>".$db_field['checkintime']."</td>";
				print"<td>".$db_field['checkouttime']."</td>";
				print"<td>".$db_field['numofadult']."</td>";
				print"<td>".$db_field['numofchild']."</td>";
		}
			
	}
     }
     public function delete()
  	{
	   if($this->db_handle)
		{		
			$d=$_POST['t1'];
	  		$s="delete from booking where bookingid LIKE '%$d%' OR bookingid LIKE '%$d%'";
	 		mysqli_query($this->db_handle,$s);
	  		echo"<script language=javascript>alert('Record Delete')</script>";
	  		echo"<script>window.open('searchbooking.php',_self)</script>";
		}
	   else
			echo"<script language=javascript>alert('Database Not Found')</script>";
  	}
  }
$ob=new searchbooking();
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