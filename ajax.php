<?php
/**
 * Created by PhpStorm.
 * User: stalk
 * Date: 04.01.2017
 * Time: 11:21
 */
require_once ("class.php");
require_once ("config.php");

$class = new Domain();

switch ( $_POST['action'] )
{
    case 'chack_name':
        $class->checkName($_POST['name']);
        break;
    case 'save':
        action_save();
        break;
    case 'delete':
        action_delete();
        break;
}
