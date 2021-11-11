<!--Harrison Weiss-->
<?php include '../view/header.php';


?>
<html>
<head>
<link href="../css/main.css" rel="stylesheet" type="text/css">
<title>Update Customer</title>
</head>
<body>
<h2 class='aligned'>View/Update Customer<br></h2>
<form action="../manage_customers/ProcessUpdateCustomer.php" method="post"><table id="no_border">
<?php 
error_reporting(0);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$countries = [];

try{
    require("../model/database.php");
    $result = mysqli_query($con, "SELECT countryName FROM countries;");
    while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $country = $line['countryName'];
        $countries[] = $country;
    }
}
catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "<br>Line" . $e->getLine();
} finally {
    // close connection
    mysqli_close($con);
}

try{
    
    $customerID = $_POST['customerID'];
    require("../model/database.php");
    $result = mysqli_query($con, "SELECT customers.customerID, customers.firstName, customers.lastName, customers.address, customers.city, customers.state, customers.postalCode, countries.countryName, customers.phone, customers.email, customers.password 
FROM customers INNER JOIN countries ON customers.countryCode = countries.countryCode
WHERE customers.customerID = '$customerID';");
    
    while($line = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        
        $defaultCountry = $line["countryName"];        
        
        foreach ($line as $key => $val) {
            
            if($key == "countryName"){
                echo "<tr><td><label for='".$key."'>".$key.": </label></td>";
                echo"<td><select name='countryName'>";
                foreach($countries as $index => $countryOption){
                    if($countryOption == $defaultCountry){
                        echo "<option value ='".$countryOption."'selected>".$countryOption."</option>";
                    }
                    else{
                        echo "<option value='".$countryOption."'>".$countryOption."</option>";
                    }   
                }
                echo"</select></td></tr>";
            }
            else if($key == "customerID"){
                echo "<input type='hidden' name='$key' value='$val'>";
            }
            else{
                echo "<tr><td><label class='label' id='label' for='".$key."'>".$key.": </label></td>";
                echo "<td><input type='text' name='".$key."'value = '$val'></td></tr>";
            }
        }
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
</table></select>
<td></td><td><input type="submit" name="Submit" value="Update Customer"></td>
</form>
</body>
</html>
<?php include"../view/footer.php";?>