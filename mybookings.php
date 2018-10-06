<?php
session_start();

$ip = getenv('HTTP_CLIENT_IP')?:
getenv('HTTP_X_FORWARDED_FOR')?:
getenv('HTTP_X_FORWARDED')?:
getenv('HTTP_FORWARDED_FOR')?:
getenv('HTTP_FORWARDED')?:
getenv('REMOTE_ADDR');
date_default_timezone_set('Asia/Kolkata');

$today = date('l');

if (isset($_SESSION['username'])){
    $id = $_SESSION['username'];
    include('db.php');


    $query = "SELECT * FROM guest WHERE email = '$id'";  
    $result = mysqli_query($conn, $query);  
    $row = mysqli_fetch_array($result);
    $name=$row['name'];


}
else {
	header('Location: index.php');
	die();
}

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="image/favicon.png" type="image/png">
    <title>The Grand Peninsula</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="vendors/linericon/style.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
    <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
    <!-- main css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <style>
    @media only screen and (max-width: 750px) {
   #submitbtn{
    margin-left:0px !important;
   }
}
</style>
</head>

<body>
    <!--================Header Area =================-->
    <header class="header_area">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="index.php"><img src="image/Logo.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item" > <a style="color:red" class="nav-link" href="mybookings.php">My Bookings</a></li>

                        <li class="nav-item"><a class="nav-link" href="accomodation.html">Accomodation</a></li>
                        <li class="nav-item"><a class="nav-link" href="gallery.html">Gallery</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.html">About us</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
                        <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>

                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <!--================Header Area =================-->

    <!--================Banner Area =================-->
    <section class="banner_area">
        <div class="booking_table d_flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
            <br> <br><center><h2 style="color:white">Bookings</h2></center><br>
            <div class="progress-table-wrap">
							<div class="progress-table">
								<div class="table-head" style="text-align:center">
									<div class="serial">User ID</div>
									<div class="visit">Booking ID</div>
									<div class="visit">Total Nights</div>
                                    <div class="visit">Total Cost</div>
                                    <div class="visit">Check-In Date</div>
									<div class="visit">Check-Out Date</div>
									<div class="visit">Room Type</div>
									<div class="visit">No. of Rooms</div>
									<div class="visit">Adult</div>
									<div class="visit">Child</div>

								</div>
                <?php 
                
                $query = "SELECT b.uid, b.bookid, b.totalnights, b.totalcost,r.checkin, r.checkout, r.type,r.rooms, r.adult,
                r.child FROM booking as b, registration as r where b.uid=r.uid";
$result = mysqli_query($conn,$query);


while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
    echo "<div class='table-row' style='text-align:center'>"; 

echo "<div class='serial'>" . $row['uid'] . "</div>" ."<div class='visit' style='padding-left:30px'>". $row['bookid'] . "</div>"."<div class='visit' style='padding-left:60px'>" . $row['totalnights'] . "</div>" .
"<div class='visit'>" . $row['totalcost'] . "</div>" ."<div class='visit'>" . $row['checkin'] . "</div>" ."<div class='visit'>" . $row['checkout'] . "</div>" .
"<div class='visit'>" . $row['type'] . "</div>" ."<div class='visit' style='padding-left:60px'>" . $row['rooms'] . "</div>" ."<div class='visit' style='padding-left:30px'>" . $row['adult'] . "</div>" .
"<div class='visit' style='margin-right:-50px'>" . $row['child'] . "</div>" ;  
echo "</div>";
}

                ?>
							
					
						</div>
					</div>
            </div>
        </div>
       

        <!-- <div class="hotel_booking_area position">
            <div class="container">
                <div class="hotel_booking_table">
                    <div class="col-md-3">
                        <h2 text-align:center,padding:0px>Book<br> Your Room</h2>
                    </div>
                    <form id="bookingform" method="post" action="booking.php" style="width:100%;padding-left:0px" autocomplete="off">

                    <div class="col-md-9">
                        <div class="boking_table">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="book_tabel_item">
                                        <div class="form-group">
                                            <div class='input-group date' id='datetimepicker11'>
                                                <input id="checkin" name="checkin" type='text' class="form-control"
                                                    placeholder="Check-In Date" required />
                                                <span class="input-group-addon">
                                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class='input-group date' id='datetimepicker1'>
                                                <input type='text' id="checkout" name="checkout" class="form-control"
                                                    placeholder="Check-Out Date" required />
                                                <span class="input-group-addon">
                                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="book_tabel_item">
                                        <div class="input-group">

                                                   
                                            <select  name="roomtype" id="roomtype" required="required">
                                                <option  disabled value="" selected hidden>Room Type</option>

                                                <option value="Single Deluxe">Single Deluxe</option>
                                                <option value="Double Deluxe">Double Deluxe</option>
                                                <option value="Honeymoon Suite">Honeymoon Suite</option>
                                                <option value="Presidential Suite">Presidential Suite</option>

                                            </select>
                                        </div>
                                        <div class="input-group">
                                            <select  class="wide" required name="rooms">
                                                    <option  disabled value="" selected hidden>Room(s)</option>
                                                    <option value="1">1</option>
                                                <option value="2">2</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="book_tabel_item">
                                            <div class="input-group">
                                                    <select  class="wide" required  name="adult"> 
                                                            <option  disabled value="" selected hidden>Adults (12+ Years)</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                    </select>
                                                </div>
                                        <div class="input-group">
                                            <select  class="wide" required name="child">
                                                    <option  disabled value="" selected hidden>Children (0-12 Years)</option>
                                                    <option value="0">0</option>

                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                            </select>
                                        </div>
                                      <center>  <input type="submit" id="submitbtn"  value="Book Now" style="color:white;margin-left:-425px" class="book_now_btn button_hover" href="#"></a>
                                      </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div> -->
    </section>
    <!--================Banner Area =================-->

   

    <!--================ start footer Area  =================-->
    <footer class="footer-area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-6  col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6 class="footer_title">About Grand Peninsula </h6>
                        <p>A stunning combination of luxirious stay, scenic beaches, rolling hills and lush green valleys. The Grand Peninsula is situated right at the heart of Chennai's buzzling city.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6 class="footer_title">Navigation Links</h6>
                        <div class="row">
                            <div class="col-4">
                                <ul class="list_style">
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">Feature</a></li>
                                    <li><a href="#">Services</a></li>
                                    <li><a href="#">Portfolio</a></li>
                                </ul>
                            </div>
                            <div class="col-4">
                                <ul class="list_style">
                                    <li><a href="#">Team</a></li>
                                    <li><a href="#">Pricing</a></li>
                                    <li><a href="#">Blog</a></li>
                                    <li><a href="#">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
              
                
            </div>
            <div class="border_line"></div>
            <div class="row footer-bottom d-flex justify-content-between align-items-center">
                <p class="col-lg-8 col-sm-12 footer-text m-0">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright <script>document.write(new Date().getFullYear());</script> &copy; The Grand Peninsula Pvt. Ltd.<br>
                      All rights reserved | This template is
                    made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
                <div class="col-lg-4 col-sm-12 footer-social">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-dribbble"></i></a>
                    <a href="#"><i class="fa fa-behance"></i></a>
                </div>
            </div>
        </div>
    </footer>
    <!--================ End footer Area  =================-->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/mail-script.js"></script>
    <script src="vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.js"></script>
    <script src="vendors/nice-select/js/jquery.nice-select.js"></script>
    <script src="js/mail-script.js"></script>
    <script src="js/stellar.js"></script>
    <script src="vendors/lightbox/simpleLightbox.min.js"></script>
    <script src="js/custom.js"></script>
</body>
<script>
document.addEventListener("DOMContentLoaded", function() {
    var elements = document.getElementsByTagName("select");
    for (var i = 0; i < elements.length; i++) {
        elements[i].oninvalid = function(e) {
            e.target.setCustomValidity("");
            if (!e.target.validity.valid) {
                e.target.setCustomValidity("This field cannot be left blank");
            }
        };
        elements[i].oninput = function(e) {
            e.target.setCustomValidity("");
        };
    }
})
</script>
<script> $("#bookingform").submit(function(e) {
      e.preventDefault(); // avoid to execute the actual submit of the form.
      var url = $(this).attr("action"); // the script where you handle the form input.
      $.ajax({
             type: "POST",
             url: url,
             data: $("#bookingform").serialize(), // serializes the form's elements.
             success: function(data)
             {
               if(data==="wrong")
{  
    alert("Failed!");
}
else if (data.includes("done"));
{
alert("Success!");
//   window.setTimeout(function(){ window.location = "home.php"; },100);
}

             }
      });
  });</script>

</html>
