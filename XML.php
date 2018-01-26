<!DOCTYPE html>
<html>
<body>
<?php
//Load xml String
$myXMLData =
    "<?xml version='1.0' encoding='UTF-8'?>
<note>
<to>Tove</to>
<from>Jani</from>
<heading>Reminder</heading>
<body>Don't forget me this weekend!</body>
</note>";

$xml = simplexml_load_string($myXMLData) or Die("Error: Can't load the xml string");
print_r($xml);
echo "<hr />";

//Error handling
libxml_use_internal_errors(true);
$myXMLData =
    "<?xml version='1.0' encoding='UTF-8'?> 
<document> 
<user>John Doe</wronguser> 
<email>john@example.com</wrongemail> 
</document>";

$xml2 = simplexml_load_string($myXMLData);
if($xml2 === false){
    echo "Some errors occurse. <br />";
    foreach(libxml_get_errors() as $error){
        echo $error->message."<br />";
    }
}else{
    print_r($xml2);
}

echo "<hr />";
//load from file

$xml3 = simplexml_load_file("uploads/note.xml"); //or die("Error : Can't open the xml file");
libxml_use_internal_errors(true);
if($xml3 === false){
    foreach(libxml_get_errors() as $error3){
        echo $error3->message. "<br />";
    }
}else{
    echo $xml3 ->to."<br />";
    echo $xml3 ->from."<br />";
    echo $xml3->heading."<br />";
    echo $xml3->body."<br />";
}
echo "<hr />";
echo "For larger xml file: <br />";
$xml4 = simplexml_load_file("uploads/books.xml") or die("Can't open thr books.xml file. <br />");
echo $xml4->book[0]->title."<br />";
echo $xml4->book[1]->title."<br />";
echo "loop to get node's values: <br />";

foreach($xml4->book as $books) {
    echo $books->title . ", ";
    echo $books->author . ", ";
    echo $books->year . ", ";
    echo $books->price . "<br />";
}

foreach ($xml4->book as $books){
    echo $books->title['lang']."<br />";
}
echo "<hr />";
//Expat parser
echo "Another XML paser for PHP Expat(Event based parsers) <br />";
$parser = xml_parser_create();
function start($parser, $element_name, $element_attrs) {
     switch($element_name){
         case "NOTE":
             echo "--Note -- <br />";
         break;
         case "TO":
             echo "To: ";
             break;
         case "FROM":
             echo "From: ";
             break;
         case "HEADING";
         echo "Heading: ";
         break;
         case "BODY":
             echo "Message: ";
     }
}

function stop($parser, $element_name){
    echo "<br />";
}

function char($parser, $data){
    echo $data;
}
xml_set_element_handler($parser, "start", "stop");
xml_set_character_data_handler($parser, "char");
$fp = fopen("uploads/note.xml", "r");

while($data = fread($fp, 4096)) {
       xml_parse($parser, $data, feof($fp)) or
       die(sprintf("XML Error: %s at line %d",
           xml_error_string(xml_get_error_code($parser)),
               xml_get_current_line_number($parser)));
}
xml_parser_free($parser);

echo "<hr />";
echo "XML DOM Another Tree-structured XML parser for PHP. <br />";
$xml_doc = new DOMDocument();
$xml_doc ->load("uploads/note.xml");
print $xml_doc->saveXML() ."<br />";//the saveXML() function puts the internal XML document into a string, so we can output it
$x = $xml_doc->documentElement;
foreach($x->childNodes as $item){
    print $item->nodeName . " = " . $item->nodeValue . "<br />";
}


?>
</body>
</html>