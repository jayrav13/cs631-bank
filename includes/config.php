<?php

    /**
     * config.php
     *
     * Developed by Harvard University's Computer Science 50 Staff.
     *
     * Configures app.
     */

    // display errors, warnings, and notices
    ini_set("display_errors", true);
    error_reporting(E_ALL);

    // set format to en_US
    setlocale(LC_MONETARY, 'en_US');

    // requirements
    require("helpers.php");

    // CS50 Library
    require("../vendor/library50-php-5/CS50/CS50.php");
    CS50::init(__DIR__ . "/../config.json");

    // enable sessions
    session_start();

    // prepare user object
    $user = NULL;

    // require authentication for all pages except /login.php, /logout.php, and /register.php
    if (!in_array($_SERVER["PHP_SELF"], ["/login.php", "/logout.php", "/register.php"]))
    {
        if (empty($_SESSION["TOKEN"]) || empty($_SESSION["TYPE"]))
        {
            header("Location: login.php");
        }

        $user = user();
        if($user == false)
        {
            header("Location: login.php");
        }

    }

?>
