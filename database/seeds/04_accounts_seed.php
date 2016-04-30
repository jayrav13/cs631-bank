<?php

    // CS50 library
    require("../../vendor/library50-php-5/CS50/CS50.php");
    require("../../includes/functions.php");
    CS50::init(__DIR__ . "/../../config.json");

    $rows = [
        [jr_random(9), 0, 1],
        [jr_random(9), 0, 1],
        [jr_random(9), 0, 1],
        [jr_random(9), 0, 1],
        [jr_random(9), 0, 1],
    ];

    foreach($rows as $row)
    {
        $query = CS50::query(file_get_contents("../queries/insert_accounts.sql"), $row[0], $row[1], $row[2], 1);
        echo $query . "\n";
    }
