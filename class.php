<?php

/**
 * Created by PhpStorm.
 * User: stalk
 * Date: 29.12.2016
 * Time: 19:46
 */
class Domain
{
    public $name;
    public $status = 0;

    const ZONES = array('.ucoz.net', '.usite.pro', '.ucoz.club', '.ucoz.org', '.at.ua', '.my1.ru', '.clan.su', '.moy.su', '.do.am', '.ucoz.site', '.ucoz.ru', '.ucoz.com');

    /* public function __construct($id, $time, $name, $status)
     {
         echo "Новый домен создан и добавлен в базу!";
     }*/

    /* public function __destruct()
     {
         echo "Домен удален из базы";
     }*/

    public function showAll($status)
        /* выводим список всех:
        0 - домен НЕ ПРОВЕРЕН
        1 - домен СВОБОДЕН
        2 - домен ЗАНЯТ
        */
    {
        $db = new mysqli("localhost", "check.ucoz", "check.ucoz", "check.ucoz");
        if ($status == 0) {
            $query = "SELECT * FROM domain WHERE status = 0;";
        } elseif ($status == 1) {
            $query = "SELECT * FROM domain WHERE status = 1;";
        } elseif ($status == 2) {
            $query = "SELECT * FROM domain WHERE status = 2;";
        }

        $result = mysqli_query($db, $query);
        $count = mysqli_num_rows($result);
        if ($count) {
            while ($row = mysqli_fetch_array($result)) {
                echo $row['name'];
                echo "\r\n";
            }
        }
    }

    public function changeStatus($status)
    {
        /*TODO здесь пишем метод смены статуса домена */
    }

    public function addInBase($name)
        /* здесь код добавления нового домена в базу*/
    {
        $db = new mysqli("localhost", "check.ucoz", "check.ucoz", "check.ucoz");
        $add_new_domain = "INSERT INTO domain VALUES (NULL, CURRENT_TIMESTAMP , '$name', 0 );";
        $info = mysqli_query($db, $add_new_domain, MYSQLI_STORE_RESULT);
        if ($info === TRUE) {
            echo "Домен $name добавлен в базу для проверки!";
            return TRUE;
        } else {
            echo "Домен $name уже есть в базе данных!";
            return FALSE;
        }


    }

    public function checkName()
        /**
         * FIXME Проверяем длину домена, если больше 15 символов до зоны домена  - то удаляем
         */
    {
        if (strlen($this->name) <= 15) {
            echo "Домен $this->name меньше 15-ти символов!";
            return TRUE;
        } else {
            echo "Домен $this->name больше 15-ти символов!";
            return FALSE;
        }
    }


    public function checkDomain($name)
    {
        $name = "http://$this->name/";
        // create curl resource
        $ch = curl_init();
// set url
        curl_setopt($ch, CURLOPT_URL, $name);
//return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// $output contains the output string

        $output = curl_exec($ch);

        $findme = "<title>404 - Unable to load website</title>";
        $result = strpos($output, $findme);
        if ($result != false) {
            echo "Домен $this->name свободен для регистрации!";
        } else {
            echo "Домен $this->name занят!";
        }
// close curl resource to free up system resources
        curl_close($ch);
    }

}

$domain1 = new Domain;
$domain1->name = "234324234.ucoz.com";
echo $domain1->checkDomain($domain1->name);