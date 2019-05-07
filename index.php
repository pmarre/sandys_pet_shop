<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Sandy's Pet Shop</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<link rel="stylesheet" href="css_reset.css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:700|Raleway:200" rel="stylesheet">
<link href="style.css" rel="stylesheet">
</head>
<body>
    <?php 
        require 'Includes/header.php';
    ?>
    <section class="homepage">
        <div class="heading">
          <h1 class="heroHeading">Grooming Done Right</h1>
          <span>Just what your pet needs.</span>
          <button class="mainCTA"><a href="contact.php">Contact Us</a></button>
        </div>
        <div class="heroImage"></div>
    </section>
    <div class="container">
        <section class="mainSection">
            <h2 class="sectionTitle">Our Services</h2>
            <div class="services">
                <div class="service">
                <div class="serviceTitle">
                    <i class="fas fa-cut serviceIcon"></i>
                    <h2 class="serviceHeader">Full Service Grooming</h2>
                </div>
                    <p>Keep your pet looking flawless with our full service grooming from one of our top groomers. Services include a bath, brush, trim, and hand drying.</p>
                    <a href="grooming.php">Request Appointment</a>
                </div>
                <div class="service">
                <div class="serviceTitle">
                    <i class="fas fa-paw serviceIcon"></i>
                    <h2 class="serviceHeader">Bath &amp; Trim</h2>
                </div>
                    <p>Need a quick trim? Bring your pet in for a quick haircut and bath. </p>
                    <a href="grooming.php">Request Appointment</a>
                </div>
                <div class="service">
                    <div class="serviceTitle">
                        <i class="fas fa-award serviceIcon"></i>
                        <h2 class="serviceHeader">Show Dog Service</h2>
                    </div>
                    <p>Your show dog deserves the best and that is what we will do. We keep you dog looking its best with our Certified Show Dog Groomers.</p>
                    <a href="grooming.php">Request Appointment</a>
                </div>
</div>
        </section>
    </div>
    <?php 
        require 'Includes/footer.php';
    ?>
</body>
</html>