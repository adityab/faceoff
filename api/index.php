<?php

/*
if ($_FILES["file"]["error"] > 0)
{
    echo "Error: " . $_FILES["file"]["error"] . "<br />";
}

#else 
{
    echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    echo "Type: " . $_FILES["file"]["type"] . "<br />";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    echo "Stored in: " . $_FILES["file"]["tmp_name"];
}
*/

require_once("scanner.php");

// Get the filename
$file = (string)$_FILES["file"]["tmp_name"];

// Make a Scanner object
$engine = new Scanner;

// Scan for faces and store the results in an array
$result = $engine->scan($file);

// The results is json-friendly, encode and echo
echo json_encode($result);

?>
