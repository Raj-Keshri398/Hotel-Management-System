<?php
include 'connect.php';
class bill extends connect
{
  public $a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o,$p;
  public function __construct()
  {
	parent::__construct();
  }

  public function getbooking()
  {
    if ($this->db_handle) 
	{
        $result = mysqli_query($this->db_handle, "select bookingid from booking where checkoutdate='0' and checkouttime='0'");
        $bookings = array();
        while ($row = mysqli_fetch_assoc($result)) 
		{
           		 $bookings[] = $row['bookingid'];
       		}
        return $bookings;
    	} 
	else 
	{
        return null;
    	}
  }

  public function save()
  {
   	if($this->db_handle)
	{
	$k=0;
		$result=mysqli_query($this->db_handle, "select invoiceno from bill");
		while($db_field=mysqli_fetch_assoc($result))
		{
			if($db_field['invoiceno']==$_POST["t1"])

			{
			     $k=1;
			     break;
			}
		}
			if($k==0)
			{
				$s="insert into bill values('$_POST[t1]','$_POST[t2]','$_POST[t3]','$_POST[t4]','$_POST[t5]','$_POST[t6]','$_POST[t7]','$_POST[t8]','$_POST[t9]','$_POST[t10]','$_POST[t11]','$_POST[t12]','$_POST[t13]','$_POST[t14]','$_POST[t15]','$_POST[t16]')";
				mysqli_query($this->db_handle, "update room set status='Unbook' where roomno=$_POST[t4]");
				mysqli_query($this->db_handle, "update booking set checkoutdate='$_POST[t14]', checkouttime='$_POST[t16]' where roomno=$_POST[t4]");
				mysqli_query($this->db_handle, "update room set roomstatus='Uncleaned' Where roomno=$_POST[t4]");
	  			mysqli_query($this->db_handle , $s);
	 			echo"<script language=javascript>alert('Record Save')</script>";
	  			echo"<script>window.open('bill.html',_self)</script>";
				
			}
			else
			echo"<script language=javascript>alert('Please Generate New Invoice')</script>";				
					
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
	  $s="delete from bill where invoiceno='$_POST[t1]'";
	  mysqli_query($this->db_handle,$s);
	  echo"<script language=javascript>alert('Record Delete')</script>";
	  echo"<script>window.open('bill.html',_self)</script>";
	}
	else
	echo"<script language=javascript>alert('Database Not Found')</script>";
  }

  public function search()
  {
  	if($this->db_handle)
	{
		$result=mysqli_query($this->db_handle, "select * from booking where bookingid='$_POST[t2]'");
		while($db_field=mysqli_fetch_assoc($result))
		{
			$this->b=$db_field['bookingid'];
			$this->c=$db_field['guestid'];
			$this->d=$db_field['roomno'];
			$this->e=$db_field['roomchg'];
			$this->f=$db_field['deppayment'];
			$this->m=$db_field['checkindate'];
			$this->o=$db_field['checkintime'];
		}
	}
  }

  public function update()
  {
  	if($this->db_handle)
	{
	  $s="update bill set bookingid='$_POST[t2]', guestid='$_POST[t3]', roomno='$_POST[t4]', roomcharge='$_POST[t5]', deppayment='$_POST[t6]', servicecharge='$_POST[7]', staydays='$_POST[8]',foodchg='$_POST[t9]', totpayment='$_POST[t10]', paymentdate='$_POST[t11]', paymentmode='$_POST[t12]', chkindate='$_POST[t13]', chkoutdate='$_POST[t14]',chkintime='$_POST[t15]', chkouttime='$_POST[t16]' where invoiceno='$_POST[t1]'";
	  	mysqli_query($this->db_handle , $s);
 	  	echo"<script language=javascript>alert('Record Updated')</script>";
	  	echo"<script>window.open('bill.html',_self)</script>";
	}
	else
	  echo"<script language=javascript>alert('Database not found')</script>";
  }
   
}
$ob=new bill();
if(isset($_REQUEST["b1"]))
$ob->save();
if(isset($_REQUEST["b2"]))
$ob->delete();
if(isset($_REQUEST["b3"]))
$ob->search();
if(isset($_REQUEST["b4"]))
$ob->update();
?>

<form name=p method=post action='bill.php'>
<head>
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
<form name=p method=post action='bill.php'>
<div class="form-container">
<h3 class="title">BILL</h3>
<table>
<tr>
<th><p align=left class="m"><font color=black>Invoice No.</font></th>
<th><input type=text name=t1 value=<?php echo $ob->a; ?>></th>
<th><p align=left class="m"><font color=black>Booking ID</font></th>
<th><select name=t2 class=option value=<?php echo $ob->b; ?>>
<option>Select
<?php
            $bookings = $ob->getbooking();

            if ($bookings) 
		{
                foreach ($bookings as $booking) 
		{
                    echo '<option value="' . $booking . '">' . $booking . '</option>';
                }
            }
        ?>
    </select></th>

<th rowspan=8><input type=button class="button" value=Home onclick="frontpage()"><br>
<input type=submit class="button" value=Save name=b1><br>
<input type=submit class="button" value=Delete name=b2><br>
<input type=submit class="button" value=Search name=b3><br>
<input type=submit class="button" value=Update name=b4><br>
<input type=reset class="button" value=New ></th>
</tr>
<tr>
<th><p align=left class="m"><font color=black>Guest Id Number</font></th>
<th><input type=text name=t3 value=<?php echo $ob->c; ?>></th>
<th><p align=left class="m"><font color=black>Room No</font></th>
<th><input type=text name=t4 value=<?php echo $ob->d; ?>></th>
</tr>
<tr>
<th><p align=left class="m"><font color=black>Room Charge</font></th>
<th><input type=text name=t5 value=<?php echo $ob->e; ?>></th>
<th><p align=left class="m"><font color=black>Deposit Payment</font></th>
<th><input type=text name=t6 value=<?php echo $ob->f; ?>></th>
</tr>
<tr>
<th><p align=left class="m"><font color=black>Service Charge</font></th>
<th><input type=text name=t7 value=<?php echo $ob->g; ?>></th>
<th><p align=left class="m"><font color=black>Stay Days</font></th>
<th><input type=text name=t8 value=<?php echo $ob->h; ?>></th>
</tr>
<tr>
<th><p align=left class="m"><font color=black>Food Charge</font></th>
<th><input type=text name=t9 value=<?php echo $ob->i; ?>></th>
<th><p align=left class="m"><font color=black>Total Payment</font></th>
<th><input type=text name=t10 value=<?php echo $ob->j; ?>></th>
</tr>
<tr>
<th><p align=left class="m"><font color=black>Payment Date</font></th>
<th><input type=text name=t11 value=<?php echo $ob->k; ?>></th>
<th><p align=left class="m"><font color=black>Payment Mode</font></th>
<th><input type=text name=t12 value=<?php echo $ob->l; ?>></th>
</tr>
<tr>
<th><p align=left class="m"><font color=black>Check In Date</font></th>
<th><input type=text name=t13 value=<?php echo $ob->m; ?>></th>
<th><p align=left class="m"><font color=black>Check Out Date</font></th>
<th><input type=text name=t14 value=<?php echo $ob->n; ?>></th>
</tr>
<tr>
<th><p align=left class="m"><font color=black>Check In Time</font></th>
<th><input type=text name=t15 value=<?php echo $ob->o; ?>></th>
<th><p align=left class="m"><font color=black>Check Out Time</font></th>
<th><input type=text name=t16 value=<?php echo $ob->p; ?>></th>
</tr>
</form>
<form name=f method=post action=searchbill.php>
<th><input type=submit class='button' value=Allserach name=b5></th>
</form>
</tr>
</table>
</div>
</body>
<script>
  function frontpage()
  {
	  window.open("frontpage.php")
  }
</script>
