<?php
    $q = $_GET['q'];
    $xmlDoc = new DOMDocument();
    $xmlDoc->load("uploads/links.xml");
    $x =$xmlDoc->getElementsByTagName('link');
    foreach($x as $link){
        //echo $link->childNodes->item(1)->nodeValue."<br />";
        $temp = $link->childNodes->item(1)->nodeValue;
        if(stristr($q, substr($temp, 0, strlen($q)))){
            $returnL = "<a href=".$link->childNodes->item(3)->nodeValue.">".$temp."</a><br />";
            //$returnL = $link->childNodes->item(3)->nodeValue;
            echo $returnL;
        }
    }
?>