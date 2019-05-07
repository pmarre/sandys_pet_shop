<!DOCTYPE>
<html lang="en">

<head>
    <title>Grooming Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:700|Raleway:200" rel="stylesheet">
    <link rel="stylesheet" href="css_reset.css">
    <link href="style.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="pet-shop.js"></script>
</head>
<?php ?>
<body id="groomingPage">

    <?php 
        require 'Includes/header.php';
        $db = new mysqli('localhost', 'example', 'example_password', 'pet_shop');
        if (mysqli_connect_errno()) {
            echo 'Cannot connect to database: ' . mysqli_connect_errno();
        } else {

        $query = "INSERT INTO grooming (FirstName, LastName, Address, City, State, Zip, PhoneNumber, Email, PetType, Breed, PetName, NeuteredOrSpayed, PetBirthday) VALUES ('$_POST[fname]', '$_POST[lname]',  '$_POST[address]', '$_POST[city]', '$_POST[state]', '$_POST[zip]', '$_POST[phone]', '$_POST[email]', '$_POST[pet]', '$_POST[dogBreed]', '$_POST[petName]', '$_POST[spayed]', '$_POST[petBirthday]')";
        }

        if ($db->query($query) === true) {
            echo '<div class="form_submit">Form Successfully Submitted</div>';
        } else {
            echo '<div class="form_submit">Error: ' . $db->error . '</div>';
        }

        $db->close();
    ?>
    <section class="groom">
    <div class="groomingHeroImage">
        <h1 id="groomingHeader">Request Grooming Appointment</h1>
    </div>
    <div class="groomingForm  container">
        <form class="groomingFormContent" id="groomingInfoForm" method="POST" action="grooming.php" onsubmit="return groomingFormValidation(this);">
            <div id="nameInfo">
                <input id="fname" type="text" name="fname" placeholder="First Name">
                <input id="lname" type="text" name="lname" placeholder="Last Name">
                <input id="phone" type="tel" name="phone" placeholder="(555)555-5555">
                <input id="email" type="email" name="email" placeholder="Email">
            </div>
            <div id="addressInfo">
                <input id="address" type="text" name="address" placeholder="Street Address">
                <input id="address2" type="text" name="address2" placeholder="Address Line 2 (optional)">
                <input id="city" type="text" name="city" placeholder="City">
                <input id="state" type="text" name="state" placeholder="State">
                <input id="zip" type="text" name="zip" placeholder="Zip Code">
            </div>
            <div id="petInfo">
                <input id="petName" type="text" name="petName" placeholder="Pet's Name">    
                <select name="pet" id="pet">
                    <option name="select">Select Pet</option>
                    <option name="bird">Bird</option>
                    <option name="cat">Cat</option>
                    <option name="dog">Dog</option>
                    
                </select>
                <select name="dogBreed" id="dogBreed">
                    <option name="selectDog">Select Dog Breed</option> 
                    <option name="beagle">Beagle</option>   
                    <option name="boxer">Boxer</option>
                    <option name="chihuahua">Chihuahua</option>
                    <option name="dachshund">Dachshund</option>
                    <option name="englishBulldog">English Bulldog</option>
                    <option name="frenchBulldog">French Bulldog</option>
                    <option name="germanShepard">German Shepard</option>
                    <option name="golden">Golden Retriever</option>
                    <option name="husky">Husky</option>
                    <option name="lab">Labrador Retriever</option>
                    <option name="poodle">Poodle</option>  
                    <option name="other">Other...</option>
                </select>
            </div>
            <div id="petInfo2">
            <label for="spayed">Spayed/Neutered:<input id="checkBox" type="checkbox" name="spayed"></label>
                <label for="petBirthday">Pet's Birthday:
                    <input id="date" type="date" name="petBirthday" value="1900-01-01">
                </label>
            </div>
            <input id="submitBtn" type="submit" name="submit" value="Submit">
        </form>
                </div>
    </section>
    <?php 
        require 'Includes/footer.php';
    ?>
    <script>
        var pet = document.getElementById('pet');
        var dogBreed = document.getElementById('dogBreed');

        pet.addEventListener('change', function(){
            if (pet.value == 'Dog'){
                dogBreed.style.display = 'block';
            } else {
                dogBreed.style.display = 'none';
            }
        });
    </script>
</body>
</html>
