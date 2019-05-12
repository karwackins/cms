<?php
/**
 * Created by PhpStorm.
 * cUser: karwackid
 * Date: 2019-05-05
 * Time: 06:29
 */

function pass_hash($string)
{
    return hash('sha1', $string . config_item('encryption_key'));
}