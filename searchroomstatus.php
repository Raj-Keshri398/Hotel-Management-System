<!DOCTYPE html>
<html>
<head>
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<style>
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

<body>
<tr>
<th><a href="roomstatus.php" id="back_btn"><i class='bx bx-arrow-back'></i></a></th>
</tr>
</body>
<?php
  include 'connect.php';
  class searchroomstatus extends connect
  {
  	public function __construct()
	{
	  parent::__construct();
	}
	public function allsearch()
	{
	  if($this->db_handle)
	  {
	  	$result=mysqli_query($this->db_handle,"select * from room where roomstatus='Uncleaned'");
		print"<table border=1>
		<tr>
			<th>Room Number</th>
			<th>Room Type</th>
			<th>Room Status</th>
		</tr>";
		while($db_field=mysqli_fetch_assoc($result))
		{
			print"<tr>";
			print"<td>".$db_field['roomno']."</td>";
			print"<td>".$db_field['roomtype']."</td>";
			print"<td>".$db_field['roomstatus']."</td>";
		}
	   }
	}
	
  }
$ob=new searchroomstatus();
if(isset($_REQUEST["b5"]))
$ob->allsearch();
?>