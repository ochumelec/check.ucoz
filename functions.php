<?php
/**
 * Created by PhpStorm.
 * User: stalk
 * Date: 27.12.2016
 * Time: 17:00
 */
require_once "config.php";

function showChecked()
{
   global $db;
    $query = "SELECT * FROM domain WHERE status = 1;";
    $result = mysqli_query($db, $query);

    $count = mysqli_num_rows($result);

    if ($count) {
        while ($row = mysqli_fetch_array($result)) {
            echo $row['name'];
            echo "\r\n";
        }
    }
}
showChecked();

