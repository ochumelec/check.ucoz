<?php
/**
 * Created by PhpStorm.
 * User: stalk
 * Date: 03.01.2017
 * Time: 0:08
 */
// create curl resource
$ch = curl_init();
$temp = "http://5454545554.do.am/";
// set url
curl_setopt($ch, CURLOPT_URL, $temp);

//return the transfer as a string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// $output contains the output string
$output = curl_exec($ch);

$findme = "<title>404 - Unable to load website</title>";
$result = strpos($output, $findme);
// close curl resource to free up system resources
curl_close($ch);
