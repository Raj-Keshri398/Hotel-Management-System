
<?php
include 'connect.php';
class roomstatus extends connect
{
 public $a,$b,$c,$d,$e,$f;
   public function __construct()
   {
	parent::__construct();
   }
   public function save()
   {
  	if($this->db_handle)
	{
  			$s="insert into roomstatus values('$_POST[t1]','$_POST[t2]','$_POST[t3]','$_POST[t4]','$_POST[t5]','$_POST[t6]')";
			mysqli_query($this->db_handle, "update room set roomstatus='Cleaned' Where roomno=$_POST[t1]");
 			mysqli_query($this->db_handle , $s);
			echo"<script language=javascript>alert('Record Save')</script>";
 			echo"<script>window.open('roomstatus.html',_self)</script>";
		
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
			$this->c=$db_field['roomstatus'];
		}
	}
  }
  public function update()
  {
  	if($this->db_handle)
	{
	  $s="update room set rmtype='$_POST[t2]', roomstatus='$_POST[t3]', roleid='$_POST[t4]', date='$_POST[t5]', time='$_POST[t6]' where roomstatus='$_POST[t1]'";
	  mysqli_query($this->db_handle , $s);
 	  echo"<script language=javascript>alert('Record Updated')</script>";
	  echo"<script>window.open('roomno.html',_self)</script>";
	}
	else
	  echo"<script language=javascript>alert('Database not found')</script>";
  }
  
}
$ob=new roomstatus();
if(isset($_REQUEST["b1"]))
$ob->save();
if(isset($_REQUEST["b2"]))
$ob->search();
if(isset($_REQUEST["b4"]))
$ob->update();
?>

<form name=p method=post action='roomstatus.php'>
<head>
<style>
  body {
	padding: 0;
	margin: 0;
	background-image:"roomtype.jpg";
	background-repeat:no-repeat;
	background-size: 100% 100%;
 }

 .form-container {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    background-color: transparent;
    color: black;
    width: 50%;
    box-shadow: 0px 0px 20px 0px black;
    border: 1px solid black;
    float: center; 
    margin: 50px 30%;
    font-size: 17px;
}
.title {
    font-size: 1rem;
    margin-bottom: 1rem;
    margin-top:1rem;
    font-family:sans-sarif;
    background-color: black;
    color: white;
    width: 8em;
    text-align: center;
} 
input[type=text] {
  width: 100%;
  padding: 10px 20px;
  margin: 2px 0;
  box-sizing: border-box;
  background-color: white;
  color: black;
}

.form-container  .option{
  width: 100%;
  margin: 2px 0;
  box-sizing: border-box;
  background-color: white;
  color: black;
}

.m{
  margin-right: 20px;
  margin-left: 20px;
 }

.button {
  background-color: #000;
  border: black;
  color: white;
  width: 70%;
  padding: 10px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 12px;
  margin: 6px 18px 10px;
  cursor: pointer;
}

</style>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
<div class="form-container">
<h3 class="title">ROOM STATUS</h3>
<table>
<tr>
<th><p align=left><font color=black>Room No.</font></th>
<th><input type=text name=t1 value=<?php echo $ob->a; ?>></th>
<th rowspan=5><input type=button class="button" value=Home onclick="frontpage()"><br>
<input type=submit class="button" value=Save name=b1><br>
<input type=submit class="button" value=R-Search name=b2><br>
<input type=submit class="button" value=Update name=b4>
<input type=reset class="button" value=New></th>
</tr>
<tr>
<th><p align=left><font color=black>Room Type</font></th>
<th><input type=text name=t2 value=<?php echo $ob->b; ?>></th>
</tr>
<tr>
<th><p align=left><font color=black>Room Status</font></th>
<th><input type=text name=t3 value=<?php echo $ob->c; ?>></th>
</tr>
<tr>
<th><p align=left><font color=black>Role ID</font></th>
<th><input type=text name=t4 value=<?php echo $ob->d; ?>></th>
</tr>
<tr>
<th><p align=left><font color=black>Date</font></th>
<th><input type=text name=t5 value=<?php echo $ob->e; ?>></th>
</tr>
<tr>
<th><p align=left><font color=black>Time</font></th>
<th><input type=text name=t6 value=<?php echo $ob->f; ?>></th>
</tr>
</div>
</form>
<tr>
<form name=f method=post action=searchroomstatus.php>
<th><input type=submit class='button' value=Allserach name=b5></th>
</form>
</tr>
</table>
</body>
<script>
  function frontpage()
  {
	  window.open("frontpage.php")
  }
</script>
