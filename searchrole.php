<?php
  include 'connect.php';
  class searchrole extends connect
  {
  	public function __construct()
	{
	  parent::__construct();
	}
	public function allsearch()
	{
	  if($this->db_handle)
	  {
	  	$result=mysqli_query($this->db_handle,"select * from role");
		print"<table border=1>
		<tr>
			<input type=text name=t1 placeholder=AllSearch required>
			<th>Role ID</th>
			<th>Role Title</th>
			<th>Role Description</th>
		</tr>";
		while($db_field=mysqli_fetch_assoc($result))
		{
			print"<tr>";
			print"<td>".$db_field['roleid']."</td>";
			print"<td>".$db_field['roletitle']."</td>";
			print"<td>".$db_field['roledescription']."</td>";
		}
	   }
	}
  }
$ob=new searchrole();
if(isset($_REQUEST["b5"]))
$ob->allsearch();
?>