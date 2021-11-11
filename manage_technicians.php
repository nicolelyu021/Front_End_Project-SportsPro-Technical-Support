
<!--Nicole Salk-->
<?php
include '../view/header.php';

echo "<!DOCTYPE html><html><body>";

// Turn off default error reporting
//error_reporting(0);

// allow MySQLi error reporting and Exception handling
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    // Connect to MySQL, select database
    require("../model/database.php");
   
    if (! empty($_POST['techID'])) {
        $techID = $_POST['techID'];
        $query = "DELETE FROM technicians WHERE techID='$techID';";
        $result = mysqli_query($con, $query);
    } // end if
    // Perform SQL query
    $query = "SELECT * FROM technicians;";
    $result = mysqli_query($con, $query);
    
    //start echoing web page
    echo "<html>
        <head>
        <link href='../css/main.css' rel='stylesheet' type='text/css'>
        </head>
        <body>";
 
    echo "<h1 style='text-align:center'>Manage Technicians</h1>";
    echo "<table><tr>";
    
    // process result set.
    // first let's set table column headers.
    // each table field has field name, data type and length properties.
    // we only need the name
    $finfo = mysqli_fetch_fields($result);
    foreach ($finfo as $val) {
        if ($val->name != 'techID') {
          echo "<th> $val->name</th>";  
        }
        
    }
    echo "</tr>";
    
    // table column header done, now loop over result set.
    // Create a form for each record in result set.
    // Print field values for each record
    while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        
        echo "<tr>";
        echo "<form method='POST' action='../manage_technicians/manage_technicians.php'>";
        // inner loop. Print each field value for a result set record
        
        foreach ($line as $key => $value) {
            if ($key=='techID') {
                echo "<input type='hidden' value='" . $value . "' name='" . $key . "'/>";
            }
            else {
                echo "<td><input type='text' value='" . $value . "' name='" . $key . "'/></td>";
            }
           
        }
        
        // put delete button on form
        echo "<td ><input type='submit' value='delete' name='foo'/></td></tr>";
        echo "</form>";
    } // end while
    
    echo "</table></body></html>";
}
catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "<br>Line" . $e->getLine();
} finally {
    // close connection
    mysqli_close($con);
}



?>

<html>
<body>
	<br>
	<a href="../manage_technicians/newTechnician.php">Add new technician</a>
</body>
</html>

<?php include '../view/footer.php'; ?>