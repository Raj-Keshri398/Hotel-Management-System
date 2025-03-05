<?php
include 'connect.php';
class onlinebooking extends connect
{
  public function __construct()
  {
	parent::__construct();
  }
  public function save()
  {
   	if($this->db_handle)
	{
		$s="insert into onlinebooking values('$_POST[t1]','$_POST[t2]','$_POST[t3]','$_POST[t4]','$_POST[t5]','$_POST[t6]','$_POST[t7]')";
	  	mysqli_query($this->db_handle , $s);
		if($this->db_handle)
		echo"<script language=javascript>alert('Booking Confirmed')</script>";
	  	echo"<script>window.open('onlinepagehotel.html',_self)</script>";
		
	}
   else
   {
     echo"<script language=javascript>alert('Database Not Found')</script>";
   }
  }
  public function getbooking()
    {
        if ($this->db_handle) 
	{
            $result = mysqli_query($this->db_handle, "select roomtype from room where (status) in ('Unbook') and (roomstatus) in ('Cleaned')");
            $rooms = array();
            while ($row = mysqli_fetch_assoc($result)) 
		{
                $rooms[] = $row['roomtype'];
            	}
            return $rooms;
		
        } 
	else 
	{
            return null;
        }
    }

}
$ob=new onlinebooking();
if(isset($_REQUEST["b1"]))
$ob->save();
?>

<!DOCTYPE html>
<html>
<head>
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<title>
Homepage
</title>
<style>
header {
  width: 100%;
  height: 50px;
  float: left;
  box-sizing: border-box;
  padding: 6px;
}

body {
  padding: 0;
  margin: 0;
}

#brand {
  padding: 0;
  margin: 0;
  font-family: sans-serif;
  float: left;  
}

#brand_s{
  color: orange;
}

#tag_line {
  float: right;
  margin: 0;
  padding: 0;
  margin-top: 10px;
}

nav{
  width: 100%;
  height: 75px;
  background-color: grey;
  float: left;
  box-sizing: border-box;
  padding: 20px;
}


#menu_table{
  width: 600px;
  height: 25px;
  float: right;
  box-sizing: border-box;
}

#menu_item{
  background-color: white;
  width: 20%;
  text-align: center;
  font-weight: bold;
}

a{
  text-decoration: none;
  color: black;
  font-family: sans-serif;
}

section{
  width: 100%;
  height: 2000px;
  float: left;
  box-sizing: border-box;
  border-width: 1px;
  border-style: solid;
  border-color: grey;
  padding: 5px;
}

#vid{
 width: 560px;
 padding: 50px;
}

#cda{
  float: left;
}

#phone{
  float: right;
}

#b_btn{
  color: black;
  font-size: 15px;
  font-family: sans-sarif;
  margin-top: 0;
  padding-right: 0;
  font-style: normal;
} 

#room{
  width: 100%;
  height: 550px;
  float: left;
  box-sizing: border-box;
  background-color: tarensparent;
  margin-top: 10px;
}

#room_title{
  color: black;
  text-align: center;
  font-size: 30px;
  font-style: sans-serif;
  margin: 0;
  padding: 0;
  margin-bottom: 1px;
}


fieldset {
  width: 590px;
  height: 560px;
  float: left;
  margin-left: 27px;
  border-width: 1px;
  border-style: solid;
  border-coloe: #ccc;
  box-sizing: border-box;
  margin-top: 90px;
}

legend {
 font-family: century gothic;
 font-size: 30px;
 font-weight: bold;
}

#book_online{
  font-size: 17px;
  font-family: sans-sarif;
}

#book_input{
  width: 100%;
  height: 28px;
  box-sizing: border-box;
  border-width: 1px;
  border-style: solid;
  border-color: #ccc;
}

#submit_btn{
  padding: 10px;
  font-size: 15px;
  border-width: 1px;
  border-style: solid;
  border-color: #ccc;
  background-color: white;
  font-weight: bold;
}

#about_us{
  width: 570px;
  height: 560px;
  float: right;
  border-width: 1px;
  border-style: solid;
  border-color: #ccc;
  margin-right: 27px;
  margin-top: 90px;
  box-sizing: border-box;
}


#abt_title{
 text-align: center;
 font-family: century gothic;
 font-size: 30px;
 font-weight: bold;
}

#abt_text{
  text-align: justify;
  font-family: sans-serif;
  line-height: 30px;
  padding: 10px;
  box-sizing: border-box;
}

#m_pic {
  float: left;
  width: 100%;
  box-sizing: border-box;
}

#more_pic {
  text-align: center;
  font-family: century gothic;
  font-size: 30px;
}

#picture {
  width: 260px;
  height: 310px;
  border-width: 1px;
  border-style: solid;
  border-color: #ccc;
  float: left;
  margin-right: 20px;
  margin-left: 30px;
}

#room_img{
  width: 220px;
  height: 200px;
  margin-top: 18px;
  margin-right: 18px;
  margin-left: 18px;
}

#r_price {
  padding: 0px;
  margin-top: 0px;
  font-style: italic;
  margin-left: 18px;
}
#book_btn {
  padding: 8px;
  width: 100px;
  background-color: white;
  border-width: 2px;
  border-style: solid;
  border-color: #ccc;
}

footer{
  width: 100%;
  height: 250px;
  box-sizing: border-box;
  float: left;
  background-color: grey;
}

#contact_us {
  width: 400px;
  height: 250px;
  box-sizing: border-box;
  float: left;
  border-width: 1px;
  border-style: solid;
  border-color: white;
  padding: 10px;
  padding-left: 30px;
}

#social_link {
  width: 400px;
  height: 250px;
  box-sizing: border-box;
  float: right;
  border-width: 1px;
  border-style: solid;
  border-color: white;
  padding: 10px;
  padding-left: 30px;
}

#between_text {
  float: left;
  padding: 20px;
  margin-left: 190px;
  font-size: 15px;
}
#contact_title {
  font-family: sans-sarif;
  font-weight: normal;
}

#cantact_detail {
  font-size: 20px;
  font-family: sans-sarif;
  margin-bottom: 10px;
}

#social_logo {
  width: 40px;
  margin-left: 10px;
}

#social_log {
  width: 130px;
}

</style>
<body>
<header>
	<h1 id="brand">Grand<span id="brand_s">Paradise</h1>
	<p id="tag_line">Thanks to finding me!</p>
</header>
  
<nav>
	<table id="menu_table">
	<tr>
		<td id="menu_item"><a href="#cda">Home</a></td>
		<td id="menu_item"><a href="#">Service</a></td>
		<td id="menu_item"><a href="#">Galary</a></td>
		<td id="menu_item"><a href="#about_us">About</a></td>
		<td id="menu_item"><a href="#contact_us">Contacts</a></td>
	</tr>
	</table>
</nav>
<section>
	<address id="cda">CDA Building Patna, Bihar - 800024 (982345634)</address>
	<address id="phone">
	<form>
		<a href="login.php"><h4  id="b_btn"><i class='bx bxs-home-alt-2'></i>Admin</h3></a>
	</form>
	</address>
	<div id="room">
		<h1 id="room_title">Our Luxuries Room</h1>
 		<video autoplay loop muted plays-inline  src="vid1.mp4"  alt="vid1.mp4" id="vid"></video>
		<video autoplay loop muted plays-inline  src="vid1.mp4"  alt="vid1.mp4" id="vid"></video>
	</div>
	<div id="m_pic">
		<h1 id="more_pic">Explore The Best Price</h1>
	</div>
 	<div id="picture">
		<img src="pic1.jpg" alt="a" id="room_img" />
		<h4 id="r_price">Delux Room (Price: 3000)</h4>
		<center>
		<a href="#form_box"><button id="book_btn">Book Here</button></a>
		<center>
	</div>
	<div id="picture">
		<img src="pic2.jpg" alt="a" id="room_img" />
		<h4 id="r_price">Super Delux Room (Price: 3000)</h4>
		<center>
		<a href="#form_box"><button id="book_btn">Book Here</button></a>
		<center>
	</div>
	<div id="picture">
		<img src="pic3.jpg" alt="a" id="room_img" />
		<h4 id="r_price">AC-Room (Price: 3000)</h4>
		<center>
		<a href="#form_box"><button id="book_btn">Book Here</button></a>
		<center>
	</div>
	<div id="picture">
		<img src="pic4.jpg" alt="a" id="room_img" />
		<h4 id="r_price">Non-AC Double-Bed (Price: 3000)</h4>
		<center>
		<a href="#form_box"><button id="book_btn">Book Here</button></a>
		<center>
	</div>
	<div id="picture">
		<img src="pic1.jpg" alt="a" id="room_img" />
		<h4 id="r_price">AC Double-Bed(Price: 3000)</h4>
		<center>
		<a href="#form_box"><button id="book_btn">Book Here</button></a>
		<center>
	</div>
	<div id="picture">
		<img src="pic2.jpg" alt="a" id="room_img" />
		<h4 id="r_price">Non-AC Single-Bed(Price: 3000)</h4>
		<center>
		<a href="#form_box"><button id="book_btn">Book Here</button></a>
		<center>
	</div>
	<div id="picture">
		<img src="pic3.jpg" alt="a" id="room_img" />
		<h4 id="r_price">AC Single_Bed(Price: 3000)</h4>
		<center>
		<a href="#form_box"><button id="book_btn">Book Here</button></a>
		<center>
	</div>
	<div id="picture">
		<img src="pic4.jpg" alt="a" id="room_img" />
		<h4 id="r_price">Sweet (Price: 3000)</h4>
		<center>
		<a href="#form_box"><button id="book_btn">Book Here</button></a>
		<center>
	</div>
	<fieldset id="form_box">
 		<legend>Book Online</legend>
		<form id="book_online" name=p method=post action='onlinepagehotel.php'>
		Your Name<br>
		<input type=text name=t1 id="book_input"><br><br>
		Mobile Number<br>
		<input type=number name=t2 id="book_input"><br><br>
		Aadhar Number<br>
		<input type=number name=t3 id="book_input"><br><br>
		Room Type<br>
		<select name=t4 id="book_input">
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
		<br><br>
		Booking Date<br>
		<input type=text name=t5 id="book_input"><br><br>
		Booking Time<br>
		<input type=text name=t6 id="book_input"><br><br>
		Number of People<br>
		<input type=text name=t7 id="book_input"><br><br>
		<center>
		<input type=submit name=b1 value="Click Here" id="submit_btn">
		</form>
	</fieldset>
	<div id="about_us">
		<h1 align="center" id="abt_title">About Us</h1>
		<hr>
		<p id="abt_text">Luxury Hotel: "Indulge in unparalleled luxury at [Hotel Name], where every detail is designed to pamper and inspire. Unwind in our spa 			oasis, savor Michelin-starred cuisine, and awaken to breathtaking views."
			Family-Friendly Hotel: "Create lasting memories at [Hotel Name], your family's gateway to [City/Region]. Splash in our pool paradise, explore 			kid-friendly adventures, and enjoy evenings filled with laughter and togetherness."Adventure Hotel: "Embrace the untamed spirit at [Hotel 			Name], your basecamp for epic adventures. Hike majestic mountains, kayak pristine waters, and fuel your explorations with our energizing 			cuisine. Return each night to a haven of comfort and camaraderie."
			Remember, the most important thing is to capture the essence of your hotel and what makes it special. Can't wait to hear more about your Grand 			Paradise Hotel!
		</p>
	</div>	
</section>

<footer>
	<div id="contact_us">
		<h1 id="contact_title">Contact Us!</h1>
		<address id="cantact_detail">Website : hotelforyou.com</address>
		<address id="cantact_detail">Phone No : +91 1234567890</address>
		<address id="cantact_detail">Address : CDA Building, Patna</address>
		<address id="cantact_detail">Email : keshriraj093@gmail.com</address>
	</div>
	<h4 id="between_text"><img src="namas.png" id="social_log"><pre>    Namaste!</pre></h4>
	<div id="social_link">
 		<h1 id="contact_title">Follow Us!</h1>
		<a href="https://www.facebook.com/profile.php?id=100008529876557"><img src="fbb.png" id="social_logo"></a>
		<a href="https://twitter.com/RajKeshri412247"><img src="twiiter.png" id="social_logo"></a>
		<a href="https://www.instagram.com/_raj___16/"><img src="instagram.png" id="social_logo"></a>
		between_text
	</div>
</footer>
</body>
</html>
