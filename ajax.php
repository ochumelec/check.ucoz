<?php
/**
 * Created by PhpStorm.
 * User: stalk
 * Date: 04.01.2017
 * Time: 11:21
 */
require_once ("class.php");
require_once ("config.php");


switch ( $_POST['action'] )
{
    case 'index':
        action_index();
        break;
    case 'save':
        action_save();
        break;
    case 'delete':
        action_delete();
        break;
}