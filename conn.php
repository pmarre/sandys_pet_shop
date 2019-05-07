<?php
$db = mysqli_connect('localhost', 'example', 'example_password', 'pet_shop');
if (mysqli_connect_errno()){
    echo 'Fail';
} else {
    
if(isset($_POST['groomingID'])) {
    
    $id = $_POST['groomingID'];
    $fname = $_POST['fName'];
    $lname = $_POST['lName'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $phone = $_POST['phoneNumber'];
    $email = $_POST['email'];
    $pet_type = $_POST['petType'];
    $dog_breed = $_POST['dog_breed'];
    $pet_name = $_POST['petName'];
    $neut_spay = $_POST['neut_spay'];
    $pet_bday= $_POST['petBday'];

 $query = "UPDATE 
    grooming 
 SET 
    FirstName= '$fname', 
    LastName= '$lname', 
    Address= '$address', 
    City= '$city', 
    State= '$state', 
    PhoneNumber= '$phone', 
    Email= '$email', 
    PetType= '$pet_type', 
    Breed= '$dog_breed', 
    PetName= '$pet_name', 
    NeuteredOrSpayed= '$neut_spay'
 WHERE 
    GroomingID= '$id'";

$result = mysqli_query($db, $query);

} 
}
?>

