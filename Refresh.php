<!DOCTYPE html>
<html>
<body>
<?php
   $cars = array("BMW", "Volvo", "Lexus");
   echo "My car is a {$cars[2]}.";
   echo "<br />";

   $x = 0x8C;
   var_dump($x);
   echo "<br />";

   var_dump($cars);
   echo "<br />";

   echo count($cars);//获得数组长度
   echo "<br />"; 

/*
   class Car{
   	  var $color;
   	  function Car($color = "green"){
   	  	 $this->color = $color;
   	  }//默认值参数 如果调用没有参数的函数 则会采取默认值参数
   	  function what_color(){
   	  	return $this->color;
   	  }
   }
*/
#String 
   echo strlen("Hello world!");
   echo "<br />";
   echo strpos("Hello world", "world");// return the first matched index 
   echo "<br />";
#Const 
   define("GREETING", "Welcome to W3School.com.cn");
   define("GREETING2", "Welcome to W3School.com.cn", true);//大小写不敏感
   echo GREETING; echo "<br />";
   echo GREETING2; echo "<br />";
   echo greeting2; echo "<br />";
   $txt1 = "Hello"; $txt1 .= " world";
   echo $txt1."<br >";
//比较运算符
   $x = 100;
   $y = "100";
   var_dump($x == $y); echo "<br />";
   var_dump($x === $y); echo "<br />";
   var_dump($x !== $y); echo "<br />"; //类型不同或者值不相同 则返回真
//foreach loop only applyed for array
   $colors = array("red", "green", "blue", "yellow");
   foreach($colors as $co){
   	echo $co." ";
   }
   echo "<br />";
//array
   $age = array("Shubin" =>"24", "Shuxian" => "24.5", "Dengyangsui" => "21");
   echo "Dengyangsui is ".$age["Dengyangsui"]."years old."."<br / >";
   foreach($age as $x=>$x_value){
   	echo $x." is ".$x_value." yeas old."."<br >"; 
   }
   /*
sort() - 以升序对数组排序
rsort() - 以降序对数组排序
asort() - 根据值，以升序对关联数组进行排序
ksort() - 根据键，以升序对关联数组进行排序
arsort() - 根据值，以降序对关联数组进行排序
krsort() - 根据键，以降序对关联数组进行排序
  */
//超全局变量
$b = 724;
$s = 914;
function addition(){
	$GLOBALS['z'] = $GLOBALS['b'] + $GLOBALS['s'];
}
addition();
echo $z. "<br />";
echo $_SERVER['SCRIPT_FILENAME']."<br />";//返回当前脚本绝对路径
echo $_SERVER['PHP_SELF'];
echo "<br>";//返回当前脚本文件名
echo $_SERVER['SERVER_NAME'];
echo "<br>";//返回当前运行脚本服务器主机名
echo $_SERVER['HTTP_HOST'];
echo "<br>";//返回来自当前请求的host头
//echo $_SERVER['HTTP_REFERER'];
//echo "<br>";//返回当前页面完整url
echo $_SERVER['HTTP_USER_AGENT'];
echo "<br>";//
echo $_SERVER['SCRIPT_NAME'];
echo "<br />";//返回当前脚本路径
echo "<hr />";
echo "<hr />";
echo "<hr />";
echo "<hr />";
?>
<?php
echo "Advanced PHP example: "."<br />";
echo "Multi-dimentional Array: <br />";
$cars  =array(
    array("Volvo", 22, 18),
    array("BMW",15,13),
    array("Saab",5,2),
    array("Land Rover",17,15)
);
for($i=0; $i<4; $i++){
        echo "<ul>";
        echo "<li>".$cars[$i][0].": In stock: ".$cars[$i][1]." Sold: ".$cars[$i][2]."</li><br />";
        echo "</ul>";
}
echo "<hr />";
echo "Date and time: <br />";
date_default_timezone_set("America/New_York");
echo "Today is ".date("Y/m/d/l").".<br />";
echo "The time is ".date("h:i:sa").".<br />";

echo "<hr />";
echo "PHP read a file. "."<br />";
echo readfile("webdictionary.txt");
echo "<br />";
$myfile = fopen("webdictionary.txt", "r") or die("Unable to open the file");
echo fgets($myfile)."<br />";
echo fread($myfile, filesize("webdictionary.txt"))."<br />";//the second parameter specifies the maximum number of bytes to read
/*
     feof($myfile); check end of the file
     fgetc($myfile); read a single character from a file

    write to a file:
    $myfile = fopen("webdictionary.txt", "w");
    $txt = "Add a new content";
    fwrite($myfile, $txt); //It's overwriting.
 */
fclose($myfile);

?>

<?php include "copyRight.php";?>
</body>
</html>