<?php

    // CS50 library
    require("../../vendor/library50-php-5/CS50/CS50.php");
    CS50::init(__DIR__ . "/../../config.json");

    $rows = [
        'North Branch', 
        'South Branch', 
        'East Branch', 
        'West Branch'
    ];

    foreach($rows as $row)
    {
		$query = CS50::query(file_get_contents("../queries/insert_branches.sql"), $row);
        echo $query . "\n";
    }
