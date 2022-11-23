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
    <title>Login</title>
</head>
<body>

<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">


<div class="container w-25 p-3">
    <form name="form" action="" method="POST">
        <div class="form-group">
            <label for="inputEmail">Email address</label>
            <input type="email" required class="form-control" name="inputEmail" id="inputEmail" placeholder="Enter Email">
        </div>
        <div class="form-group">
            <label for="inputPassword">Password</label>
            <input type="password" required class="form-control" name="inputPassword" id="inputPassword" placeholder="Password">
        </div>
        <br>
        <button type="submit" class="btn btn-primary" onclick="does_not_exist()">Submit</button>
    </form>
    Need an account? <a href="createaccount.php">Create one here!</a>
</div>
<?php
    pre_r($_POST);
    $submitted = $_POST;

    if (isset($submitted['inputEmail'])){
        $email_received = $submitted['inputEmail'];

        $query = "SELECT * FROM customer WHERE Email = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$email_received]);
        $customer_received = $stmt->fetch();

        if (empty($customer_received)){
            echo "This account does not exist!!!";
        }
        else{
            if ($customer_received['Password'] == $submitted['inputPassword']){
                $_SESSION["user_ID"] = $customer_received['ID'];
                $_SESSION["user_firstname"] = $customer_received['FirstName'];
                $_SESSION["user_lastname"] = $customer_received['LastName'];
                $_SESSION["user_address"] = $customer_received['Address'];
                $_SESSION["user_postcode"] = $customer_received['Postcode'];
                $_SESSION["user_email"] = $customer_received['Email'];
                $_SESSION["user_password"] = $customer_received['Password'];
                $_SESSION["user_dob"] = $customer_received['DateOfBirth'];
                $_SESSION["user_card_details"] = $customer_received['CardDetails'];
                $_SESSION["user_loyalty_points"] = $customer_received['LoyaltyPoints'];
            }
        }
    }
?>


<?php
function pre_r( $array ) {
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}
?>

<script>

</script>
</body>
</html>
