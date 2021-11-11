<!--Harrison Weiss-->
<?php
include '../view/header.php';
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$product_name = $_POST['product_name'];
//echo $product_name;
$customerID = $_POST['customerID'];
//echo $customerID;
$product_code = "";
//$currentDate = new date();

 try {
 require("../model/database.php");
 $query = "SELECT * FROM products WHERE name='$product_name'";
 $result = mysqli_query($con, $query);
 $product_code = mysqli_fetch_array($result, MYSQLI_ASSOC)['productCode'];
 $statement = "INSERT INTO registrations VALUES ('$customerID', '$product_code', 'SELECT NOW();');";
 mysqli_query($con, $statement) or die('insert failed: '.mysqli_errno($con));
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
 
 echo'
 <html>
 <head>
 <link href="../css/main.css" rel="stylesheet" type="text/css">
 <body>
 <h2>Register Product</h2>
 <p>Product ('.$product_code.') was registered successfully.</p>
 </body>
 </head>
 </html>';
include '../view/footer.php';
?>
