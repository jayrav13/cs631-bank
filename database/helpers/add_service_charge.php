<?php

    // CS50 library
    require("../../vendor/library50-php-5/CS50/CS50.php");
    require("../../includes/functions.php");
    CS50::init(__DIR__ . "/../../config.json");

    $accounts = CS50::query("SELECT * FROM accounts");

    foreach($accounts as $account)
    {
        if($account["AccountBalance"] > 2.00)
        {
            
        }
    }