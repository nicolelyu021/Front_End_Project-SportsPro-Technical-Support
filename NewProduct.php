<!--Harrison Weiss-->
<?php
include '../view/header.php';
echo'
    
<html>
<head>
<title>New Product</title>
<link href="../css/main.css" rel="stylesheet" type="text/css">
</head>
<body>
<h1>Create a New Product</h1>
<form action="../manage_products/ProcessNewProduct.php" method="post" >
<table id="no_border">
<tr><td>productCode:</td><td> <input type="text" name="productCode"></td></tr>
<tr><td>name:</td><td><input type="text" name="name"></td></tr>
<tr><td>version:</td><td> <input type="number" step="any" name="version"></td></tr>
<tr><td>releaseDate:</td><td> <input type="text" name="releaseDate"></td><td>Use yyyy-mm-dd format</td></tr>
<tr><td colspan="2"><input type="submit" value="Submit"></td></tr>
</table>
</form>
    
</body>
</html>
';
include '../view/footer.php';
?>