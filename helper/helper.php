<?php

if (!function_exists("checklogin")) {
    function checklogin()
    {
        if (empty($_SESSION["user"])) {
            header("Location: login.php");
        }
    }
}

