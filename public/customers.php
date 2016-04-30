<?php

    // configuration
    require("../includes/config.php");
    require("../middleware/employees.php");

    $customers = NULL;

    if($_SERVER["REQUEST_METHOD"] == "GET")
    {
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
    }
    elseif($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if($_POST["action"] == "edit")
        {
            $update = CS50::query("UPDATE customers SET CustomerUsername = ?, CustomerName = ?, CustomerAddr = ? WHERE CustomerSSN = ?", $_POST["username"], $_POST["name"], $_POST["address"], $_POST["ssn"]);
            if($update == 1)
            {
                header("Location: customers.php");
            }
            else
            {
                header("Location: customers.php?error=unexpected");
            }
        }
        elseif($_POST["action"] == "delete")
        {
            CS50::query("START TRANSACTION");
            $delete = CS50::query("DELETE FROM customers WHERE CustomerSSN = ?", $_POST["ssn"]);

            if($delete == 1)
            {
                $clear = CS50::query("DELETE FROM customer_account WHERE CustomerSSN = ?", $_POST["ssn"]);
                if($clear >= 0)
                {
                    CS50::query("COMMIT");
                    header("Location: customers.php");
                }
                else
                {
                    CS50::query("ROLLBACK");
                    header("Location: customers.php?error=unexpected");
                }
            }
            else
            {
                CS50::query("ROLLBACK");
                header("Location: customers.php?error=unexpected");
            }
        }
    }
