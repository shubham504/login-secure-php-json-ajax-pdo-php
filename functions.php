<?php

/*
 * 
 * 
 * 
 * 
 * 
 */

function errorMessage($str) {
    return '<div style="width:50%; margin:0 auto; border:2px solid #F00;padding:2px; color:#000; margin-top:10px; text-align:center;">' . $str . '</div>';
}

function successMessage($str) {
    return '<div style="width:50%; margin:0 auto; border:2px solid #06C;padding:2px; color:#000; margin-top:10px; text-align:center;">' . $str . '</div>';
}

function redirect($url) {
    echo '<script type="text/javascript">window.location = "' . $url . '";</script>';
}

function encryptPassword($password) {
    $salt = '#*^!@';
    return hash("sha512", $password . $salt);
}

?>