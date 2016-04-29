<?php

    // configuration
    require("../includes/config.php");
    require("../middleware/employees.php");

    $customers = NULL;

    if(isset($_GET["name"]))
    {
        $customers = CS50::query("SELECT * FROM customers WHERE EmpSSN = ? AND CustomerUsername = ?", $_SESSION["TOKEN"], $_GET["name"]);
    }
    else
    {
        $customers = CS50::query("SELECT * FROM customers WHERE EmpSSN = ?", $_SESSION["TOKEN"]);
    }

    if(isset($_GET["name"]))
    {
        if(count($customers) == 1)
        {
            $accounts = CS50::query(file_get_contents("../database/queries/select_customer_accounts.sql"), $customers[0]["CustomerSSN"]);
            $transactions = CS50::query(file_get_contents("../database/queries/select_customer_transactions.sql"), $customers[0]["CustomerSSN"]);
            render("portfolio.php", ["customer" => $customers[0], "accounts" => $accounts, "transactions" => $transactions, "user" => $user]);
        }
        else
        {
            header("Location: customers.php");
        }
        
    }
    else
    {
        render("customers/customers.php", ["customers" => $customers]);
    }
