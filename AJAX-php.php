<!DOCTYPE html>
<html>
<body>
       <?php
           /*
AJAX = Asynchronous JavaScript and XML.

AJAX is a technique for creating fast and dynamic web pages.

AJAX allows web pages to be updated asynchronously by exchanging small amounts of data with the server behind the scenes. This means that it is possible to update parts of a web page, without reloading the whole page.

Classic web pages, (which do not use AJAX) must reload the entire page if the content should change.

Examples of applications using AJAX: Google Maps, Gmail, Youtube, and Facebook tabs.

*/

       $a[] = "Anna";
       $a[] = "Brittany";
       $a[] = "Cinderella";
       $a[] = "Diana";
       $a[] = "Eva";
       $a[] = "Fiona";
       $a[] = "Gunda";
       $a[] = "Hege";
       $a[] = "Inga";
       $a[] = "Johanna";
       $a[] = "Kitty";
       $a[] = "Linda";
       $a[] = "Nina";
       $a[] = "Ophelia";
       $a[] = "Petunia";
       $a[] = "Amanda";
       $a[] = "Raquel";
       $a[] = "Cindy";
       $a[] = "Doris";
       $a[] = "Eve";
       $a[] = "Evita";
       $a[] = "Sunniva";
       $a[] = "Tove";
       $a[] = "Unni";
       $a[] = "Violet";
       $a[] = "Liza";
       $a[] = "Elizabeth";
       $a[] = "Ellen";
       $a[] = "Wenche";
       $a[] = "Vicky";

       $q = $_GET['q'];
       //echo $q;
       $q = strtolower($q);
       $len = strlen($q);
       foreach($a as $names){
             if(stristr($q, substr($names, 0, $len))){
                  echo $names." ";
             }
       }
       ?>
</body>
</html>