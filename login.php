<?php
include 'connect.php';

class login extends connect
{
    public function __construct()
    {
        parent::__construct();
    }

    public function log()
    {
        if ($this->db_handle) 
	{
            $k = 0;
            $result = mysqli_query($this->db_handle, "select * from login");
            while ($db_field = mysqli_fetch_assoc($result)) 
		{
                	if($db_field['logid']==$_POST["t1"] && $db_field['logpwd']==$_POST["t2"]) 
			{
                   	 	$k = 1;
                    		break;
                	}
        	}
	    	if ($k == 1) 
		   {
                	echo "<script>window.open('frontpage.php')</script>";
            	   } 
	    	else 
		   {
                	echo "<script>alert('Please Enter valid Id and Password')</script>";
            	   }
        }
	else
	{
	  echo"<script language=javascript>alert('Database Not Found')</script>";
	}
    }
}

$ob=new login();
if(isset($_REQUEST["b1"])) 
{
    $ob->log();
}
?>



<form name=p method=post action='login.php'>
<html>
<head>
<style>
body {
    background-repeat: no-repeat;
    background-size: 100% 100%;
    padding: 10%;
    margin-left: 30%;
}

#container {
    background-color: transparent;
    color: white;
    width: 300px;
    height: 200px;
    box-sizing: border-box;
    border-width: 1px;
    border-style: solid;
    border-color: black;
    float: left;
    
}

.title {
    font-size: 1.2rem;
    margin-bottom: 1rem;
    margin-top:.5rem;
    margin-left:1rem;
    font-family:sans-sarif;
} 
.button {
      width: 30%;
      padding: 5px;
      background-color: black;
      color: white;
      border: black;
      margin-top: 5px; 
      margin-left: 10px;
      margin-bottom: 5px;
    }
.buttoncancel {
      width: 30%;
      padding: 5px;
      background-color: black;
      color: white;
      border: black;
      margin-top: 5px;
      margin-left:10px;
      margin-bottom: 5px;
    }
.Username,
.Password{
    width: 90%;
    padding: 8px;
    border: 1px solid white;
    }
    
    
</style>
</head>
<center>
<body background=h-img.png>
<table id="container">
<tr>
<th>
<h3 class="title"><font color=black><u>WELCOME</u></font></h3>
</th>
</tr>
<tr>
<th>
<input type=text name=t1 class="Username" placeholder="Username" >
</th>
</tr>
<tr>
<th>
<input type=password name=t2 class="Password" placeholder="Password" >
</th>
</tr>
<tr>
</tr>
<tr>
<th><input type=submit value=Login name=b1 class="button">
<input type=button value=Cancel onclick="a()" class="buttoncancel"></th>
</tr>
</table>
</form>
</body>
</center>
</html>
<script>
    function a()
	{
		window.open("onlinepagehotel.html")
	}
</script>