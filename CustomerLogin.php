<!--Harrison Weiss-->
<?php
include '../view/header.php';
echo '
<!DOCTYPE html>
<html>
<head>
<link href="../css/main.css" rel="stylesheet" type="text/css">
</head>
<body>
<h1>Customer Login Page</h1>
<p>You must login before you can register a product.</p>
<form action="../manage_products/ProcessLogin.php" method="post" >
<label for "email">Email: </label><input type="email" name="email"<br>
<input type="submit" value="Login">
</table>
</form>
<br/>
</body>
</html>
';
include '../view/footer.php';
?>