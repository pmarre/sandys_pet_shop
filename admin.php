<?php 
    include 'conn.php';
    include 'delete.php';
    include 'insert.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:700|Raleway:200" rel="stylesheet">
    <!-- <link rel="stylesheet" href="css_reset.css"> -->
    <link rel="stylesheet" href="style.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript" src="lib.js"></script>
</head>
<body>
    <?php 
        include "Includes/header.php";
    ?>
    <div class="newRow">
        <button data-role="add" data-toggle="modal" data-target="#addModal" id="addBtn"><i class="fas fa-user-plus"></i>Add Client</button>
    </div>
    <div>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Address</th>
            <th>City</th>
            <th>State</th>
            <th>Zip</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th>Pet Type</th>
            <th>Dog Breed</th>
            <th>Pet Name</th>
            <th>Neutered/Spayed</th>
            <th>Pet Birthday</th>
            <th></th>
            <th></th>
</tr>
</thead>
<tbody>
<tr>
<?php
$table = mysqli_query($db, "SELECT * FROM grooming");
while($row = mysqli_fetch_array($table)){ ?>
 
<?php 
    echo '<tr id="id' .$row['GroomingID'] . '">
    <td>' . $row['GroomingID'] . '</td>
    <td data-target="fname">' . $row['FirstName']. '</td>
    <td data-target="lname"> ' . $row['LastName']. '</td>
    <td data-target="address">' . $row['Address']. '</td>
    <td data-target="city">' . $row['City'] . '</td>
    <td data-target="state">' . $row['State'] . '</td>
    <td data-target="zip">' . $row['Zip'] . '</td>
    <td data-target="phone">' . $row['PhoneNumber'] . '</td>
    <td data-target="email">' . $row['Email'] . '</td>
    <td data-target="petType">' . $row['PetType'] . '</td>
    <td data-target="dog_breed">' . $row['Breed'] . '</td>
    <td data-target="petName">' . $row['PetName'] . '</td>
    <td data-target="neut_spay">' . $row['NeuteredOrSpayed'] . '</td>
    <td data-target="petBday">' . $row['PetBirthday'] . "</td>
    <td>
    <a data-role='update' data-id='" . $row['GroomingID'] . "' data-toggle='modal' data-target='#myModal' href='#'>
    <i class='far fa-edit'></i>
    </a>
    </td>
    <td>
    <a class='delete_btn' data-role='delete' data-id='" .$row['GroomingID'] . "' href='#' id='delete'>
    <i class='far fa-trash-alt'></i>
    </a>
    </td>
    </tr>";
}

?>
</tr>
</tbody>
</table>

</div>

<!-- Update Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Modal Header</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
      <form method="post" id="form" action="">
        <div class="form-group" >
            <input id="id" type="text" name="groomingID" class="form-control" readonly>
            <label>First Name:</label>
            <input id="fname" type="text" name="fName" class="form-control">
            <label>Last Name:</label>
             <input id="lname" type="text" name="lName" class="form-control">
        </div>
        <div class="form-group">
            <label>Address:</label>
            <input id="address" type="text" name="address" class="form-control">
            <label>City:</label>
            <input id="city" type="text" name="city" class="form-control">
            <label>State:</label>
            <input id="state" type="text" name="state" class="form-control">
            <label>Zip:</label>    
            <input id="zip" type="text" name="zip" class="form-control">
        </div>
        <div class="form-group">    
            <label>Phone:</label>
            <input id="phone" type="tel" name="phoneNumber" class="form-control">
            <label>Email:</label>
            <input id="email" type="email" name="email" class="form-control">
        </div>    
        <div class="form-group">
            <label>Pet Name:</label>
            <input id="petName" type="text" name="petName" class="form-control">
            <label>Pet Type:</label>
            <select name="petType" id="petType" class="form-control">
                    <option value="Select Pet">Select Pet</option>
                    <option value="Bird">Bird</option>
                    <option value="Cat">Cat</option>
                    <option value="Dog">Dog</option>
            </select>
            <label>Dog Breed:</label>
            <select name="dog_breed" id="dog_breed" class="form-control">
                    <option value="Select Dog Breed">Select Dog Breed</option> 
                    <option value="Beagle">Beagle</option>   
                    <option value="Boxer">Boxer</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Dachshund">Dachshund</option>
                    <option value="English Bulldog">English Bulldog</option>
                    <option value="French Bulldog">French Bulldog</option>
                    <option value="German Shepard">German Shepard</option>
                    <option value="Golden Retriever">Golden Retriever</option>
                    <option value="Husky">Husky</option>
                    <option value="Labrador Retriever">Labrador Retriever</option>
                    <option value="Poodle">Poodle</option>  
                    <option value="Other...">Other...</option>
            </select>
            <label>Neutered/Spayed:</label>
            <input id="neut_spay" type="checkbox" name="neut_spay" class="form-control" value="on">
            <label>Pet Birthday:</label>
            <input id="petBday" type="date" name="petBday" class="form-control">
            <input id="userId" name="userId" type="hidden" class="form-control">
        </div>
</form>
      </div>
      <div class="modal-footer">
      <input type="submit" class="btn btn-primary pull-right" id="save" name="submit" value="Update">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Add Modal -->
<div id="addModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Modal Header</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
      <form method="post" id="add_form" action="">
        <div class="form-group" >
            <input id="add_id" type="text" name="add_groomingID" class="form-control" readonly>
            <label>First Name:</label>
            <input id="add_fname" type="text" name="add_fName" class="form-control">
            <label>Last Name:</label>
             <input id="add_lname" type="text" name="add_lName" class="form-control">
        </div>
        <div class="form-group">
            <label>Address:</label>
            <input id="add_address" type="text" name="add_address" class="form-control">
            <label>City:</label>
            <input id="add_city" type="text" name="add_city" class="form-control">
            <label>State:</label>
            <input id="add_state" type="text" name="add_state" class="form-control">
            <label>Zip:</label>    
            <input id="add_zip" type="text" name="add_zip" class="form-control">
        </div>
        <div class="form-group">    
            <label>Phone:</label>
            <input id="add_phone" type="tel" name="add_phoneNumber" class="form-control">
            <label>Email:</label>
            <input id="add_email" type="email" name="add_email" class="form-control">
        </div>    
        <div class="form-group">
            <label>Pet Name:</label>
            <input id="add_petName" type="text" name="add_petName" class="form-control">
            <label>Pet Type:</label>
            <select name="add_petType" id="add_petType" class="form-control">
                    <option>Select Pet</option>
                    <option>Bird</option>
                    <option>Cat</option>
                    <option>Dog</option>
            </select>
            <label>Dog Breed:</label>
            <select id="add_dog_breed" class="form-control" name="add_dog_breed">
            <option>Select Dog Breed</option> 
                    <option value="Beagle">Beagle</option>   
                    <option value="Boxer">Boxer</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Dachshund">Dachshund</option>
                    <option value="English Bulldog">English Bulldog</option>
                    <option value="French Bulldog">French Bulldog</option>
                    <option value="German Shepard">German Shepard</option>
                    <option value="Golden Retriever">Golden Retriever</option>
                    <option value="Husky">Husky</option>
                    <option value="Labrador Retriever">Labrador Retriever</option>
                    <option value="Poodle">Poodle</option>  
                    <option value="Other...">Other...</option>
            </select>
            <label>Neutered/Spayed:</label>
            <input id="add_neut_spay" type="checkbox" name="add_neut_spay" class="form-control">
            <label>Pet Birthday:</label>
            <input id="add_petBday" type="date" name="add_petBday" class="form-control">
            <input id="add_userId" name="add_userId" type="hidden" class="form-control">
        </div>
</form>
      </div>
      <div class="modal-footer">
      <input type="submit" class="btn btn-primary pull-right" id="add" name="add" value="Add">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<script>
    $(document).ready(function(){
        // append values in input fields
        $(document).on('click', 'a[data-role="update"]', function(){
            var id = $(this).data('id');
            var fname = $('#id' + id).children('td[data-target=fname]').text();
            var lname = $('#id' + id).children('td[data-target=lname]').text();
            var address = $('#id' + id).children('td[data-target=address]').text();
            var city = $('#id' + id).children('td[data-target=city]').text();
            var state = $('#id' + id).children('td[data-target=state]').text();
            var zip = $('#id' + id).children('td[data-target=zip]').text();
            var phone = $('#id' + id).children('td[data-target=phone]').text();
            var email = $('#id' + id).children('td[data-target=email]').text();
            var petType = $('#id' + id).children('td[data-target=petType]').text();
            var dog_breed = $('#id' + id).children('td[data-target=dog_breed]').text();
            var petName = $('#id' + id).children('td[data-target=petName]').text();
            var neut_spay = $('#id' + id).children('td[data-target=neut_spay]').is(':checked');
            var petBday = $('#id' + id).children('td[data-target=petBday]').text();

            $('#id').val(id);
            $('#fname').val(fname);
            $('#lname').val(lname);
            $('#address').val(address);
            $('#city').val(city);
            $('#state').val(state);
            $('#zip').val(zip);
            $('#phone').val(phone);
            $('#email').val(email);
            $('#petName').val(petName);
            $('#petType').val(petType);
            $('#dog_breed').val(dog_breed);
            $('#neut_spay').val(neut_spay);
            $('#petBday').val(petBday);
            $('#userId').val(id);
            $('#myModal').modal('toggle');
            

        });

        // create event to get data from fields and update in database

        $('#save').click(function(){
            var id = $('#userId').val();
            var fname = $('#fname').val();
            var lname = $('lname').val();
            var address = $('#address').val();
            var city = $('#city').val();
            var state = $('#state').val();
            var zip = $('#zip').val();
            var phone = $('#phone').val();
            var email = $('#email').val();
            var petName = $('#petName').val();
            var petType = $('#petType').val();
            var dog_breed = $('#dog_breed').val();
            var neut_spay = $('#neut_spay').is(':checked');
            var petBday = $('#petBday').val();
            if (neut_spay === true) {
                neut_spay = 'on';
            } else {
                neut_spay = '';
            }
            $.ajax({
                url      : "conn.php",
                method   : "post",
                data     : $('#form').serialize(),
                dataType : 'text',
    
                success  : function(response) {
                    console.log(response);
                    $('#id' + id).children('td[data-target=fname]').text(fname);
                    $('#id' + id).children('td[data-target=lname]').text(lname);
                    $('#id' + id).children('td[data-target=address]').text(address);
                    $('#id' + id).children('td[data-target=city]').text(city);
                    $('#id' + id).children('td[data-target=state]').text(state);
                    $('#id' + id).children('td[data-target=zip]').text(zip);
                    $('#id' + id).children('td[data-target=phone]').text(phone);
                    $('#id' + id).children('td[data-target=email]').text(email);
                    $('#id' + id).children('td[data-target=petName]').text(petName);
                    $('#id' + id).children('td[data-target=petType]').text(petType);
                    $('#id' + id).children('td[data-target=dog_breed]').text(dog_breed);
                    $('#id' + id).children('td[data-target=neut_spay]').text(neut_spay);
                    $('#id' + id).children('td[data-target=petBday]').text(petBday);
                    $('#myModal').modal('toggle');
                }
            });
            
        });
    });

    // delete row from database
    $(document).ready(function(){
        $(document).on('click', 'a[data-role="delete"]', function(e){
            e.preventDefault();
            var id = $(this).data('id');
            var fname = $('#id' + id).children('td[data-target=fname]').text();
            var lname = $('#id' + id).children('td[data-target=lname]').text();
            var address = $('#id' + id).children('td[data-target=address]').text();
            var city = $('#id' + id).children('td[data-target=city]').text();
            var state = $('#id' + id).children('td[data-target=state]').text();
            var zip = $('#id' + id).children('td[data-target=zip]').text();
            var phone = $('#id' + id).children('td[data-target=phone]').text();
            var email = $('#id' + id).children('td[data-target=email]').text();
            var petType = $('#id' + id).children('td[data-target=petType]').text();
            var dog_breed = $('#id' + id).children('td[data-target=dog_breed]').text();
            var petName = $('#id' + id).children('td[data-target=petName]').text();
            var neut_spay = $('#id' + id).children('td[data-target=neut_spay]').text();
            var petBday = $('#id' + id).children('td[data-target=petBday]').text();

            $('#id').val(id);
            $('#fname').val(fname);
            $('#lname').val(lname);
            $('#address').val(address);
            $('#city').val(city);
            $('#state').val(state);
            $('#zip').val(zip);
            $('#phone').val(phone);
            $('#email').val(email);
            $('#petName').val(petName);
            $('#petType').val(petType);
            $('#dog_breed').val(dog_breed);
            $('#neut_spay').val(neut_spay);
            $('#petBday').val(petBday);
            $('#userId').val(id);
            var $tr = $(this).closest('tr');
            
            if(confirm('Are you sure you want to delete ' + fname + ' ' + lname + '\'s record?') == true) {
        $.ajax({
                url      : "delete.php",
                method   : "post",
                data     : $('#form').serialize(),
                dataType : 'text',
    
                success  : function(response) {
                    $tr.find('td').fadeOut(100,function(){ 
                            $tr.remove();     
                    });              
                }
            });
        }
        });
    });

     

// append values in input fields
$(document).ready(function(){
$(document).on('click', 'button[data-role="add"]', function(){
    var id = $(this).data('add_id');

    $('#add_id').val(id);
    $('#addModal').modal('toggle');
});

// create event to get data from fields and update in database

$('#add').click(function(){
    var id = $('#add_userId').val();
    var fname = $('#add_fname').val();
    var lname = $('add_lname').val();
    var address = $('#add_address').val();
    var city = $('#add_city').val();
    var state = $('#add_state').val();
    var zip = $('#add_zip').val();
    var phone = $('#add_phone').val();
    var email = $('#add_email').val();
    var petName = $('#add_petName').val();
    var petType = $('#add_petType').val();
    var dog_breed = $('#add_dog_breed').val();
    var neut_spay = $('#add_neut_spay').val();
    var petBday = $('#add_petBday').val();

    $.ajax({
        url      : "insert.php",
        method   : "post",
        data     : $('#add_form').serialize(),
        dataType : 'text',

        success  : function(response) {
            console.log(response);
                $('#id' + id).children('td[data-target=fname]').text(fname);
                $('#id' + id).children('td[data-target=lname]').text(lname);
                $('#id' + id).children('td[data-target=address]').text(address);
                $('#id' + id).children('td[data-target=city]').text(city);
                $('#id' + id).children('td[data-target=state]').text(state);
                $('#id' + id).children('td[data-target=zip]').text(zip);
                $('#id' + id).children('td[data-target=phone]').text(phone);
                $('#id' + id).children('td[data-target=email]').text(email);
                $('#id' + id).children('td[data-target=petName]').text(petName);
                $('#id' + id).children('td[data-target=petType]').text(petType);
                $('#id' + id).children('td[data-target=dog_breed]').text(dog_breed);
                $('#id' + id).children('td[data-target=neut_spay]').text(neut_spay);
                $('#id' + id).children('td[data-target=petBday]').text(petBday);
                $('#addModal').modal('toggle');
            }
        });
    });
});
  

</script>
<?php
    include "Includes/footer.php";
?>
</body>
</html>