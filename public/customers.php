<?php

    // configuration
    require("../includes/config.php");
    require("../includes/functions.php");
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
                exit;
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
                exit;
            }
            else
            {
                header("Location: customers.php?error=unexpected");
                exit;
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
                    exit;
                }
                else
                {
                    CS50::query("ROLLBACK");
                    header("Location: customers.php?error=unexpected");
                    exit;
                }
            }
            else
            {
                CS50::query("ROLLBACK");
                header("Location: customers.php?error=unexpected");
                exit;
            }
        }
        elseif($_POST["action"] == "new-account")
        {
            if(intval($_POST["amount"]) < 500)
            {
                header("Location: " . $_SERVER["HTTP_REFERER"] . "&error=underfunded");
                exit;
            }

            CS50::query("START TRANSACTION");
            $number = jr_random(9);
            $query = CS50::query("INSERT INTO accounts (AccountNumber, AccountBalance, AccountType, InterestRate, BranchId) VALUES (?, ?, ?, ?, ?)", $number, $_POST["amount"], $_POST["account"], $_POST["interest"], 1);
            
            if($query == 1)
            {
                $connect = CS50::query("INSERT INTO customer_account (CustomerSSN, AccountNumber) VALUES (?, ?)", $_POST["CustomerSSN"], $number);
                if($connect == 1)
                {
                    CS50::query("COMMIT");
                    header("Location: " . $_SERVER["HTTP_REFERER"]);
                    exit;
                }
                else
                {
                    CS50::query("ROLLBACK");
                    header("Location: " . $_SERVER["HTTP_REFERER"] . "&error=unexpected");
                    exit;
                }
            }
            else
            {
                CS50::query("ROLLBACK");
                header("Location: " . $_SERVER["HTTP_REFERER"] . "&error=unexpected");
                exit;
            }

            header("Location: " . $_SERVER["HTTP_REFERER"]);
            exit;
            
        }
    }
