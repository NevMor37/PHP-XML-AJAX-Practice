<?php
  $q = $_GET['q'];
  //echo $q;
   if($q == 1){
       $xml = ("http://news.google.com/news?ned=us&topic=h&output=rss");
   }else if($q == 2){
       $xml = ("http://rss.msnbc.msn.com/id/3032091/device/rss/rss.xml");
   }

   $xmlDoc = new DOMDocument();
   $xmlDoc->load($xml);

   //load the first part Channel
   $channel = $xmlDoc->getElementsByTagName("channel")->item(0);
   /*
   for($i=0; $i<$channel->length;$i++){
       echo $channel->item($i)->nodeName."<br />";
   }
   */
  echo $channel_link = "<a href=".$channel->getElementsByTagName('link')->item(0)->nodeValue.">";
  echo $channel_title = $channel->getElementsByTagName('title')->item(0)->nodeValue."</a><br />";
  echo $channel_description = $channel->getElementsByTagName('description')->item(0)->nodeValue."<br />";

  $x = $xmlDoc->getElementsByTagName('item');
  //echo $x->length;
  for($i=0;$i<$x->length;$i++){
      echo $item_link = "<a href=".$x->item($i)->getElementsByTagName('link')->item(0)->nodeValue.">";
      echo $item_title = $x->item($i)->getElementsByTagName('title')->item(0)->nodeValue."</a><br />";
      echo $item_description  =$x->item($i)->getElementsByTagName('description')->item(0)->nodeValue."<br />";
 }

?>