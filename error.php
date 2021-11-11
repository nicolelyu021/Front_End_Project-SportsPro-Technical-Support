<!--  This is an error handling page. $message value sent from another script -->
<html>
<link href="../css/main.css" rel="stylesheet" type="text/css"> 
<body>
<h3>Error</h3>

<?php 
//when this script is executed, be sure to look at the URL

$message ="";

  if (!empty($_GET['message'])) $message=$_GET['message'];

    echo $message."<br><br>";
    
?>
<a href="../index.php">Return Home</a>

</body></html>



