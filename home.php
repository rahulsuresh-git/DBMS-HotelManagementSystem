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
                <div class="banner_content text-center">
                    <h6>Welcome back, <? echo $name;?></h6>
                    <h2>Relax Your Mind</h2>
                    <p>Service is exceptionally friendly and amenities are plentiful, ensuring the most pleasurable and
                        memorable stay.</p>
                    <a href="#" class="btn theme_btn button_hover">Explore now</a>
                </div>
            </div>
        </div>
        <div class="hotel_booking_area position">
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
        </div>
    </section>
    <!--================Banner Area =================-->

    <!--================ Accomodation Area  =================-->
    <section class="accomodation_area section_gap">
        <div class="container">
            <div class="section_title text-center">
                <h2 class="title_color">Hotel Accomodation</h2>
                <p>We all live in an age that belongs to the young at heart. Life that is becoming extremely fast, </p>
            </div>
            <div class="row mb_30">
                <div class="col-lg-3 col-sm-6">
                    <div class="accomodation_item text-center">
                        <div class="hotel_img">
                            <img src="image/room1.jpg" alt="">
                        </div>
                        <a href="#">
                            <h4 class="sec_h4">Single Deluxe Room</h4>
                        </a>
                        <h5>Rs.5000<small>/night</small></h5>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="accomodation_item text-center">
                        <div class="hotel_img">
                            <img src="image/room2.jpg" alt="">
                        </div>
                        <a href="#">
                            <h4 class="sec_h4">Double Deluxe Room</h4>
                        </a>
                        <h5>Rs.8000<small>/night</small></h5>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="accomodation_item text-center">
                        <div class="hotel_img">
                            <img src="image/room5.jpg" alt="">
                        </div>
                        <a href="#">
                            <h4 class="sec_h4">Honeymoon Suite</h4>
                        </a>
                        <h5>Rs.10000<small>/night</small></h5>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="accomodation_item text-center">
                        <div class="hotel_img">
                            <img src="image/room4.jpg" alt="">
                        </div>
                        <a href="#">
                            <h4 class="sec_h4">Presidential Suite</h4>
                        </a>
                        <h5>Rs.15000<small>/night</small></h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ Accomodation Area  =================-->

    <!--================ Facilities Area  =================-->
    <section class="facilities_area section_gap">
        <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background="">
        </div>
        <div class="container">
            <div class="section_title text-center">
                <h2 class="title_w">Royal Facilities</h2>
                <p>Who are in extremely love with eco friendly system.</p>
            </div>
            <div class="row mb_30">
                <div class="col-lg-4 col-md-6">
                    <div class="facilities_item">
                        <h4 class="sec_h4"><i class="lnr lnr-dinner"></i>Restaurant</h4>
                        <p >Fine dining is enhanced through a blend of western and traditional cuisines, designed by our masterchefs.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="facilities_item">
                        <h4 class="sec_h4"><i class="lnr lnr-bicycle"></i>Sports Club</h4>
                        <p>The Sports club is committed to provide a healthy sporting habit among the guests.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="facilities_item">
                        <h4 class="sec_h4"><i class="lnr lnr-shirt"></i>Swimming Pool</h4>
                        <p>Our pools are designed to offer a sombre and a tranquil experience to the guests.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="facilities_item">
                        <h4 class="sec_h4"><i class="lnr lnr-car"></i>Rent a Car</h4>
                        <p>24*7 Car Rental Services at your Door step. Wide varieties of Cars, with amazing offers.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="facilities_item">
                        <h4 class="sec_h4"><i class="lnr lnr-construction"></i>Gymnesium</h4>
                        <p>Our Hotel exhibits a fully equipped fitness centre offering a range of technologies like cardio machines. </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="facilities_item">
                        <h4 class="sec_h4"><i class="lnr lnr-coffee-cup"></i>Bar</h4>
                        <p>Fuchsia drapes, warm red light, and sequins set a dramatic & a musical tone for this night club.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ Facilities Area  =================-->

    <!--================ About History Area  =================-->
    <section class="about_history_area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-md-6 d_flex align-items-center">
                    <div class="about_content ">
                        <h2 class="title title_color">About Us <br>Mission & Vision</h2>
                        <p>Situated in the heart of Chennai, overlooking the city’s verdant foliage. It embodies the highest standards in Indian hospitality balanced with elegant restraint in a prime property with distinct personality. The Grand Peninsula has 522 rooms and 78 luxuriously appointed service apartments- collectively its 600 spacious guest rooms, suites and luxury service apartments, are the epitome of Indian grace and style, expertly delegated with thoughtful amenities.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <img class="img-fluid" src="image/about_bg.jpg" alt="img">
                </div>
            </div>
        </div>
    </section>
    <!--================ About History Area  =================-->

    <!--================ Testimonial Area  =================-->
    <section class="testimonial_area section_gap">
        <div class="container">
            <div class="section_title text-center">
                <h2 class="title_color">Testimonial from our Clients</h2>
                </p>
            </div>
            <div class="testimonial_slider owl-carousel">
                <div class="media testimonial_item">
                    <img class="rounded-circle" src="image/testtimonial-1.jpg" alt="">
                    <div class="media-body">
                        <p>Fantastic hotel, my room was incredible. Food was of great quality. The Italian and Asian restaurant were my favourite. If I need to come again, Grand Peninsula will be my hotel of choice! Brought some Fabelle chocolate home for the family, they loved it!</p>
                        <a href="#">
                            <h4 class="sec_h4">Fanny Spencer</h4>
                        </a>
                        <div class="star">
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star-half-o"></i></a>
                        </div>
                    </div>
                </div>
                <div class="media testimonial_item">
                    <img class="rounded-circle" src="image/testtimonial-2.jpg" alt="">
                    <div class="media-body">
                        <p>By far one of the best properties i have stayed in. Excellent rooms especially the tower rooms(do book them if not much price difference). Better than even some of the luxury Oberoi properties. Food is amazing,right from breakfast at Madras pavillion to dinner at peshawri/pan-asia. Staff is very professional and take excellent care of guests. Location very close to airport</p>
                        <a href="#">
                            <h4 class="sec_h4">Fanny Spencer</h4>
                        </a>
                        <div class="star">
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star-half-o"></i></a>
                        </div>
                    </div>
                </div>
                <div class="media testimonial_item">
                    <img class="rounded-circle" src="image/testtimonial-2.jpg" alt="">
                    <div class="media-body">
                        <p>Undoubtedly the best hotel in Chennai. The staff is warm & courteous and take care of every need. Rooms are nicely furnished and clean. Tower rooms are bigger and the hotel also has suites of 1 or 2 bedrooms for families with a fully stocked kitchenette, washer etc.The hotel is truly grand and frankly I could not have asked for anything else.</p>
                        <a href="#">
                            <h4 class="sec_h4">Fanny Spencer</h4>
                        </a>
                        <div class="star">
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star-half-o"></i></a>
                        </div>
                    </div>
                </div>
                <div class="media testimonial_item">
                    <img class="rounded-circle" src="image/testtimonial-1.jpg" alt="">
                    <div class="media-body">
                        <p>Stay in the tower rooms. Very large, luxurious. Very attentive staff. Beautiful hotel. Love the outdoor pools and garden on the 35th floor. Very nice spa as well. Breakfast is fantastic with large variety of foods. Do try the Utapam, Vada Sambar and Dosa. Also very good French Toast. The High Tea time and Happy Hour were included with our stay and made it worth it. All you can drink and eat. Good snacks. The staff is fantastic. Hang out in the hotel and relax. Shout out to Sidharth (waiter/bar keep) in the Tea lounge. Very good service.</p>
                        <a href="#">
                            <h4 class="sec_h4">Fanny Spencer</h4>
                        </a>
                        <div class="star">
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star-half-o"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ Testimonial Area  =================-->

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
window.location="mybookings.php";
//   window.setTimeout(function(){ window.location = "home.php"; },100);
}

             }
      });
  });</script>

</html>
