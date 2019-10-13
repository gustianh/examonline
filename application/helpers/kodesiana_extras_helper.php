<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists("starts_with"))
{
    function starts_with($str, $check)
    {
        $len = strlen($check);
        return (substr($str, 0, $len) === $check);
    }
}