<html>
<head>
<title>Home</title>
</head>
<?php
session_start();

if(!empty($_SESSION['ID'])) {
	echo "<h1>Welcome ".$_SESSION['FName']."</h1>";
	
}
else{
	echo "<h1>Welcome</h1>";
}
?>
</html>