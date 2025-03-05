<?php
include 'connect.php';
class booking extends connect
{
  public $a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n;
  public function __construct()
  {
	parent::__construct();
  }
  public function save()
  {
   	if($this->db_handle)
	{
  		$k=0;
		$result=mysqli_query($this->db_handle, "select bookingid from booking");
		while($db_field=mysqli_fetch_assoc($result))
		{
			if($db_field['bookingid']==$_POST["t1"])

			{
			     $k=1;
			     break;
			}
		}
			if($k==0)
			{
				$s="insert into booking values('$_POST[t1]','$_POST[t2]','$_POST[t3]','$_POST[t4]','$_POST[t5]','$_POST[t6]','$_POST[t7]','$_POST[t8]','$_POST[t9]','$_POST[t10]','$_POST[t11]','$_POST[t12]')";
	  			mysqli_query($this->db_handle , $s);
				mysqli_query($this->db_handle, "update room set status='Book' where roomno=$_POST[t4]");
	 			echo"<script language=javascript>alert('Record Save')</script>";
	  			echo"<script>window.open('booking.html',_self)</script>";
			}
			else
			echo"<script language=javascript>alert('Booking ID Already Exist')</script>";				
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
	  $s="delete from booking where bookingid='$_POST[t1]'";
	  mysqli_query($this->db_handle,$s);
	  echo"<script language=javascript>alert('Record Delete')</script>";
	  echo"<script>window.open('booking.html',_self)</script>";
	}
	else
	echo"<script language=javascript>alert('Database Not Found')</script>";
  }
  public function search()
  {
  	if($this->db_handle)
	{
		$result=mysqli_query($this->db_handle, "select * from booking where bookingid='$_POST[t1]'");
		while($db_field=mysqli_fetch_assoc($result))
		{
			$this->a=$db_field['bookingid'];
			$this->b=$db_field['hotelcode'];
			$this->c=$db_field['guestid'];
			$this->d=$db_field['roomno'];
			$this->e=$db_field['deppayment'];
			$this->f=$db_field['roomchg'];
			$this->g=$db_field['checkindate'];
			$this->h=$db_field['checkoutdate'];
			$this->i=$db_field['checkintime'];
			$this->j=$db_field['checkouttime'];
			$this->k=$db_field['numofadult'];
			$this->l=$db_field['numofchild'];
		}
	}
  }
  public function update()
  {
  	if($this->db_handle)
	{
	  $s="update booking set hotelcode='$_POST[t2]', guestid='$_POST[t3]', roomno='$_POST[t4]', deppayment='$_POST[t5]', roomchg='$_POST[t6]', checkindate='$_POST[t7]', checkoutdate='$_POST[t8]', checkintime='$_POST[t9]', checkouttime='$_POST[t10]' ,numofadult='$_POST[t11]', numofchild='$_POST[t12]' where guestidno='$_POST[t1]'";
	  mysqli_query($this->db_handle , $s);
 	  echo"<script language=javascript>alert('Record Updated')</script>";
	  echo"<script>window.open('booking.html',_self)</script>";
	}
	else
	  echo"<script language=javascript>alert('Database not found')</script>";
  }
  public function getbooking()
    {
        if ($this->db_handle) 
	{
            $result = mysqli_query($this->db_handle, "select roomno from room where (status) in ('Unbook') and (roomstatus) in ('Cleaned')");
            $rooms = array();
            while ($row = mysqli_fetch_assoc($result)) 
		{
                $rooms[] = $row['roomno'];
            	}
            return $rooms;
		
        } 
	else 
	{
            return null;
        }
    }

    public function gethotel()
    {
        if ($this->db_handle) 
	{
            $result = mysqli_query($this->db_handle, "select hotelcode from hotel");
            $hotels = array();
            while ($row = mysqli_fetch_assoc($result)) 
		{
                $hotels[] = $row['hotelcode'];
            	}
            return $hotels;
		
        } 
	else 
	{
            return null;
        }
    }
    
}
$ob=new booking();
if(isset($_REQUEST["b1"]))
$ob->save();
if(isset($_REQUEST["b2"]))
$ob->delete();
if(isset($_REQUEST["b3"]))
$ob->search();
if(isset($_REQUEST["b4"]))
$ob->update();

?>

<form name=p method=post action='booking.php'><head>
<style>
  body{
background-image:"back16.jpg";
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
    width: 90%;
    box-shadow: 0px 0px 20px 0px black;
    border: 1px solid black;
    float: center; 
    margin: 30px 10px;
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
<body>
<div class="form-container">
<h3 class="title">BOOKING</h3>
<table>
<tr>
<th><p align=left class="m"><font color=black>Booking ID</font></th>
<th><input type=text name=t1 value=<?php echo $ob->a; ?>></th>
<th><p align=left class="m"><font color=black>Hotel Code</font></th>
<th><select name=t2 class=option value=<?php echo $ob->b; ?>>
<option>Select
<?php
            $hotels = $ob->gethotel();

            if ($hotels) 
		{
                foreach ($hotels as $hotel) 
		{
                    echo '<option value="' . $hotel . '">' . $hotel . '</option>';
                }
            }
        ?>
    </select></th>
<th></th>
<th rowspan=5><input type=button class="button" value=Home onclick="frontpage()"><br>
<input type=submit class="button" value=Save name=b1><br>
<input type=submit class="button" value=Delete name=b2><br>
<input type=submit class="button" value=Search name=b3><br>
<input type=submit class="button" value=Update name=b4><br>
<input type=button class="button" value=New onclick="a()"></th>
</tr>
<tr>
<th><p align=left class="m"><font color=black>Guest Id</font></th>
<th><input type=text name=t3 value=<?php echo $ob->c; ?>></th>
<th><p align=left class="m" ><font color=black>Room No</font></th>
<th><select  id="roomno" name=t4 class=option value=<?php echo $ob->d; ?>>
<option>Select
<?php
            $rooms = $ob->getbooking();

            if ($rooms) 
		{
                foreach ($rooms as $room) 
		{
                    echo '<option value="' . $room . '">' . $room . '</option>';
                }
            }
        ?>
   </select></th>
</tr>
<tr>
<th><p align=left class="m"><font color=black>Deposit Payment</font></th>
<th><input type=text name=t5 value=<?php echo $ob->e; ?>></th>
<th><p align=left class="m"><font color=black>Room Charge</font></th>
<th><input type=text name=t6 value=<?php echo $ob->f; ?>></th>
</tr>
<tr>
<th><p align=left class="m"><font color=black>Check In Date</font></th>
<th><input type=text name=t7 value=<?php echo $ob->g; ?>></th>
<th><p align=left class="m"><font color=black>Check Out Date</font></th>
<th><input type=text name=t8 value=<?php echo $ob->h; ?>></th>
</tr>
<tr>
<th><p align=left class="m"><font color=black>Check In Time</font></th>
<th><input type=text name=t9 value=<?php echo $ob->i; ?>></th>
<th><p align=left class="m"><font color=black>Check Out Time</font></th>
<th><input type=text name=t10 value=<?php echo $ob->j; ?>></th>
</tr>
<tr>
<th><p align=left class="m"><font color=black>Number of Adult</font></th>
<th><input type=text name=t11 value=<?php echo $ob->k; ?>></th>
<th><p align=left class="m"><font color=black>Number of Children</font></th>
<th><input type=text name=t12 value=<?php echo $ob->l; ?>></th>
</tr>
</form>
<tr>
<form name=f method=post action=searchbooking.php>
<th><input type=submit class='button' value=Allserach name=b5></th>
</form>
<form name=g method=post action=searchroom.php>
<th><input type=submit class='button' value=Room-Details name=b6></th>
</form>
</tr>
</table>
</body>
<script>
  function frontpage()
  {
	  window.open("frontpage.php")
  }
  function room()
  {
	window.open("searchroom.php")
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
      p.t13.value=""
      p.t14.value=""    
  }
  
</script>
