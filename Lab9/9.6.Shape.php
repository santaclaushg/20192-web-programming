<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
XML;
// load string
$xml = simplexml_load_string($str) or die ("Unable to load XML string!");

// for each shape
// calculate area
foreach ($xml->shape as $shape) {
    if ($shape['type'] == "circle") {
        $area = pi() * $shape['radius'] * $shape['radius'];
    }
    elseif ($shape['type'] == "rectangle") {
        $area = $shape['length'] * $shape['width'];
    }
    elseif ($shape['type'] == "square") {
        $area = $shape['length'] * $shape['length'];
    }
    echo $area."\n";
}

?>

