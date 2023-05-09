<?php
$xmlDoc = new DOMDocument();
$xmlDoc->load("ajax_file.xml");

$x = $xmlDoc->getElementsByTagName('Resume');

//get the q parameter from URL
$q = $_GET["q"];

//lookup all links from the xml file if length of q>0
if (strlen($q) > 0) {
    $hint = "";
    for ($i = 0; $i < ($x->length); $i++) {
        $y = $x->item($i)->getElementsByTagName('Name');
        $z = $x->item($i)->getElementsByTagName('Url');
        $t = $x->item($i)->getElementsByTagName('Skills');
        if ($y->item(0)->nodeType == 1) {
            //find a link matching the search text
            if (stristr($y->item(0)->childNodes->item(0)->nodeValue, $q)) {
                $name = $y->item(0)->childNodes->item(0)->nodeValue;
                $url = $z->item(0)->childNodes->item(0)->nodeValue;
                $skill = $t->item(0)->childNodes->item(0)->nodeValue;
                if ($hint == "") {
                    $hint = "<a style='text-decoration: none;' href='" .
                        $url .
                        "'>" . "<div>" . $name . " (" . $skill . ")" . "</div>"
                        . "</a>";
                } else {
                    $hint = $hint . "<br /><a style='text-decoration: none' href='" .
                        $url .
                        "'>" . "<div >" . $name . " (" . $skill . ")" . "</div>" . "</a>";
                }
            }
        }
    }
}

// Set output to "no suggestion" if no hint was found
// or to the correct values
if ($hint == "") {
    $response = "no suggestion";
} else {
    $response = $hint;
}

//output the response
echo $response;