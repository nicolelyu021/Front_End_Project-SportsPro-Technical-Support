<!--Nicole Salk-->

<?php


include '../view/header.php';

echo'
    
<html>
<head> 
<link href="../css/main.css" rel="stylesheet" type="text/css">
<title>Create New Technician</title>
</head>
<body>
<h1>Add a New Technician</h1>
<form action="processNewTechnician.php" method="post" >
<table>
<tr><td>TechID:</td><td> <input type="text" name="techID"></td></tr>
<tr><td>First Name:</td><td> <input type="text" name="fname"></td></tr>
<tr><td>Last Name:</td><td> <input type="text" name="lname"></td></tr>
<tr><td>Email:</td><td> <input type="email" name="email"></td></tr>
<tr><td>Phone:</td><td> <input type="text" name="phone"></td></tr>
<tr><td>Password:</td><td> <input type="pass" name="pass"></td></tr>
<tr><td colspan="2"><input type="submit" value="Submit"></td></tr>
</table>
</form>
    
</body>
</html>
';

include '../view/footer.php';
?>