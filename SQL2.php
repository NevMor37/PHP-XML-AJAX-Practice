<!DOCTYPE html>
<html>
<head>
      <style type = "text/css">
            table tr td{
                  border: 1px solid black;
            }
          </style>
</head>
<body>
     <?php

     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbName = "pracDB";
     $conn = mysqli_connect($servername, $username, $password, $dbName);
     if($conn){
         echo "Connect to server and DB successfully. <br />";
     }
     /*
     $tbl_myGuests = "
      CREATE TABLE myGuests(
          id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
          firstname varchar(30) NOT NULL,
          lastname varchar(30) NOT NULL,
          email varchar(30) NOT NULL,
          reg_date TIMESTAMP 
      )";
     if(mysqli_query($conn, $tbl_myGuests)){
         echo "First table created successfully";
     }else{
         echo "Creating table error".mysqli_error($conn);
     }*/
     /*
     function insertSQL($f, $l, $e){
         $sql_insert = "INSERT INTO myGuests (firstname, lastname, email) VALUES ($f, $l, $e)";
         $conn->query($sql_insert);
     }
     */

     $sql_insert = "INSERT INTO myGuests (firstname, lastname, email) VALUES ('Shubin', 'Wu', 'swu17@student.gsu.edu');";
     //mysqli_query($conn,$sql_insert);
     $sql_insert .= "INSERT INTO myGuests (firstname, lastname, email) VALUES ('Yangsui', 'Deng', 'dys@gmail.com');";
     $sql_insert .= "INSERT INTO myGuests (firstname, lastname, email) VALUES ('Huafu', 'Hu', 'hhf@gmail.com')";
     /*
     $sql_delete = "TRUNCATE TABLE myGuests";
     mysqli_query($conn, $sql_delete);
     */
     // mysqli_multi_query($conn, $sql_insert);
     //$lastid = mysqli_insert_id($conn);
     //echo $lastid."<br />";

     //Mysql Prepared
     $stmt = $conn->prepare("INSERT INTO myGuests (firstname, lastname, email) VALUES (? , ?, ?)");
     $stmt->bind_param("sss", $firstname, $lastname, $email);
     $firstname = "Mingmin";
     $lastname = "Lv";
     $email = "lmm@gmail.com";
     //$stmt->execute();
     //PHP Mysql select
     $sql_select = "select id, firstname, lastname, email from myGuests";
     $result = mysqli_query($conn, $sql_select);
     if(mysqli_num_rows($result) > 0){
         echo "<table>";
         echo "<tr><td>id</td><td>firstname</td><td>lastname</td><td>email</td></tr><br />";
         while($row = mysqli_fetch_assoc($result)){
              echo "<tr><td>".$row['id']."</td><td>".$row['firstname']."</td><td>".$row['lastname']."</td><td>".$row['email']."</td></tr><br />";
         }
         echo "</table>";
     }

//Delete
       $sql_delete = "DELETE FROM myGuests WHERE id = 1";
     //Update
        $sql_update = "UPDATE myGuests SET firstname = 'Louis' WHERE id = 1";

/*
         When the SQL query above is run, it will return the first 30 records.

        What if we want to select records 16 - 25 (inclusive)?

        Mysql also provides a way to handle this: by using OFFSET.

        The SQL query below says "return only 10 records, start on record 16 (OFFSET 15)":
         */
      $sql_limit = "select * from myGuest LIMIT 2 OFFSET 1";//从第二条（id为2 ）开始选 选两条

?>
</body>
</html>