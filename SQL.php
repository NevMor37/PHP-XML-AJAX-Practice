<!DOCTYPE html>
<html>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$conn = mysqli_connect($servername, $username, $password);
if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}
echo "Connection successful!<br />";
//$conn->close(); mysqli_close($conn);
$sql = "CREATE DATABASE pracDB";
if(mysqli_query($conn, $sql)){
    echo "Database pracDB created successfully";
}else{
    echo "Error occursed when creating DB".mysqli_error($conn);
}
?>
</body>
</html>