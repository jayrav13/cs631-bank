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

    // requirements
    require("helpers.php");

    // CS50 Library
    require("../vendor/library50-php-5/CS50/CS50.php");
    CS50::init(__DIR__ . "/../config.json");

    // enable sessions
    session_start();

    // require authentication for all pages except /login.php, /logout.php, and /register.php
    if (!in_array($_SERVER["PHP_SELF"], ["/login.php", "/logout.php", "/register.php"]))
    {
        if (empty($_SESSION["CustomerSSN"]))
        {
            header("Location: login.php");
        }
    }

    $user = user();

    if($user == false)
    {
        render("apologize.php", ["message" => "Something went wrong. Please close out of this window and return back to our portal to try again."]);
    }

?>
