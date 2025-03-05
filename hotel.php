<?php
include 'connect.php';
class hotel extends connect
{
  public $a,$b,$c,$d,$e,$f,$g,$h,$i;
  public function __construct()
  {
	parent::__construct();
  }
  public function save()
  {
   	if($this->db_handle)
	{
		$s="insert into hotel values('$_POST[t1]','$_POST[t2]','$_POST[t3]','$_POST[t4]','$_POST[t5]','$_POST[t6]','$_POST[t7]','$_POST[t8]','$_POST[t9]')";
	  	mysqli_query($this->db_handle , $s);
	 	echo"<script language=javascript>alert('Record Save')</script>";
	  	echo"<script>window.open('hotel.html',_self)</script>";
					
	}
	else
	{
	  echo"<script language=javascript>alert('Database Not Found')</script>";
	}
  }
  public function delete()
  {
	if($this->db_handle)
	{
	  $s="delete from hotel where hotelcode='$_POST[t1]'";
	  mysqli_query($this->db_handle,$s);
	  echo"<script language=javascript>alert('Record Delete')</script>";
	  echo"<script>window.open('hotel.html',_self)</script>";
	}
	else
	echo"<script language=javascript>alert('Database Not Found')</script>";
  }
  public function search()
  {
  	if($this->db_handle)
	{
		$result=mysqli_query($this->db_handle, "select * from hotel where hotelcode='$_POST[t1]'");
		while($db_field=mysqli_fetch_assoc($result))
		{
			$this->a=$db_field['hotelcode'];
			$this->b=$db_field['hotelname'];
			$this->c=$db_field['address'];
			$this->d=$db_field['postcode'];
			$this->e=$db_field['city'];
			$this->f=$db_field['country'];
			$this->g=$db_field['numberofroom'];
			$this->h=$db_field['phone_no'];
			$this->i=$db_field['star_rating'];
		}
	}
  }
  public function update()
  {
  	if($this->db_handle)
	{
	  $s="update hotel set hotelname='$_POST[t2]', address='$_POST[t3]', postcode='$_POST[t4]', city='$_POST[t5]', country='$_POST[t6]', numberofroom='$_POST[t7]', phone_no='$_POST[t8]', star_rating='$_POST[t9]' where hotelcode='$_POST[t1]'";
	  mysqli_query($this->db_handle , $s);
 	  echo"<script language=javascript>alert('Record Updated')</script>";
	  echo"<script>window.open('hotel.html',_self)</script>";
	}
	else
	  echo"<script language=javascript>alert('Database not found')</script>";
  }
  
   
}
$ob=new hotel();
if(isset($_REQUEST["b1"]))
$ob->save();
if(isset($_REQUEST["b2"]))
$ob->delete();
if(isset($_REQUEST["b3"]))
$ob->search();
if(isset($_REQUEST["b4"]))
$ob->update();
?>

<form name=p method=post action='hotel.php'>
<head>
<style>
  body{
background-image:"hotel.jpeg";
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
    width: 36em;
    box-shadow: 0px 0px 20px 0px black;
    border: 1px solid black;
    float: center; 
    margin: 30px 20px;
}
.title {
    font-size: 1.5rem;
    margin-bottom: 1rem;
    margin-top:1rem;
    font-family:sans-sarif;
    background-color: #000;
    color: #fff;
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
  padding: 6px 25px;
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
  font-size: 12px;
  margin: 6px 18px 10px;
  cursor: pointer;
}
  

</style>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body background="hotel.jpeg">
<div class="form-container">
<h3 class="title">HOTEL</h3>
<table>
<tr>
<th><p align=left><font color=white>Hotel Code</font></th>
<th><input type=text name=t1 value=<?php echo $ob->a; ?>></th>
<th rowspan=10><input type=button class="button" value=Home onclick="frontpage()"><br>
<input type=submit class="button" value=Save name=b1><br>
<input type=submit class="button" value=Delete name=b2><br>
<input type=submit class="button" value=Search name=b3><br>
<input type=submit class="button" value=Update name=b4><br>
<input type=button class="button" value="New" onclick="a()">
</tr>
<tr>
<th><p align=left><font color=white>Hotel Name</font></th>
<th><input type=text name=t2 value=<?php echo $ob->b; ?>></th>
</tr>
<tr>
<th><p align=left><font color=white>Address</font></th>
<th><input type=text name=t3 value=<?php echo $ob->c; ?>></th>
</tr>
<tr>
<th><p align=left><font color=white>PostCode</font></th>
<th><input type=text name=t4 value=<?php echo $ob->d; ?>></th>
</tr>
<tr>
<th><p align=left><font color=white>City</font></th>
<th><input type=text name=t5 value=<?php echo $ob->e; ?>></th>
</tr>
<tr>
<th><p align=left><font color=white>Country</font></th>
<th><input type=text name=t6 value=<?php echo $ob->f; ?>></th>
</tr>
<tr>
<th><p align=left><font color=white>Number Of Rooms</font></th>
<th><input type=text name=t7 value=<?php echo $ob->g; ?>></th>
</tr>
<tr>
<th><p align=left><font color=white>Phone Number</font></th>
<th><input type=text name=t8 value=<?php echo $ob->h; ?>></th>
</tr>
<tr>
<th><p align=left><font color=white>Star Rating</font></th>
<th><input type=text name=t9 value=<?php echo $ob->i; ?>></th>
</tr>
</form>
<form name=f method=post action=searchhotel.php>
<th><input type=submit class='button' value=Allserach name=b5></th>
</form>
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
      	p.t8.value=""
      	p.t9.value=""
  }
</script>
