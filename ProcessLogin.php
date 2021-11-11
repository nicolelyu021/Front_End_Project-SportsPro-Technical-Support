<!--Harrison Weiss-->
<?php include '../view/header.php'; 
$email = "";
$customerID = "";
if(!empty($_POST['email']))
    $email = $_POST['email'];

else
    header("Location: errors/error.php?message='form fields not filled in'");
    
$email = $_POST['email'];?>
<html>
<head>
<link href='../css/main.css' rel='stylesheet' type='text/css'>
</head>
<body>
<h2>Register Product</h2><br>
<form action = "../manage_products/ProcessRegistration.php" method="post">
<p>Customer: 
<?php
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    
    try{
        require("../model/database.php");
        require("../TestInput.php");
        $email = test_input($email);
        
        $query = "SELECT customerID, firstName, lastName FROM customers WHERE email='$email'";
        $result = mysqli_query($con, $query);
        $name = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $customerID = "";
        $firstName = "";
        $lastName = "";
        if(sizeof($name) > 0) {
            $customerID = $name['customerID'];
            $firstName = $name['firstName'];
            $lastName = $name['lastName'];
            
            echo $firstName. " " . $lastName;
        }
        else{
           header("Location: ../errors/error.php?&message='Invalid login creds'"); 
        }
    }
    catch (Exception $e) {
        $message = $e->getMessage();
        $code = $e->getCode();
        header("Location: ../errors/error.php?code=$code&message=$message");
    }
    finally{
        // close connection
        mysqli_close($con);
    }

?>
</p><p>Product: <select name="product_name">
<?php
    error_reporting(0);
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    
    try {
        // Connect to MySQL, select database
        require ("../model/database.php");
 
        // Perform SQL query
        $result = mysqli_query($con, "SELECT * FROM products;");
        
          
            // loop over result set. Print a table row for each record
            while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $product = $line['name'];
                echo "<option value='$product'>$product</option>";
            }
            echo "<input type='hidden' name='email' value=$email>";
            echo "<input type='hidden' name='customerID' value=$customerID>"; 
            
    } catch (Exception $e) {
        $message = $e->getMessage();
        $code = $e->getCode();
        header("Location: ../errors/error.php?code=$code&message=$message");
    }
    finally{
        // close connection
        mysqli_close($con);
    }
 // both fields not filled in, redirect to index.php

    
?>
</select>
<input type="submit" name="Submit" value="Select"></p>
</form>
<?php include '../view/footer.php'; ?>