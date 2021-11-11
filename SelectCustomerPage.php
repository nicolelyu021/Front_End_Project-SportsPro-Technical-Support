<!-- Yuening Nicole Lyu -->
<?php include '../view/header.php'; ?>

<html>
<link href="../css/main.css" rel="stylesheet" type="text/css">
<div style = "position:relative; left:30px">
    
    <h2>Customer Search</h2>
    
    <!-- creating the search form -->
    <form action="SelectCustomerPage.php" method="post">
    Last Name: <input type="text" name="lastName"><input type="submit" value="Search">
    </form>
    
 
<?php


// Turn off default error reporting
//error_reporting(0);

// allow MySQLi error reporting and Exception handling
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    // Connect to MySQL, select database
   
    require ("../model/database.php");
   // $con = mysqli_connect("webdev.bentley.edu", "lyuyuen", "9203", "lyuyuen");
 
    /*When the user enters a last name and clicks the Search button, 
     the application displays a table of customers with the specified last name. */ 
    
   
    if (! empty($_POST['lastName'])) {
        $lastName = $_POST['lastName']; 
        //echo "<p>".$lastName."</p>";
        $query = "SELECT customerID, CONCAT(firstName, ' ', lastName) AS Name, email AS 'Email Address', city AS City FROM customers WHERE lastName='$lastName';";
        $result = mysqli_query($con, $query);
     // end if
    
    echo "<html>
        <head>
        <link href='../css/main.css' rel='stylesheet' type='text/css'>
        </head>
        <body>";
    
    echo "<h2>Results</h2>";
    echo "<table><tr>";
    
    // process result set.
    // first let's set table column headers.
    // each table field has field name, data type and length properties.
    // we only need the name
    $finfo = mysqli_fetch_fields($result);
    foreach ($finfo as $val) {
        if ($val->name != "customerID"){
        echo "<th> $val->name</th>";
        }
    }
    echo "</tr>";
    
    // table column header done, now loop over result set.
    // Create a form for each record in result set.
    // Print field values for each record
    while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        
        echo "<tr>";
        echo "<form method='POST' action='../manage_customers/UpdateCustomerPage.php'>";
        // inner loop. Print each field value for a result set record
        echo "<input type='hidden' value='" . $line['customerID'] . "' name='customerID'/>";
        echo "<td><input type='text' value='" . $line['Name'] . "'name='name'/></td>";
        echo "<td><input type='text' value='" . $line['Email Address'] . "'name='Email Address'/></td>";
        echo "<td><input type='text' value='" . $line['City'] . "'name='City'/></td>";
        /*foreach ($line as $key => $value) {
            echo "<td><input type='text' value='" . $value . "' name='" . $key . "'/></td>";
        }*/
       
        // put select button on form
        echo "<td><input type='submit' value='Select' name='selectButton'/></td></tr>";
        echo "</form>";
    } // end while
    
    echo "</table></body></html>";
    }
}
catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "<br>Line" . $e->getLine();
} finally {
    // close connection
    mysqli_close($con);
}

?>

	<br>
</div> 
</body>
</html>

<?php include '../view/footer.php'; ?>