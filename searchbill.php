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
<th><a href="bill.php" id="back_btn"><i class='bx bx-arrow-back'></i></a></th>
</tr>
<div id="search_container">
  <form name="f" method="post" action="searchbill.php">
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
  class searchbill extends connect
  {
  	public function __construct()
	{
	  parent::__construct();
	}
	public function allsearch()
	{
	  if($this->db_handle)
	  {
	  	$result=mysqli_query($this->db_handle,"select * from bill");
		print"<table border=1>
		<tr>
			<th>Invoice Number</th>
			<th>Booking ID</th>
			<th>Guest ID Number</th>
			<th>Room No</th>
			<th>Room Charge</th>
			<th>Deposit Payment</th>
			<th>Service Charge</th>
			<th>Stay Days</th>
			<th>Food Charge</th>
			<th>Total Payment</th>
			<th>Payment Date</th>
			<th>Payment Mode</th>
			<th>Check In Date</th>
			<th>check Out Date</th>
			<th>Check In Time</th>
			<th>Check Out Time</th>
		</tr>";
		while($db_field=mysqli_fetch_assoc($result))
		{
			print"<tr>";
			print"<td>".$db_field['invoiceno']."</td>";
			print"<td>".$db_field['bookingid']."</td>";
			print"<td>".$db_field['guestid']."</td>";
			print"<td>".$db_field['roomno']."</td>";
			print"<td>".$db_field['roomcharge']."</td>";
			print"<td>".$db_field['deppayment']."</td>";
			print"<td>".$db_field['servicecharge']."</td>";
			print"<td>".$db_field['staydays']."</td>";
			print"<td>".$db_field['foodchg']."</td>";
			print"<td>".$db_field['totpayment']."</td>";
			print"<td>".$db_field['paymentdate']."</td>";
			print"<td>".$db_field['paymentmode']."</td>";
			print"<td>".$db_field['chkindate']."</td>";
			print"<td>".$db_field['chkoutdate']."</td>";
			print"<td>".$db_field['chkintime']."</td>";
			print"<td>".$db_field['chkouttime']."</td>";
		}
	   }
	}
	public function submit()
	{
	  if($this->db_handle)
	  {
		$b=$_POST['t1'];
	  	$result=mysqli_query($this->db_handle,"select * from bill where invoiceno LIKE '%$b%' OR bookingid LIKE '%$b%'");
		print"<table border=1>
		<tr>
			<input type=text name=t1 placeholder=AllSearch required>
			<th>Invoice Number</th>
			<th>Booking ID</th>
			<th>Guest ID Number</th>
			<th>Room No</th>
			<th>Room Charge</th>
			<th>Deposit Payment</th>
			<th>Service Charge</th>
			<th>Stay Days</th>
			<th>Food Charge</th>
			<th>Total Payment</th>
			<th>Payment Date</th>
			<th>Payment Mode</th>
			<th>Check In Date</th>
			<th>check Out Date</th>
			<th>Check In Time</th>
			<th>Check Out Time</th>
		</tr>";
		while($db_field=mysqli_fetch_assoc($result))
		{
			print"<tr>";
			print"<td>".$db_field['invoiceno']."</td>";
			print"<td>".$db_field['bookingid']."</td>";
			print"<td>".$db_field['guestid']."</td>";
			print"<td>".$db_field['roomno']."</td>";
			print"<td>".$db_field['roomcharge']."</td>";
			print"<td>".$db_field['deppayment']."</td>";
			print"<td>".$db_field['servicecharge']."</td>";
			print"<td>".$db_field['staydays']."</td>";
			print"<td>".$db_field['foodchg']."</td>";
			print"<td>".$db_field['totpayment']."</td>";
			print"<td>".$db_field['paymentdate']."</td>";
			print"<td>".$db_field['paymentmode']."</td>";
			print"<td>".$db_field['chkindate']."</td>";
			print"<td>".$db_field['chkoutdate']."</td>";
			print"<td>".$db_field['chkintime']."</td>";
			print"<td>".$db_field['chkouttime']."</td>";
		}
	   }
	}
	public function delete()
  	{
	   if($this->db_handle)
		{		
			$d=$_POST['t1'];
	  		$s="delete from bill where invoiceno LIKE '%$d%' OR bookingid LIKE '%$d%'";
	 		 mysqli_query($this->db_handle,$s);
	  		echo"<script language=javascript>alert('Record Delete')</script>";
	  		echo"<script>window.open('searchbill.html',_self)</script>";
		}
	   else
			echo"<script language=javascript>alert('Database Not Found')</script>";
  	}

  }
$ob=new searchbill();
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