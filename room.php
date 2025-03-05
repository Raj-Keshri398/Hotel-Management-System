
<?php
include 'connect.php';
class room extends connect
{
  public $a,$b,$c,$d,$e,$f,$g;
  public function __construct()
  {
	parent::__construct();
  }
  
  public function save()
  {
   	if($this->db_handle)
	{
	$k=0;
		$result=mysqli_query($this->db_handle, "select roomno from room");
		while($db_field=mysqli_fetch_assoc($result))
		{
			if($db_field['roomno']==$_POST["t1"])

			{
			     $k=1;
			     break;
			}
		}
			if($k==0)
			{

			 $s="insert into room values('$_POST[t1]','$_POST[t2]','$_POST[t3]','$_POST[t4]','$_POST[t5]','$_POST[t6]','$_POST[t7]')";
	  		 mysqli_query($this->db_handle , $s);
	  		 echo"<script language=javascript>alert('Record Save')</script>";
	 		 echo"<script>window.open('room.html',_self)</script>";
			}
			else
			echo"<script language=javascript>alert('Please Add New Room Number')</script>";				
	}
	else
	{
	  echo"<script language=javascript>alert('Database Not Found')</script>";
	}
  }
  
  public function search()
  {
  	if($this->db_handle)
	{
		$result=mysqli_query($this->db_handle, "select * from room where roomno='$_POST[t1]'");
		while($db_field=mysqli_fetch_assoc($result))
		{
			$this->a=$db_field['roomno'];
			$this->b=$db_field['roomtype'];
			$this->c=$db_field['roomcharge'];
			$this->d=$db_field['hotelcode'];
			$this->e=$db_field['description'];
			$this->f=$db_field['status'];
			$this->g=$db_field['roomstatus'];
		}
	}
  }
  public function update()
  {
  	if($this->db_handle)
	{
	  $s="update room set roomtype='$_POST[t2]', roomcharge='$_POST[t3]', hotelcode='$_POST[t4]', description='$_POST[t5]', status='$_POST[t6]', roomstatus='$_POST[t7]' where roomno='$_POST[t1]'";
	  mysqli_query($this->db_handle , $s);
 	  echo"<script language=javascript>alert('Record Updated')</script>";
	  echo"<script>window.open('room.html',_self)</script>";
	}
	else
	  echo"<script language=javascript>alert('Database not found')</script>";
  }
  
   
}
$ob=new room();
if(isset($_REQUEST["b1"]))
$ob->save();
if(isset($_REQUEST["b3"]))
$ob->search();
if(isset($_REQUEST["b4"]))
$ob->update();
?>

<form name=p method=post action='room.php'>
<head>
<style>
  body{
background-image:"room.jpg";
background-repeat:no-repeat;
background-size: 100% 100vh;
 }
 .form-container {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    background-color: #fff;
    color: black;
    width: 36em;
    box-shadow: 0px 0px 20px 0px black;
    border: 1px solid black;
    float: center; 
    margin: 10px 25%;
}
.title {
    font-size: 1.5rem;
    margin-bottom: 1rem;
    margin-top:1rem;
    font-family:sans-sarif;
    background-color: black;
    color: white;
    width: 8em;
    text-align: center;
} 

.form-container  .option{
  width: 100%;
  margin: 2px 0;
  box-sizing: border-box;
  background-color: white;
  color: black;
}

input[type=text] {
  width: 100%;
  padding: 10px 25px;
  margin: 2px 0;
  box-sizing: border-box;
  background-color: white;
  color: black;
}


.button {
  background-color: #000;
  border: black;
  color: white;
  width: 100%;
  padding: 10px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 13px;
  margin: 6px 18px 10px;
  cursor: pointer;
}

</style>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body background="room.jpg">
<div class="form-container">
<h3 class="title">ADD ROOM</h3>
<table>
<tr>
<th><p align=left><font color=black>Room No</font></th>
<th><input type=text name=t1 value=<?php echo $ob->a; ?>></th>
<th rowspan=5><input type=button class="button" value=Home onclick="frontpage()"><br>
<input type=submit class="button" value=Save name=b1><br>
<input type=submit class="button" value=Search name=b3><br>
<input type=submit class="button" value=Update name=b4><br>
<input type=button class="button" value=New onclick="a()">
</tr>
<tr>
<th><p align=left><font color=black>Room Type </font></th>
<th><input type=text name=t2 value=<?php echo $ob->b; ?>></th>
</tr>
<tr>
<th><p align=left><font color=black>Room Charge</font></th>
<th><input type=text name=t3 value=<?php echo $ob->c; ?>></th>
</tr>
<tr>
<th><p align=left><font color=black>Hotel Code</font></th>
<th><input type=text name=t4 value=<?php echo $ob->d; ?>></th>
</tr>
<tr>
<th><p align=left><font color=black>Description</font></th>
<th><input type=text name=t5 value=<?php echo $ob->e; ?>></th>
</tr>
<tr>
<th><p align=left><font color=black>Status</font></th>
<th><input type=text name=t6 value=<?php echo $ob->f; ?>></th>
</tr>
<tr>
<th><p align=left><font color=black>Room Status</font></th>
<th><input type=text name=t7 value=<?php echo $ob->g; ?>></th>
</tr>
</form>
<tr>
<form name=f method=post action=searchroom.php>
<th><input type=submit class='button' value=Allserach name=b6></th>
</form>
<form name=g method=post action=searchonlinebookingroom.php>
<th><input type=submit class='button' value="Online Booking" name=b7></th>
</form>
</tr>
</table>
</body>
<script>
  function frontpage()
  {
	  window.open("frontpage.php")
  }
  function a()
  {
	p.t1.value=""
	p.t2.value=""
	p.t3.value=""
      	p.t4.value=""
      	p.t5.value=""
	p.t6.value=""
      	p.t7.value=""
  }
</script>


