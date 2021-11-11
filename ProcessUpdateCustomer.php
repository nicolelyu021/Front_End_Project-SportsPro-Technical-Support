<!-- Yuening Nicole Lyu Harrison Weiss -->
<?php
include '../view/header.php';
// enter new user in database

// Turn off default error reporting
error_reporting(0);

// allow MySQLi error reporting and Exception handling
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    
   // if (empty($_POST['fname']) or empty($_POST['lname']) or empty($_POST['city']) or empty($_POST['email']) or empty($_POST['phone']) or empty($_POST['password'])) throw new Exception("form fields not filled in");
    $customerID = $_POST['customerID'];
    
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $postalCode = $_POST['postalCode'];
    $countryName = $_POST['countryName'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
        // Connect to MySQL, select database
        require ("../model/database.php");
        
        $result = mysqli_query($con, "SELECT countryCode FROM countries WHERE countryName = '$countryName';");
        $countryCode = mysqli_fetch_array($result, MYSQLI_ASSOC)['countryCode'];        

        // Perform SQL query
        $query = "UPDATE customers SET
        firstName='$firstName',lastName='$lastName', address='$address',city='$city',state='$state',
        postalCode='$postalCode',countryCode='$countryCode',phone='$phone',email='$email', password='$password'
        WHERE customerID='$customerID';
        ";
    
        mysqli_query($con, $query);
    
} catch (Exception $e) {
    $message = $e->getMessage();
    $code = $e->getCode();
    header("Location: ..errors/error.php?code=$code&message=$message");
}
finally{
    // close connection
    mysqli_close($con);
}
?>

<html>
<head> <link href='../css/main.css' rel='stylesheet' type='text/css'>
</head>
<body>
<h2 style="text-align: center;"><?php echo $firstName ?> has been updated</h2>
	<br>
	<br>
	<a href="../manage_customers/SelectCustomerPage.php">Search Customers</a>   
</body>
</html>
<?php include '../view/footer.php'; ?>