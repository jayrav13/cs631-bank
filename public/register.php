<?php

    require("../includes/config.php");

    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        $employees = CS50::query("SELECT EmpSSN, EmpName FROM employees");
        render("register.php", ["title" => "Register", "employees" => $employees]);
    }
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (empty($_POST["username"]) || empty($_POST["password"]) || empty($_POST["name"]) || empty($_POST["address"]) || empty($_POST["ssn"]))
        {
            apologize("You must provide a username, password, name and address.");
        }
        else
        {
            if(!ctype_alnum($_POST["username"]) || !ctype_alnum($_POST["password"]))
            {
                apologize("Both username and password must be alphanumeric strings only.");
            }
            if(strlen($_POST["username"]) < 8 || strlen($_POST["password"]) < 8 || strlen($_POST["name"]) == 0 || strlen($_POST["address"]) == 0)
            {
                apologize("Username and password must be at least 8 characters long. A name and address must be entered.");
            }

            $rows = CS50::query("SELECT * FROM customers WHERE CustomerUsername = ?", $_POST["username"]);

            if(count($rows) != 0)
            {
                apologize("Sorry - someone has already registered this username. Please try again!");
            }
            else
            {
                $insert = CS50::query(file_get_contents("../database/queries/insert_customers.sql"), $_POST["ssn"], $_POST["name"], $_POST["address"], $_POST["username"], password_hash($_POST["password"], PASSWORD_DEFAULT), $_POST["employee"]);
                header("Location: /");
            }

        }
    }