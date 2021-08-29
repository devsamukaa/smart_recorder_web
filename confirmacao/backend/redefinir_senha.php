<?php

function turnPageToHttps() {
	if (isset($_SERVER['HTTPS']) &&
        ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
        isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
        $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') 
    {
    // ESTÁ EM HTTPS
    }
    else 
    {
        $protocol = "https://";
        $actual_link = $_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
        header("Location:$protocol$actual_link");
    }
}