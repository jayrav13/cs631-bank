<?php

    // CS50 library
    require("../../vendor/library50-php-5/CS50/CS50.php");
    require("../../includes/functions.php");
    CS50::init(__DIR__ . "/../../config.json");

    $accounts = CS50::query("SELECT * FROM accounts");

    foreach($accounts as $account)
    {
        for($i = 0; $i < rand(1, 5); $i++)
        {
            $query = CS50::query(file_get_contents("../queries/insert_transaction.sql"), jr_random(9), "My Transac", 0, "CD", rand(5, 1000), $account["AccountNumber"]);
        }

    }
