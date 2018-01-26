<!DOCTYPE html>
<html>
<head>
	<style type = "text/css">
       p.tip span{
       	   font-weight: bold;
       	   color: #ff9955;
       }
       p.tip {
           color: blue;
       }
       .error{
       	color: #FF0000;
       }
    </style>
    <!--span 可以为css的修饰作进一步的局部化处理-->
</head>
<body>
	<?php
	    $Nam_error ="";
	    $Email_error ="";
	    $genderError = "";
	    $name = "";
	    $email = "";
	    $gender = "";
	    function safe_gard($data){
                  $data = trim($data);//去除多余空格制表符换行
                  $data = stripslashes($data);//去除反斜杠
                  $data =  htmlspecialchars($data);//传递的变量会生成转意代码
                  return $data;
           }
        if (isset($_POST['sub'])){
        	if(!empty($_POST["name"])){
                 $name = safe_gard($_POST['name']);
        	     if(!preg_match("/^[a-zA-Z ]*$/",$name )) {
                     $Nam_error = "Only letters and white space allowed";
                 }
        	}else{
        		$Nam_error = "Name is required";
        	}
            if(!empty($_POST["email"])){
                 $email = safe_gard($_POST['email']);
                 if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                     $Email_error = "E-mail is not validated";
                 }
        	}else{
        		$Email_error = "E-mail is required";
        	}
            if(!empty($_POST['gender'])){
                $gender = safe_guard($_POST['gender']);
            }else{
                $genderError = "Please select gender. ";
            }
           if(!empty($name) && !empty($email)){
           echo "Welcome ".$name." and your e-mail address is ".$email.".<br />";
           echo "<br />";
           echo "<br />";
           }
	}
	?>
	<form action = <?php echo htmlspecialchars($_SERVER['PHP_SELF']);?> method = "POST">
		Name : <input type = "text", name = "name">
		<span class = "error"> * <?php echo $Nam_error;?></span>
		<br /><br />
		E-mail: <input type = "text" name = "email">
		<span class = "error"> * <?php echo $Email_error;?></span>
		<br /><br />
        Gender:
        <input type = "radio" name = "gender" value = "female">Female
        <input type = "radio" name = "gender" value ="male" >Male
        <span class = "error"> * <?php echo "$genderError";?></span><br /><br />
		<input type = "submit" name = "sub">
		<br />
	</form>
	<p class = "tip">Other text<span> Mention:</span>... ... ...</p>
    <?php include "copyRight.php";?>
</body>
</html>