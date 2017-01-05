<?php
/**
 * Created by PhpStorm.
 * User: stalk
 * Date: 25.12.2016
 * Time: 9:52
 */
//Конфиг коннекта к БД
$db = new mysqli("localhost", "check.ucoz", "check.ucoz", "check.ucoz");
if ($db->connect_errno) {
    echo "Не удалось подключиться к MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
}
/*echo $mysqli->host_info . "\n";*/

/*$zones = array('.ucoz.net', '.usite.pro', '.ucoz.club', '.ucoz.org', '.at.ua', '.my1.ru', '.clan.su', '.moy.su', '.do.am', '.ucoz.site', '.ucoz.ru', '.ucoz.com');*/