<!--Harrison Weiss-->
<?php
include '../view/header.php';
// enter new user in database

// Turn off default error reporting
error_reporting(0);

// allow MySQLi error reporting and Exception handling
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    //use Exception Handling for empty form fields
    if (empty($_POST['productCode']) or empty($_POST['name']) or empty($_POST['version']) or empty($_POST['releaseDate'])) throw new Exception("form fields not filled in");
    
    $productCode = $_POST['productCode'];
    $name = $_POST['name'];
    $version = $_POST['version'];
    $releaseDate = $_POST['releaseDate'];
    
    // Connect to MySQL, select database
    require ("../model/database.php");
    
    // test name for HTML characters to avoid HTML Injection
    require ("../TestInput.php");
    //$name = test_input($name);
    //$password = test_input($password);
    
    // Perform SQL query
    $query = "INSERT INTO products VALUES('$productCode', '$name', '$version', '$releaseDate');";
    
    mysqli_query($con, $query);
    
} catch (Exception $e) {
    $message = $e->getMessage();
    $code = $e->getCode();
    header("Location: error.php?code=$code&message=$message");
}
finally{
    // close connection
    mysqli_close($con);
    echo'
    <html>
    <link href="../css/main.css" rel="stylesheet" type="text/css">
    <body>
    <h2 style="text-align: center;">New Product Registered</h2>
    <br>
    <a href="../manage_products/product_manager.php">Return</a>
    </body>
    </html>';
}
include '../view/footer.php';
?>