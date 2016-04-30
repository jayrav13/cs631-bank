<?php

    // CS50 library
    require("../../vendor/library50-php-5/CS50/CS50.php");
    require("../../includes/functions.php");
    CS50::init(__DIR__ . "/../../config.json");

    $accounts = CS50::query("SELECT * FROM accounts");
    $charge = 1111111111;

    foreach($accounts as $account)
    {
        if($account["AccountBalance"] > 2.00 && $account["AccountNumber"] != $charge)
        {
            CS50::query("START TRANSACTION");

            $result = [0, 0];

            $balance = CS50::query("SELECT AccountBalance FROM accounts WHERE AccountNumber = ?", $charge);
            $result[0] = CS50::query("INSERT INTO transactions (TransacCode, TransacName, TransacCharge, TransacType, TransacAmount, AccountBalance, AccountNumber) VALUES (?, ?, ?, ?, ?, ?, ?)", jr_random(9), "Service Charge", 2.00, "SC", 2.00, $balance[0]["AccountBalance"] + 2.00, $charge);

            $balance = CS50::query("SELECT AccountBalance FROM accounts WHERE AccountNumber = ?", $account["AccountNumber"]);
            $result[1] = CS50::query("INSERT INTO transactions (TransacCode, TransacName, TransacCharge, TransacType, TransacAmount, AccountBalance, AccountNumber) VALUES (?, ?, ?, ?, ?, ?, ?)", jr_random(9), "Service Charge", 2.00, "SC", -2.00, $balance[0]["AccountBalance"] - 2.00, $account["AccountNumber"]);

            if($result[0] + $result[1] == 2)
            {
                CS50::query("COMMIT");
                echo("Service Fee charged for Account " . $account["AccountNumber"] . "\n");
            }
        }
    }