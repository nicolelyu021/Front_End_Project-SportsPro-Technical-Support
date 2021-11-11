<!-- Nicole Salk-->

<?php
// enter new user in database

// Turn off default error reporting
//error_reporting(0);

// allow MySQLi error reporting and Exception handling
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    //use Exception Handling for empty form fields
    if (empty($_POST['techID']) or empty($_POST['fname']) or empty($_POST['lname'])or empty($_POST['email']) or empty($_POST['phone']) or empty($_POST['pass'])) throw new Exception("form fields not filled in");
    
    $techID = $_POST['techID'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $pass = $_POST['pass'];
    
        // Connect to MySQL, select database
        require ("../model/database.php");
    
        // Perform SQL query
        $query = "INSERT INTO technicians VALUES('$techID', '$fname','$lname', '$email', '$phone', '$pass')";
    
        mysqli_query($con, $query);
    
} catch (Exception $e) {
    $message = $e->getMessage();
    $code = $e->getCode();
    header("Location: ../errors/error.php?code=$code&message=$message");
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
<h2 style="text-align: center;"><?php echo $fname ?> has been added</h2>
	<br>
	<br>
	<a href="../manage_technicians/manage_technicians.php">Manage Technicians</a> 
</body>
</html>
<?php include '../view/footer.php'; ?>