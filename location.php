<!DOCTYPE>
<html lang="en">

<head>
    <title>Location Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:700|Raleway:200" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php 
        require 'Includes/header.php'
    ?>
    <div class="locationHeader">
        <h1 class="locationHeading">Come Check Us Out</h1>
    </div>
    <section class="shopLocation">
        <div class="shopAddress">
            <p>123 Hermosa Avenue<p>
            <p>Hermosa Beach, CA 90254</p>
            <ul class="shopHours">
                <li>Monday-Friday: 7:00AM - 7:00PM</li>
                <li>Saturday: 10:00AM - 4:00PM</li>
                <li>Sunday: Closed</li>
            </ul>
        </div>
       <div id="map"></div>
    </section>
    <?php 
        require 'Includes/footer.php'
        ?>
    <script>
        function initMap() {
    var uluru = {
        lat: 33.862195, 
        lng: -118.399571
    }
    var map = new google.maps.Map(
        document.getElementById('map'), { 
            zoom: 15, 
            center: uluru
        });
    var marker = new google.maps.Marker({position: uluru, map: map});

}
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=[KEY_VALUE]&callback=initMap">
    </script>
    
</body>

</html>
