<?php
// Start the session if it has not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include '../../connection.php';
$conn = connect();
?>

<!DOCTYPE html>
<html lang="en-UK">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Account</title>
</head>
<body>

<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">


<div class="container">
    <div class="row">

        <div class="col">
            <form name="form" action="" method="POST">
                <div class="form-group">
                    <label for="inputFirstName">First Name</label>
                    <input type="text" required class="form-control" name="inputFirstName" id="inputFirstName" placeholder="Enter First Name">
                </div>
                <div class="form-group">
                    <label for="inputLastName">Last Name</label>
                    <input type="text" required class="form-control" name="inputLastName" id="inputLastName" placeholder="Enter Last Name">
                </div>
                <div class="form-group">
                    <label for="inputEmail">Email address</label>
                    <input type="email" required class="form-control" name="inputEmail" id="inputEmail" placeholder="Enter Email">
                </div>
                <div class="form-group">
                    <label for="inputAddress">Address</label>
                    <input type="text" required class="form-control" name="inputAddress" id="inputAddress" placeholder="Enter Address">
                </div>
                <div class="form-group">
                    <label for="inputPostcode">Postcode</label>
                    <input type="text" maxlength="6" required class="form-control" name="inputPostcode" id="inputPostcode" placeholder="Enter Postcode">
                </div>
                <div class="form-group">
                    <label for="inputDateOfBirth">Date of Birth</label>
                    <input type="Date" required class="form-control" name="inputDateOfBirth" id="inputDateOfBirth" placeholder="Enter Date of Birth">
                </div>
                <div class="">
                    <button type="submit"  name="submit" value ="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>