<?php
include '../../connection.php';
$conn = connect();
?>

<!DOCTYPE html>
<html lang="en-UK">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Account</title>
</head>


<body>

<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/cdbootstrap/css/cdb.min.css" />
<!-- JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/cdbootstrap/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/cdbootstrap/js/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/cdbootstrap/js/cdb.min.js"></script>

<div class="container">
    <div class="row">
        <div class="col-3">
            <div class="app" style="display: flex; height: 100%; position: absolute">
                <div class="sidebar bg-dark text-white" id="sidebar-showcase" role="cdb-sidebar">
                    <div class="sidebar-container">
                        <div class="sidebar-header text-center">
                            <a class="sidebar-toggler"><i class="fa fa-bars"></i></a>
                            <a class="sidebar-brand">Contrast</a>
                        </div>
                        <form name="side-bar" action="" method="post">
                            <div class="sidebar-nav">
                                <div class="sidenav">
                                    <a class="sidebar-item">
                                    <i class="fa fa-th-large sidebar-icon"></i>
                                    <input type="submit" name="myaccountdetails" value="My Account">
                                    </a>
                                    <a class="sidebar-item">
                                    <i class="fa fa-sticky-note sidebar-icon"></i>
                                    <input type="submit" name="mypurchases" value="My Purchases">
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="col-9">
            <div class="jumbotron jumbotron-fluid">
                <h1 class="display-4">My Account</h1>
                <hr class="my-4">
            </div>
            <div class="row">
            <?php
                if (isset($_POST["myaccountdetails"])){
                    $query = "SELECT * FROM customer WHERE ID = customer.ID";
                    $ID = $_SESSION["user_ID"];
                    $stmt = $conn->prepare($query);
                    $stmt->bindParam('ID', $ID);
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    unset($_POST["myaccountdetails"]);
                    if(empty($result)){
                        echo "Could not find your details.";
                    }else{
                        echo  "<table class="."table table-bordered".">
                                <thead>
                                    <tr>
                                        <th scope="."col".">First Name</th>
                                        <th scope="."col".">Last Name</th>
                                        <th scope="."col".">Address</th>
                                        <th scope="."col".">Postcode</th>
                                        <th scope="."col".">Email</th>
                                        <th scope="."col".">Date of birth</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>".$result["FirstName"]."</td>
                                        <td>".$result["LastName"]."</td>
                                        <td>".$result["Address"]."</td>
                                        <td>".$result["Postcode"]."</td>
                                        <td>".$result["Email"]."</td>
                                        <td>".$result["DateOfBirth"]."</td>
                                    </tr>
                                </tbody>
                              </table>"; 
                    }
                    
                }
                if (isset($_POST["mypurchases"])){
                    $query = "SELECT o.ID as orderID, o.Date, o.Time, o.Price, o.PaymentMethod, c.FirstName, c.LastName,c.Address, c.Postcode, c.Email, c.LoyaltyPoints FROM orders o, customer c WHERE ? = o.CustomerID AND o.CustomerID=c.ID ";
                    $customer_ID = $_SESSION["user_ID"];
                    $stmt = $conn->prepare($query);
                    $stmt->bindParam('ID', $ID);
                    $stmt->execute([$customer_ID]);
                    $result = $stmt->fetchAll();
                    unset($_POST["mypurchases"]);
                    if(empty($result)){
                        echo "Could not find any purchases.";
                    }else{
                        echo  "<table class="."table table-bordered".">
                    <thead>
                        <tr>
                        <th scope="."col".">Order ID</th>
                        <th scope="."col".">Date</th>
                        <th scope="."col".">Time</th>
                        <th scope="."col".">Price</th>
                        <th scope="."col".">PaymentMethod</th>
                        <th scope="."col".">First Name</th>
                        <th scope="."col".">Last Name</th>
                        <th scope="."col".">Address</th>
                        <th scope="."col".">Postcode</th>
                        <th scope="."col".">Email</th>
                        <th scope="."col".">Date of birth</th>
                        </tr>
                    </thead>
                    <tbody>";
                    foreach($result as $purchase){
                        echo "
                            <tr>
                            <td>".$purchase["orderID"]."</td>
                            <td>".$purchase["Date"]."</td>
                            <td>".$purchase["Time"]."</td>
                            <td>".$purchase["Price"]."</td>
                            <td>".$purchase["PaymentMethod"]."</td>
                            <td>".$purchase["FirstName"]."</td>
                            <td>".$purchase["FirstName"]."</td>
                            <td>".$purchase["LastName"]."</td>
                            <td>".$purchase["Address"]."</td>
                            <td>".$purchase["Postcode"]."</td>
                            <td>".$purchase["Email"]."</td>
                            <td>".$purchase["LoyaltyPoints"]."</td>
                            </tr>";
                    }
                    echo "</tbody>
                    </table>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>

</body>
<script>
  const sidebar = document.querySelector('.sidebar');
  new CDB.Sidebar(sidebar);
</script>
</html>
