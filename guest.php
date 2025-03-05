<?php
include 'connect.php';
class guest extends connect
{
  public $a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l;
  public function __construct()
  {
	parent::__construct();
  }
  public function save()
  {
   	if($this->db_handle)
	{
  		 $k=0;
		$result=mysqli_query($this->db_handle, "select guestidno from guest");
		while($db_field=mysqli_fetch_assoc($result))
		{
			if($db_field['guestidno']==$_POST["t2"])

			{
			     $k=1;
			     break;
			}
		}
			if($k==0)
			{
				$s="insert into guest values('$_POST[t1]','$_POST[t2]','$_POST[t3]','$_POST[t4]','$_POST[t5]','$_POST[t6]','$_POST[t7]','$_POST[t8]','$_POST[t9]','$_POST[t10]','$_POST[t11]','$_POST[t12]')";
	  			mysqli_query($this->db_handle , $s);
	 			echo"<script language=javascript>alert('Record Save')</script>";
	  			echo"<script>window.open('guest.html',_self)</script>";
			}
			else
			echo"<script language=javascript>alert('Guest ID Already Exist')</script>";				
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
	  $s="delete from guest where guestidno='$_POST[t2]'";
	  mysqli_query($this->db_handle,$s);
	  echo"<script language=javascript>alert('Record Delete')</script>";
	  echo"<script>window.open('guest.html',_self)</script>";
	}
	else
	echo"<script language=javascript>alert('Database Not Found')</script>";
  }
  public function search()
  {
  	if($this->db_handle)
	{
		$result=mysqli_query($this->db_handle, "select * from guest where guestidno='$_POST[t2]'");
		while($db_field=mysqli_fetch_assoc($result))
		{
			$this->a=$db_field['id_type'];
			$this->b=$db_field['guestidno'];
			$this->c=$db_field['guesttit'];
			$this->d=$db_field['firstname'];
			$this->e=$db_field['lastname'];
			$this->f=$db_field['gender'];
			$this->g=$db_field['dob'];
			$this->h=$db_field['phoneno'];
			$this->i=$db_field['email'];
			$this->j=$db_field['address'];
			$this->k=$db_field['city'];
			$this->l=$db_field['country'];
		}
	}
  }
  public function update()
  {
  	if($this->db_handle)
	{
	  $s="update guest set id_type='$_POST[t1]', guesttit='$_POST[t3]', firstname='$_POST[t4]', lastname='$_POST[t5]', gender='$_POST[t6]', dob='$_POST[t7]', phoneno='$_POST[t8]', email='$_POST[t9]', address='$_POST[t10]', city='$_POST[t11]', country='$_POST[t12]' where guestidno='$_POST[t2]'";
	  mysqli_query($this->db_handle , $s);
 	  echo"<script language=javascript>alert('Record Updated')</script>";
	  echo"<script>window.open('guest.html',_self)</script>";
	}
	else
	  echo"<script language=javascript>alert('Database not found')</script>";
  }
  
   
}
$ob=new guest();
if(isset($_REQUEST["b1"]))
$ob->save();
if(isset($_REQUEST["b2"]))
$ob->delete();
if(isset($_REQUEST["b3"]))
$ob->search();
if(isset($_REQUEST["b4"]))
$ob->update();
?>


<form name=p method=post action='guest.php'>
<head>
<style>
 body{
background-image:;
background-repeat:no-repeat;
background-size: 100% 100%;
 }
 .form-container {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    background-color: #fff;
    color: black;
    width: 87%;
    box-shadow: 0px 0px 20px 0px black;
    border: 1px solid black;
    float: center; 
    margin: 70px 70px;
    font-size: 17px;
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
 
input[type=radio]{
  margin: 12px 2px;
 width: 20%;
}

.m{
  margin-right: 20px;
  margin-left: 20px;
 }


</style>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body bgcolor=#000>
<div class="form-container">
<h3 class="title">GUEST</h3>
<table>
<tr>
<th><p align=left class="m"><font color=black>ID Type</font></th>
<th><select name=t1 class=option value=<?php echo $ob->a; ?>>
<option>Select
<option>Aadhar card
<option>Voter Id Card
<option>Passport
<option>Driving License
</select></th>
<th><p align=left class="m"><font color=black>Guest Title</font></th>
<th><select name=t3 class=option value=<?php echo $ob->c; ?>>
<option>Select
<option>MR
<option>MRS
<option>MISS
<th rowspan=6><input type=button class="button" value=Home onclick="frontpage()"><br>
<input type=submit class="button" value=Save name=b1><br>
<input type=submit class="button" value=Delete name=b2><br>
<input type=submit class="button" value=Search name=b3><br>
<input type=submit class="button" value=Update name=b4><br>
<input type=button class="button" value="New" onclick="a()">
</tr>
<tr>
<th><p align=left class="m"><font color=black>Guest ID Number</font></th>
<th><input type=text name=t2 value=<?php echo $ob->b; ?>></th>
<th><p align=left class="m"><font color=black>First Name</font></th>
<th><input type=text name=t4 value=<?php echo $ob->d; ?>></th>
</tr>
<tr>
<th><p align=left class="m"><font color=black>Gender</font></p></th>
<th><input type=radio name=t6 value="Male" value=<?php echo $ob->f; ?>>Male
<input type=radio name=t6 value="Female" value=<?php echo $ob->f; ?>>Female</th>
<th><p align=left class="m"><font color=black>Last Name</font></th>
<th><input type=text name=t5 value=<?php echo $ob->e; ?>></th>
</tr>
<tr>
<th><p align=left class="m"><font color=black>Date Of Birth</font></th>
<th><input type=text name=t7 value=<?php echo $ob->g; ?>></th>
<th><p align=left class="m"><font color=black>Phone Number</font></th>
<th><input type=text name=t8 value=<?php echo $ob->h; ?>></th>
</tr>
<tr>
<th><p align=left class="m"><font color=black>Email</font></th>
<th><input type=text name=t9 value=<?php echo $ob->i; ?>></th>
<th><p align=left class="m"><font color=black>Address</font></th>
<th><input type=text name=t10 value=<?php echo $ob->j; ?>></th>
</tr>
<tr>
<th><p align=left class="m"><font color=black>City</font></th>
<th><input type=text name=t11 value=<?php echo $ob->k; ?>></th>
<th><p align=left class="m"><font color=black>Country</font></th>
<th><input type=text name=t12 value=<?php echo $ob->l; ?>></th>
</tr>
</form>
<form name=f method=post action=searchguest.php>
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
          p.t10.value=""
          p.t11.value=""
          p.t12.value=""
  }
  
</script>



