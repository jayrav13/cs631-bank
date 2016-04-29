<?php

    // CS50 library
    require("../../vendor/library50-php-5/CS50/CS50.php");
    require("../../includes/functions.php");
    CS50::init(__DIR__ . "/../../config.json");

    $customers = CS50::query("SELECT * FROM customers");
    $accounts = CS50::query("SELECT * FROM accounts");

    foreach($customers as $customer)
    {
        foreach($accounts as $account)
        {
            if(rand(1, 2) % 2 == 0)
            {
                $query = CS50::query(file_get_contents("../queries/insert_customer_account_relationships.sql"), $customer["CustomerSSN"], $account["AccountNumber"]);
            }
        }
    }
