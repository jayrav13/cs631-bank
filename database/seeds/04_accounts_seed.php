<?php

    // CS50 library
    require("../../vendor/library50-php-5/CS50/CS50.php");
    CS50::init(__DIR__ . "/../../config.json");

    $rows = [
        [rand(pow(10, 9-1), pow(10, 9)-1), 0.00, 1],
        [rand(pow(10, 9-1), pow(10, 9)-1), 0.00, 1],
        [rand(pow(10, 9-1), pow(10, 9)-1), 0.00, 1],
        [rand(pow(10, 9-1), pow(10, 9)-1), 0.00, 1],
        [rand(pow(10, 9-1), pow(10, 9)-1), 0.00, 1],
    ];

    foreach($rows as $row)
    {
        $query = CS50::query(file_get_contents("../queries/insert_accounts.sql"), $row[0], $row[1], $row[2], 1);
        echo $query . "\n";
    }
