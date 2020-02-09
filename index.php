<!DOCTYPE html>
<html lang="en">

<head>
    <title>LIDIA APARTMENTS</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <!-- header -->
    <div class="header">
        <div class="kontakt">
            <ul>
                <li><a href="mailto:lidiahasani98@gmail.com">LIDIAHASANI98@GMAIL.COM</a></li>
                <li>Tel: +355698626849</li>
            </ul>
        </div>
        <div class="navigation">
            <nav class="navbar">
                <div>
                    <h1><a class="navbar-brand" href="index.html">LIDIA <span>APARTMENTS</span>
                            <p class="moto">Your Home Far From Home</p>
                        </a></h1>
                </div>
                <div>
                    <nav class="menu">
                        <ul class="navbar-nav ">
                            <li class="menu__item menu__item--current"><a href="" class="menu__link">Home</a></li>
                            <li class="menu__item"><a href="#about" class="menu__link">About</a></li>
                            <li class="menu__item"><a href="#gallery" class="menu__link">Gallery</a></li>
                            <li class="menu__item"><a href="#rooms" class="menu__link">Rooms</a></li>
                            <li class="menu__item"><a href="#reviews" class="menu__link">Reviews</a></li>
                            <li class="menu__item"><a href="#contact" class="menu__link">Contact Us</a></li>
                        </ul>
                    </nav>
                </div>
            </nav>
        </div>
        <!-- //header -->
        <!-- banner -->
        <div id="home" class="banner">
            <h4>LIDIA APARTMENTS</h4>
            <h3>Your pleasure, our pleasure.</h3>
            <p>Welcome to our apartments!</p>
        </div>
    </div>
    <!-- //banner -->
    <div class="book-form">
        <a href="admin/reservation.php">
            <h2>ROOM RESERVATION</h2>
        </a>
    </div>
    <!-- banner-bottom -->
    <div class="banner-bottom">
        <div>
            <h3>Experience a good stay, enjoy our offers!</h3>
        </div>
        <div>
            <ul class="grids">
                <li>
                    <div class="grid">
                        <figure>
                            <img src="images/double.png" alt="Two adults" />
                            <figcaption>DOUBLE BEDROOMS</figcaption>
                        </figure>
                    </div>
                </li>
                <li>
                    <div class="grid">
                        <figure>
                            <img src="images/triple.png" alt="Three adults" />
                            <figcaption>TRIPLE BEDROOMS</figcaption>
                        </figure>
                    </div>
                </li>
                <li>
                    <div class="grid">
                        <figure>
                            <img src="images/parking.png" alt="Free Parking" />
                            <figcaption>FREE PRIVATE PARKING</figcaption>
                        </figure>
                    </div>
                </li>
                <li>
                    <div class="grid">
                        <figure>
                            <img src="images/wifi.png" alt="Free Wifi" />
                            <figcaption>FREE WIFI COVERAGE</figcaption>
                        </figure>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!-- //banner-bottom -->
    <!-- /about -->
    <div class="about" id="about">
        <h3 class="titull">About LIDIA APARTMENTS</h3>
        <p>
            Located in Sarande, in the Vlora County region, with Saranda City Beach and Sarande Main Beach nearby,
            Lidia Apartments provides accommodation with conditioned air, free WiFi and free private parking.
            Each unit comes with a fully equipped kitchenette with a fridge,
            a seating area, a TV, a washing machine, and a private bathroom with shower.
            The apartments feature a terrace and a balcony.
        </p>
    </div>
    <!-- //about -->
    <!--services-->
    <div class="services">
        <h3 class="titull titullizi">Our Services</h3>
        <div>
            <div class="advantages ">
                <h4>Stay First, Pay After! </h4>
                <ul>
                    <li>Pay On Cash when you are here</li>
                    <li>Private parking</li>
                    <li>Private balcony</li>
                </ul>
            </div>

            <div class="advantages">
                <h4>Check-in and check-out</h4>
                <ul>
                    <li>Check-in since 1pm</li>
                    <li>Check-out until 11am</li>
                    <li>Free luggage storage</li>
                </ul>
            </div>
        </div>
    </div>
    <!--//services-->
    <!-- Gallery -->
    <section id="gallery">
        <h3 class="titull titullizi">Our Gallery</h3>
        <div class="gallerywrapper">
            <div class="image1">
                <img src="images/a.jpg" alt="/" width="325px" height="220px">

            </div>
            <div class="image2">
                <img src="images/b.jpg" alt="/" width="325px" height="220px">

            </div>
            <div class="image3">
                <img src="images/c.jpg" alt="/" width="325px" height="220px">

            </div>
            <div class="image4">
                <img src="images/p.jpg" alt="/" width="325px" height="220px">

            </div>
            <div class="image5">
                <img src="images/v.jpg" alt="/" width="325px" height="220px">

            </div>
            <div class="image6">
                <img src="images/h.jpg" alt="/" width="325px" height="220px">

            </div>
            <div class="image7">
                <img src="images/e.jpg" alt="/" width="325px" height="220px">

            </div>
            <div class="image8">
                <img src="images/d.jpg" alt="/" width="325px" height="220px">

            </div>
        </div>
    </section>
    <!-- //gallery -->
    <!-- roomsandrates -->

    <div id="rooms">
        <h3 class="titull titullizi">Rooms And Rates</h3>
    </div>
    <?php
    include ('admin/db.php');
    $select="SELECT * FROM room";
    $result=mysqli_query($con,$select);
    $row = mysqli_fetch_assoc($result);
    $id=$row['id'];
    $tipi=$row['tipi'];
    $cmimi=$row['cmimi'];
    $foto=$row['image'];
    ?>
    <div class="wrapper">
        <div class="one">
            <figure>
                <img src="getImage.php?id=<?php echo $id ?>" alt="/" width="420px" height="300px">
                <figcaption><?php echo $tipi ?><span><?php echo $cmimi ?>$/night</span></figcaption>
            </figure>
        </div>
        <?php
        $select="SELECT * FROM room ORDER BY id DESC LIMIT 1, 1";
    $result=mysqli_query($con,$select);
    $row = mysqli_fetch_assoc($result);
    $rid=$row['id'];
    $tipi=$row['tipi'];
    $cmimi=$row['cmimi'];
    $foto=$row['image'];
    ?>
        <div class="two">
            <figure>
                <img src="getImage.php?id=<?php echo $rid ?>" alt="/" width="420px" height="300px">
                <figcaption><?php echo $tipi ?><span><?php echo $cmimi ?>$/night</span></figcaption>
            </figure>
        </div>
    </div>
    <div class="book-form">
        <a href="admin/reservation.php">
            <h2>CLICK HERE TO BOOK NOW</h2>
        </a>
    </div>
    <!--//roomsandrates-->
    <!-- reviews -->
    <div>
    <h3 class="titull titullizi" id="reviews">Reviews</h3>
    </div>
    <div class="wrapper">
        <div class="second">
    <div class="review">
                                <h4 class="rev">LEAVE YOUR REVIEW</h4>
                            <div>
                                <form name="form" method="post">
                                    <div class="el">
                                        <label>Name</label>
                                        <input name="emri" class="input" required>
                                    </div>
                                    <div class="el">
                                        <label>Email  </label>
                                        <input name="email" class="input" type="email" required>
                                    </div>
                                    <div class="el">
                                        <p>Select review score:</p>
                                        <input type="radio" name="piket" value="1"/>1
                                        <input type="radio" name="piket" value="2"/>2
                                        <input type="radio" name="piket" value="3"/>3
                                        <input type="radio" name="piket" value="4"/>4
                                        <input type="radio" name="piket" value="5" checked="checked"/>5
                                    </div>
                                    <div class="el">
                                        <textarea name="text" cols="25" rows="4" class="text" placeholder="Enter your comments..."></textarea>
                                    </div>
                                    <div>
                                        <input id="submit" type="submit" name="submit" value="Submit">
                                    </div>
</div>
<?php
     include('admin/db.php');
     if (isset($_POST['submit'])) {
        $check = "SELECT * FROM invoice invoice join roombook roombook on invoice.roombookid=roombook.id WHERE roombook.Email = '$_POST[email]'";
        $result = mysqli_query($con, $check);
        $data = mysqli_fetch_array($result, MYSQLI_NUM);
        if ($data[0] == 0) {
            echo "<script type='text/javascript'> alert('You can\'t review without staying at us!')</script>";

         }
        else{
         $check = "SELECT id FROM reviews WHERE email = '$_POST[email]'";
         $result = mysqli_query($con, $check);
         $row_count = mysqli_num_rows($result);
         if ($row_count > 0) {
             echo "<script type='text/javascript'> alert('You can\'t review twice')</script>";
         } else {
             $newReview = "INSERT INTO `reviews`(`emer`, `email`, `pike`, `text`) 
             VALUES ('$_POST[emri]','$_POST[email]','$_POST[piket]','$_POST[text]')";
             if (mysqli_query($con, $newReview)) {
                 echo "<script type='text/javascript'> alert('Your review has been sent.')</script>";
             } else {
                 echo "<script type='text/javascript'> alert('Error adding review in database')</script>";
             }
}
 }
} ?>
</div>
                        </div>
                        <div class="first">
        <?php
$sql = "Select * from `reviews`";
$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($result)) {

    $emri = $row['emer'];
    $email = $row['email'];
    $piket = $row['pike'];
    $text = $row['text'];
    echo "<div class=\"reviewf\"><p><span>". $emri . "</span> rated us <span>" .$piket ." </span>stars!</p><p>Comment: ". $text ."</p></div>";
} ?>
</div>
                    </div>



    <!-- //reviews-->
    <!-- contact -->
    <section class="contact" id="contact">
        <h4>Contact Us</h4>
        <div class="contactwrapper">
            <div class="info">
                <ul>
                    <li><strong>Phone :</strong>+355698626849</li>
                    <li><strong>Email :</strong> <a href="mailto:lidiahasani98@gmail.com">LIDIAHASANI98@GMAIL.COM</a>
                    </li>
                    <li><strong>Address :</strong> RRUGA MUSA DEMI 54, K.2, SARANDE</li>
                </ul>
            </div>
            <div class="harta">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1530.9231993244832!2d20.000635558163577!3d39.87767839485784!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x135b14ff729e2615%3A0xb997dc71de7f1272!2sRruga%20Musa%20Demi%2054%2C%20Sarand%C3%AB%2C%20Albania!5e0!3m2!1sen!2s!4v1580649031493!5m2!1sen!2s"
                    width="400px" height="230px" frameborder="0" style="border:0;" allowfullscreen="">
                </iframe>
            </div>
        </div>
    </section>
    <!-- /contact -->
    <!--footer-->
    <div class="copy">
        <p>&copy 2020 LIDIA APARTMENTS . All Rights Reserved | Design by <a href="index.html">LIDIA</a> </p>
    </div>
    <!--/footer -->
    <div class="shigjeta">
        <a href="#home" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
    </div>
</body>

</html>