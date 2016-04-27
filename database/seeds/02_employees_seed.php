<?php

    // CS50 library
    require("../../vendor/library50-php-5/CS50/CS50.php");
    CS50::init(__DIR__ . "/../../config.json");

    $rows = [
        [1234567890, "Andy Friendman", "19731234567", "1970-01-01", 1234567890, 1],
    ];

    foreach($rows as $row)
    {
        $query = CS50::query(file_get_contents("../queries/insert_employees.sql"), $row[0], $row[1], $row[2], $row[3], $row[4], $row[5]);
        echo $query . "\n";
    }
