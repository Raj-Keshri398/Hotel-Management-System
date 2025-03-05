


<form name=f method=post action=searchroom.php>
<html>
    <head>
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer">

        <script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>
    <style>
 	*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "poppins",sans-serif;
}

body{
    min-height: 100vh;
    background: url('h-img4.jpg')  no-repeat;
    color: white;
    background-size: cover;
    background-position: center;
}

.side-bar{
    background: black;
    width: 250px;
    left: -250px;
    height: 100vh;
    position: fixed;
    top: 0;
    overflow-y: auto;
    transition: 0.5 ease;
    transition-property: left;
}

header {
    background: #33363a;
}

header img{
    width: 100px;
    margin: 15px;
    margin-left: 70px;
    border-radius: 50%;
    border: 3px solid #b4b8b9;
}

.close-btn{
    position: absolute;
    color: #fff;
    font-size: 23px;
    right: 0px;
    margin: 15px;
    cursor: pointer;
}

header h1{
    text-align: center;
    font-weight: 500;
    font-size: 25px;
    padding-bottom: 13px;
    font-family: sans-serif;
    letter-spacing: 2px;
}

.menu{
    width: 100%;
    margin-top: 30px;
}

.menu .item{
    position: relative;
    cursor: pointer;
}

.menu .item a{
    color: #fff;
    font-size: 16px;
    text-decoration: none;
    display: block;
    padding: 5px 30px;
    line-height: 60px;
}

.item i{
    margin-right: 5px;
}

.item a .dropdown{
    position: relative;
    right: 0;
    margin: 20px;
    transition: 0.3s ease;
}

.item .sub-menu{
    background: #262627;
    display: none;
}

.item .sub-menu .all_room{
	background-color: #262627;
  	border: black;
  	color: white;
  	width: 62%;
  	padding: 20px 18px;
  	font-size: 18px;
  	text-align: center;
  	text-decoration: none;
  	cursor: pointer;
}

#check{
    display: none;
}

.btn_one i{
    color: rgb(197, 135, 19);;
    font-size: 30px;
    font-weight: 700;
    position: absolute;
    left: 16px;
    line-height: 40px;
    cursor: pointer;
    opacity: 1;
    transition: all .3s linear;
}

.btn_one h1{
    display: flex;
    justify-content: center;
    color: rgb(197, 135, 19);
    background-color: #000;
}

.side-bar .btn_two i{
    font-size: 25px;
    line-height: 60px;
    position: absolute;
    left: 220px;
    cursor: pointer;
    opacity: 0;
    transition: all .3s linear;
}

.btn_one i:hover{
    font-size: 24px;
}

#check:checked ~ .side-bar{
    left: 0px;
}

#check:checked ~ .btn_one i{
    opacity: 0;
}

#check:checked ~  .side-bar .btn_two i{
    opacity: 1;
}

.side-bar.active{
    left: 0;
}

.side-bar::-webkit-scrollbar{
    width: 0px;
}

.item .sub-menu i{
    padding-left: 80px;
}

.rotate{
    transform: rotate(90deg);
}

    </style>
    </head>
    <body>
        <form name=p method=post action="frontpage.jsp">
        <!--menu button-->
        <input type="checkbox" id="check">
        
        <div class="btn_one">
            <label for="check">
                <i class="fas fa-bars"></i>
                <h1>HOTEL GRAND PARADISE</h1>
            </label>
        </div>
        <div class="side-bar">
                <header>
                    <div class="btn_two">
                        <label for="check">
                            <i class="fas fa-times"></i>
                        </label>
                    </div>
                        <img src="h-img1.jpg" alt="">
                        <!--logo-->
                        <h1>Hotel</h1>
                </header>
                <!--menu items-->
                <div class="menu">
                        <div class="item"><a href=""><i class="fas fa-desktop"></i>Dashboard</a></div>
			
                        <div class="item"><a class="sub-btn"><i class="fas fa-table"></i>Booking
                        <!--dropdown-->
                        <i class="fas fa-angle-right dropdown"></i></a>
                            <div class="sub-menu">
                                <a href="#" onclick="booking()" class="sub-item">Booking Details</a>
                                <a href="#" onclick="add_booking()" class="sub-item">Add Booking</a>
				<a href="#" onclick="online_booking()" class="sub-item">Online Booking</a>
                            </div>
                        </div>

                        <div class="item"><a class="sub-btn"><i class="fas fa-th"></i>Room
                        <i class="fas fa-angle-right dropdown"></i></a>
                            <div class="sub-menu">
                                <a href="#" onclick="room()" class="sub-item">Room Details</a>
                                <a href="#" onclick="add_room()" class="sub-item">Add Rooms</a>
                                <a href="#" onclick="room_type()" class="sub-item">Room Status</a>
                            </div>
                        </div>

                        <div class="item"><a class="sub-btn"><i class="fas fa-table"></i>Guest
                        <!--dropdown-->
                        <i class="fas fa-angle-right dropdown"></i></a>
                            <div class="sub-menu">
                                <a href="#" onclick="guest()" class="sub-item">Guest Details</a>
                                <a href="#" onclick="add_guest()" class="sub-item">Add Guest</a>
                            </div>
                        </div>


                        <div class="item"><a class="sub-btn"><i class="fas fa-dollar"></i>Payment
                        <i class="fas fa-angle-right dropdown"></i></a>
                            <div class="sub-menu">
                                <a href="#" onclick="bill()" class="sub-item">Generate Invoice</a>
                                <a href="#" onclick="invoice()" class="sub-item">Invoice Details</a>
                            </div>
                        </div>

                        <div class="item"><a class="sub-btn"><i class="fas fa-dollar"></i>Admin
                        <i class="fas fa-angle-right dropdown"></i></a>
                            <div class="sub-menu">
                                <a href="#" onclick="add_employee()" class="sub-item">Add Employee</a>
				<a href="#" onclick="add_role()" class="sub-item">Add Role</a>
                                <a href="#" onclick="employee()" class="sub-item">Employee Details</a>
				<a href="#" onclick="hotel()" class="sub-item">Add Hotel</a>
                            	
                            </div>
                        </div>

                        <div class="item"><a href="#" onclick="logout()"><i class='bx bx-log-out'></i>LogOut</a></div>
            </div>
            
        </div>
        <!--jquery cdn link-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                //jquery for expand and callapse the sidebar
                $('.sub-btn').click(function(){
                    $(this).next('.sub-menu').slideToggle();
                    $(this).find('.dropdown').toggleClass('rotate');
                });
            })
            
            
    	function room_type()
    	{
        	window.open("roomstatus.php","_self")
    	}
    	function add_room()
    	{
        	window.open("room.php","_self")
    	}
    	function room()
    	{
		window.open("searchroom1.php","_self")
	}
	function add_booking()
    	{
		window.open("booking.php","_self")
	}
	function booking()
    	{
		window.open("searchbooking1.php","_self")
	}
	function online_booking()
	{
		window.open("searchonlinebooking.php","_self")
	}
	function add_guest()
    	{
		window.open("guest.php","_self")
	}
	function guest()
    	{
		window.open("searchguest1.php","_self")
	}
	function bill()
    	{
		window.open("bill.php","_self")
	}
	function invoice()
    	{
		window.open("searchbill1.php","_self")
	}
	function add_employee()
    	{
		window.open("employee.php","_self")
	}
	function add_role()
    	{
		window.open("role.php","_self")
	}
	function employee()
    	{
		window.open("searchemployee1.php","_self")
	}
	function hotel()
    	{
		window.open("hotel.php","_self")
	}
	function logout()
	{
		window.close()
	}
        </script>
    </body>