<?php
$cookie_name = "Shubin_Wu";
$cookie_value = "Big_handsome_boy";
setcookie($cookie_name, $cookie_value, time()+(86400 * 30), '/');

session_start();
//set session variables
$_SESSION['name'] = "Shubin_Wu";
$_SESSION['lover'] = "Yangsui_Deng";
?>
<!DOCTYPE html >
<html>
<head>
     <style type = "text/css">
         p.testC {
             font-weight: bold;
         }
         p.testC span {
             color: #FF0000;
         }
         </style>
</head>
<body>
<?php
             if(!isset($_COOKIE[$cookie_name])){
                 echo $_COOKIE[$cookie_name]." has not been setted<br />";
             }else{
                 echo "The cookie ".$_COOKIE[$cookie_name]." has been set <br />";
             }
            // setcookie('$cookie_name', "", time() -3600);
?>
<?php
         echo "Session test begins: <br />";
         echo $_SESSION['name']." loves ".$_SESSION['lover']."<br />";
         print_r($_SESSION);
         /*
          * session_unset(); // remove all session variables
          * session _destroy(); // destroy all the sessions
         */
?>
        <form action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = "POST" enctype = "multipart/form-data">
            <p class = "testC">Select <span>image</span> to upload:</p>
            <input type = "file" name = "fileUpload" id = "fileUpload">
            <input type = "submit" value = "Submit Image" name = "submit">
        </form>
        <?php
            $target_dir = "uploads/";
            $UploadOK = 1;
            if(isset($_POST['submit'])){
                $target_file = $target_dir . basename($_FILES["fileUpload"]["name"]);//$_FILES["fileUpload"]["name"] returns the file name
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));//extension of the file in lower case
                $check = getimagesize($_FILES['fileUpload']['tmp_name']);
                if($check == false){
                     echo "File is not an image" . $check["mime"] . ".";
                     $UploadOK = 0;
                }else{
                    echo "File is an image";
                    $UploadOK = 1;
                }

                if(file_exists($target_file)){
                    echo "Sorry file already exists. <br />";
                    $UploadOK = 0;
                }
                if($_FILES["fileUpload"]['size'] > 500000){
                    echo "Sorry file is too large. <br />";
                    $UploadOK = 0;
                }
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif" ) {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br />";
                    $UploadOk = 0;
                }

                if($UploadOK == 0){
                    echo "Error occurs and your image isn't uploaded. <br /> ";
                }else{
                    if(move_uploaded_file($_FILES['fileUpload']['tmp_name'], $target_file)){
                        echo "The file".$_FILES['fileUpload']['name']." has been added to the directory";
                    }
                }
            }

        ?>
<?php
    echo "<hr />";
    echo "<hr />";
    echo "PHP filter use: <br />";
    $str = "<h1> Shubin in the hood </h1>";
    $newstr = filter_var($str, FILTER_SANITIZE_STRING);
    echo $newstr."<br />";

    $int = 100;
    if(filter_var($int, FILTER_VALIDATE_INT) == true){
        echo $int." is an integer. <br />";
    }else{
        echo $int." is not an integer. <br />";
    }
    //filter_var($ip, FILTER_VALIDATE_IP) for ip address
    //filter_var($email, FILTER_VALIDATE_EMAIL) for email
    //filter_var($url, FILTER_VALIDATE_URL) for url filter_var($url, FILTER_SANITIZE_URL)

?>
</body>
</html>