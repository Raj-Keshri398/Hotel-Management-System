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
			<input type=text name=t1 placeholder=AllSearch required>
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
  }
$ob=new searchemployee();
$ob->allsearch();
?>