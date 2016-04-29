<?php

    // CS50 library
    require("../../vendor/library50-php-5/CS50/CS50.php");
    require("../../includes/functions.php");
    CS50::init(__DIR__ . "/../../config.json");

    $employees = CS50::query("SELECT * FROM employees");

    $rows = [
        [jr_random(9), "Jay Ravaliya", "123 Main Street", "jayrav13", password_hash("testing123", PASSWORD_DEFAULT), $employees[rand(0, count($employees) - 1)]["EmpSSN"]],
        [jr_random(9), "Naman Diwaker", "234 Anytown Road", "diwaker.naman", password_hash("testing123", PASSWORD_DEFAULT), $employees[rand(0, count($employees) - 1)]["EmpSSN"]],
        [jr_random(9), "Rushil Desai", "888 First Street", "rdesai32", password_hash("testing123", PASSWORD_DEFAULT), $employees[rand(0, count($employees) - 1)]["EmpSSN"]],
        [jr_random(9), "Anish Vaghela", "267 Halsey Street", "anish.vaghela", password_hash("testing123", PASSWORD_DEFAULT), $employees[rand(0, count($employees) - 1)]["EmpSSN"]],
        [jr_random(9), "Varun Shah", "955 Valley Road", "thevarunshah", password_hash("testing123", PASSWORD_DEFAULT), $employees[rand(0, count($employees) - 1)]["EmpSSN"]],
    ];

    foreach($rows as $row)
    {
        $query = CS50::query(file_get_contents("../queries/insert_customers.sql"), $row[0], $row[1], $row[2], $row[3], $row[4], $row[5]);
        echo $query . "\n";
    }
