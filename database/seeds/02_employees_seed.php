<?php

    // CS50 library
    require("../../vendor/library50-php-5/CS50/CS50.php");
    require("../../includes/functions.php");
    CS50::init(__DIR__ . "/../../config.json");

    $rows = [
        [123456789, "Donald Coolidge", "19731234567", "1970-01-01", 1234567890, 1, "donald", password_hash("testing123", PASSWORD_DEFAULT)],
        [jr_random(9), "JP Benini", "19731234567", "1970-01-01", 1234567890, 1, "jp", password_hash("testing123", PASSWORD_DEFAULT)],
        [jr_random(9), "Sean O\'Shea", "19731234567", "1970-01-01", 1234567890, 1, "sean", password_hash("testing123", PASSWORD_DEFAULT)],
        [jr_random(9), "Mark Garcia", "19731234567", "1970-01-01", 1234567890, 1, "mark", password_hash("testing123", PASSWORD_DEFAULT)],
        [jr_random(9), "Digant Dave", "19731234567", "1970-01-01", 1234567890, 1, "digant", password_hash("testing123", PASSWORD_DEFAULT)],
    ];

    foreach($rows as $row)
    {
        $query = CS50::query(file_get_contents("../queries/insert_employees.sql"), $row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7]);
        echo $query . "\n";
    }
