<!DOCTYPE html>
<html>
<head>
       <style type = "text/css">
            table {
                width: 100%;
                border-collapse: collapse;
            }
           table td, th{
                border: 1px solid black;
                padding: 5px;
           }
           th{
               text-align: left;
           }
           </style>
</head>
<body>
<?php
$q = intval($_REQUEST["q"]);//将字符串转化为integer
$server = "localhost";
$psw = "";
$user = "root";
$db = "pracDB";
$con = mysqli_connect($server, $user, $psw, $db);
/*
if(!$con){
    echo "Error occurse! <br />";
}else{
    echo "Connect DB successfully";
}
*/
$sql = "SELECT * FROM AJAX_DB where id = $q";
//echo $sql;
$result = mysqli_query($con, $sql);
if(mysqli_num_rows($result) > 0){
    echo "<table>
<tr>
<th>Firstname</th>
<th>Lastname</th>
<th>Age</th>
<th>Hometown</th>
<th>Job</th>
</tr>";
    while($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['firstname'] . "</td>";
        echo "<td>" . $row['lastname'] . "</td>";
        echo "<td>" . $row['age'] . "</td>";
        echo "<td>" . $row['hometown'] . "</td>";
        echo "<td>" . $row['job'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>
</body>
</html>
