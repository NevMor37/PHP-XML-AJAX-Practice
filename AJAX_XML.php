<?php
   $q = $_GET['q'];
   $xmlDoc = new DOMDocument();
   $xmlDoc->load("uploads/cd_catalog.xml");
   $x = $xmlDoc->getElementsByTagName("ARTIST");
   foreach($x as $artistName){
       if($artistName->nodeValue == $q){
             $y = $artistName->parentNode;
       }
   }
  // echo $y->nodeValue."<br />";
   $cd = $y->childNodes;
   //echo $cd->nodeValue."<br />";
   for($i =0; $i<$cd->length; $i++){
       if($cd->item($i)->nodeType == 1){
           echo "<b>".$cd->item($i)->nodeName.": </b>";
           echo $cd->item($i)->nodeValue."<br />";
       }
   }
?>