<?php
$db = mysqli_connect('localhost', 'example', 'example_password', 'pet_shop');
if (mysqli_connect_errno()){
    echo 'Fail';
} else {

    $id = $_POST['groomingID'];

 $query = "DELETE FROM 
    grooming 
 WHERE 
    GroomingID= '$id'";

$result = mysqli_query($db, $query);

 
}
?>

