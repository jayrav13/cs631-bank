<?php

    // CS50 library
    require("../../vendor/library50-php-5/CS50/CS50.php");
    CS50::init(__DIR__ . "/../../config.json");

    $rows = [
        [rand(pow(10, 9-1), pow(10, 9)-1), "Jay Ravaliya", "123 Main Street", "jayrav13", password_hash("testing123", PASSWORD_DEFAULT), 1234567890],
        [rand(pow(10, 9-1), pow(10, 9)-1), "Naman Diwaker", "234 Anytown Road", "diwaker.naman", password_hash("testing123", PASSWORD_DEFAULT), 1234567890],
        [rand(pow(10, 9-1), pow(10, 9)-1), "Rushil Desai", "888 First Street", "rdesai32", password_hash("testing123", PASSWORD_DEFAULT), 1234567890],
        [rand(pow(10, 9-1), pow(10, 9)-1), "Anish Vaghela", "267 Halsey Street", "anish.vaghela", password_hash("testing123", PASSWORD_DEFAULT), 1234567890],
        [rand(pow(10, 9-1), pow(10, 9)-1), "Varun Shah", "955 Valley Road", "thevarunshah", password_hash("testing123", PASSWORD_DEFAULT), 1234567890],
    ];

    foreach($rows as $row)
    {
        $query = CS50::query(file_get_contents("../queries/insert_customers.sql"), $row[0], $row[1], $row[2], $row[3], $row[4], $row[5]);
        echo $query . "\n";
    }
