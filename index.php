<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Чекалка доменов Укоза</title>
</head>
<body>
<form action="index.php" method="post">
    <textarea name="new_domain" rows="5" cols="30"></textarea><br>
    <input type="submit" value="Отправить" name="submit">
    <br><br>
    <h2>Отладка</h2>
</form>
</body>
</html>

<?php
/**
 * Created by PhpStorm.
 * User: stalk
 * Date: 22.12.2016
 * Time: 20:18
 */

require_once "config.php";
/*FIXME
изменить список зон на Константу! и вынести ее в конфиг!
*/
$zones = array('.ucoz.net', '.usite.pro', '.ucoz.club', '.ucoz.org', '.at.ua', '.my1.ru', '.clan.su', '.moy.su', '.do.am', '.ucoz.site', '.ucoz.ru', '.ucoz.com');

$new_domains = $_POST['new_domain']; // получаем введенные домены
$order = array("\r\n", "\n", "\r");
$replace = "<br>";
$temp_new_domains = str_replace($order, $replace, $new_domains); //делаем замену переноса каретки для дальнейшего преобразования в массив
$new_domains = explode("<br>", $temp_new_domains);  //преобразовываем введенные домены в массив
/*TODO
1) Проверить на длину (не больше 15 символов) - готово!
2) Нормальные домены записать в базу
2_1) добавить проверку "что домены добавлены в БД" (true или false)
3) Длинные домены просто вывести "слишком длинный"...
4) покурить
*/
foreach ($new_domains as $key => $item) {
    if (strlen($item) <= 15) {
        foreach ($zones as $zone) {
            $new_item = $item . $zone;
            $add_new_domain = "INSERT INTO domain VALUES (NULL, CURRENT_TIMESTAMP , '$new_item', 0 );";
            $info = mysqli_query($db, $add_new_domain, MYSQLI_STORE_RESULT);
            if ($info === TRUE) {
                echo "Домен $new_item добавлен в базу для проверки!</br>";
            } else {
                echo "Домен $new_item уже есть в базе данных!</br>";
            }
        }
    } else {
        echo "Длина $item больше 15 символов (не добавлен)</br>";
        unset ($new_domains[$key]);
    }
}
?>