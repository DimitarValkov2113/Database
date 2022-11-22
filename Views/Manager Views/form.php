<?php

// Include the database connection
include "db.php";

// Check that a form has been submitted
if( isset($_POST['branchadd']) ){

    $id = (int) $_POST['branchid'];

    //check if $id is a 10 digit long integer
    if(is_int($id)&& mb_strlen($id)==10){
        

        $stmt3 = $mysql->prepare("INSERT INTO Branch (ID, Address) VALUE (:ID, :Address)");

        $stmt3->bindParam(":ID", $_POST['branchid']);
        $stmt3->bindParam(":Address", $_POST['branchaddress']);
        $stmt3->execute();
        }  

    else{
        echo "<p>ERROR : ID should be a 10 digits long integer</p>";
    }

}

if(isset($_POST['branchdelete'])){

   
    $id= (int) $_POST['branchid'];
    
    $stmt2 = $mysql->prepare("DELETE FROM BRANCH WHERE ID =$id" );
    $stmt2->execute();  
}
// Check that a form has been submitted
if( isset($_POST['staffadd']) ){

        $stmt = $mysql->prepare("INSERT INTO Staff (ID, FirstName, LastName, Address, Postcode, Salary, Disciplinary, SickLeave, Role, Phone, Email, DateOfBirth, BranchID) VALUE (:ID, :FirstName, :LastName, :Address, :Postcode, :Salary, :Disciplinary, :SickLeave, :Role, :Phone, :Email, :DateOfBirth, :BranchID)");

        $stmt->bindParam(":ID", $_POST['staffid']);
        $stmt->bindParam(":FirstName", $_POST['stafffirstname']);
        $stmt->bindParam(":LastName", $_POST['stafflastname']);
        $stmt->bindParam(":Address", $_POST['staffaddress']);
        $stmt->bindParam(":Postcode",$_POST['staffpostcode']);
        $stmt->bindParam(":Salary", $_POST['staffsalary']);
        $stmt->bindParam(":Disciplinary", $_POST['staffdisciplinary']);
        $stmt->bindParam(":SickLeave", $_POST['staffsickleave']);
        $stmt->bindParam(":Role", $_POST['staffrole']);
        $stmt->bindParam(":Phone", $_POST['staffphone']);
        $stmt->bindParam(":Email", $_POST['staffemail']);
        $stmt->bindParam(":DateOfBirth", $_POST['staffdateofbirth']);
        $stmt->bindParam(":BranchID", $_POST['staffbranchid']);
        $stmt->execute();

}


if(isset($_POST['staffdelete'])){

    $id= (int) $_POST['staffid'];
    $stmt2 = $mysql->prepare("DELETE FROM Staff WHERE ID =$id" );
    $stmt2->execute();  
}



if(isset($_POST['branchedit'])){

    $id= (int) $_POST['branchid'];

    //https://www.w3docs.com/snippets/php/how-to-check-if-a-record-exists-in-php.html
    //https://www.plus2net.com/sql_tutorial/record-exist.php
    //https://www.tutorialspoint.com/best-way-to-test-if-a-row-exists-in-a-mysql-table
    //$query = "SELECT * FROM Branch WHERE ID = '$id'";

    //$result = $mysql->mysql_query("SELECT * FROM Branch WHERE ID = :ID");

    // $query=$mysql->prepare("SELECT ID from Branch where ID=:ID");
    // $query->bindParam(":ID", $id);
    // $id=$_POST['branchid'];
    // $query->execute();

    // $no=$query->rowCount();

    $query=$mysql->query("SELECT * from Branch WHERE ID=$id)");
    // $query->bindParam(":ID", $id);
    // $id=$_POST['id'];
    //$query->execute();

    if($query->num_rows == 0){
        //echo (int)$query;
        echo "<p>ERROR : Branch with submitted ID NONNONONO</p>";
    }
    else{
        echo "<p>YES : Branch with submitted ID exist!!</p>";
    }


    // if ($no >0) {
    //     //$stmt3 = $mysql->prepare("UPDATE Branch SET :Address WHERE ID = $id");
    //     echo "<p>YES : Branch with submitted ID existssss</p>";
    // }
    // else{
    //     echo "<p>ERROR : Branch with submitted ID doesn't exist</p>";
    // }

}

else {
// Error handling
}
?>
