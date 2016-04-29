<?php

    // configuration
    require("../includes/config.php");
    require("../middleware/customers.php");

    $accounts = CS50::query(file_get_contents("../database/queries/select_customer_accounts.sql"), $user["CustomerSSN"]);
    $transactions = CS50::query(file_get_contents("../database/queries/select_customer_transactions.sql"), $user["CustomerSSN"]);

    render("portfolio.php", ["user" => $user, "accounts" => $accounts, "transactions" => $transactions]);