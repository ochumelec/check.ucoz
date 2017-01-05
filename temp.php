<?php
/**
 * Created by PhpStorm.
 * User: stalk
 * Date: 27.12.2016
 * Time: 16:23
 * Тренируемся делать выборки из базы...
 * SELECT * FROM domain WHERE checked = 1 или 0; выборка всех проверенных/не проверенных
 */
require_once "config.php";

$query = "SELECT * FROM domain;";
$result = mysqli_query($db, $query);

$count = mysqli_num_rows($result);

if ($count) {
    while ($row = mysqli_fetch_array($result)) {
        echo "name";
        echo $row['name'];
    }
}
