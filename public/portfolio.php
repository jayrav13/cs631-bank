<?php

    // configuration
    require("../includes/config.php");
    require("../includes/functions.php");
    require("../middleware/customers.php");

    if($_SERVER["REQUEST_METHOD"] == "GET")
    {
        $accounts = CS50::query(file_get_contents("../database/queries/select_customer_accounts.sql"), $user["CustomerSSN"]);
        $transactions = CS50::query(file_get_contents("../database/queries/select_customer_transactions.sql"), $user["CustomerSSN"]);

        render("portfolio.php", ["user" => $user, "accounts" => $accounts, "transactions" => $transactions]);
    }
    else if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(empty($_POST["name"]) || empty($_POST["from-account"]) || empty($_POST["to-account"]) || empty($_POST["amount"]))
        {
            header("Location: portfolio.php");
        }
        
        if(intval($_POST["from-account"]) == -1 || intval($_POST["to-account"]) == -1)
        {
            if(intval($_POST["from-account"]) == -1)
            {
                // Deposit
                CS50::query("START TRANSACTION");
                $update = CS50::query("UPDATE accounts SET AccountBalance = AccountBalance + ? WHERE AccountNumber = ?", floatval($_POST["amount"]), $_POST["to-account"]);
                
                if($update == 1)
                {
                    $transac = CS50::query("INSERT INTO transactions (AccountNumber, TransacCode, TransacName, TransacCharge, TransacType, TransacAmount) VALUES (?, ?, ?, ?, ?, ?)", $_POST["to-account"], jr_random(9), $_POST["name"], 0, "CD", floatval($_POST["amount"]));
                    CS50::query("COMMIT");
                }
                else
                {
                    CS50::query("ROLLBACK");
                }

                header("Location: portfolio.php");
            }
            else if(intval($_POST["to-account"]) == -1)
            {
                // Withdrawal
                CS50::query("START TRANSACTION");
                $update = CS50::query("UPDATE accounts SET AccountBalance = AccountBalance - ? WHERE AccountNumber = ?", $_POST["amount"], $_POST["from-account"]);

                if($update == 1)
                {
                    $transac = CS50::query("INSERT INTO transactions (AccountNumber, TransacCode, TransacName, TransacCharge, TransacType, TransacAmount) VALUES (?, ?, ?, ?, ?, ?)", $_POST["from-account"], jr_random(9), $_POST["name"], 0, "WD", -1 * floatval($_POST["amount"]));
                    CS50::query("COMMIT");
                    header("Location: portfolio.php");
                }
                elseif($update == -1)
                {
                    CS50::query("ROLLBACK");
                    header("Location: portfolio.php?error=balance");
                }
                else
                {
                    header("Location: portfolio.php?error=unexpected");
                }    
                
            }
        }
        else
        {

            $account_from = CS50::query("SELECT * FROM accounts WHERE AccountNumber = ?", $_POST["from-account"]);
            $account_to = CS50::query("SELECT * FROM accounts WHERE AccountNumber = ?", $_POST["to-account"]);

            CS50::query("START TRANSACTION");
            $update_from = CS50::query("UPDATE accounts SET AccountBalance = AccountBalance + ? WHERE AccountNumber = ?", -1 * floatval($_POST["amount"]), $_POST["from-account"]);

            if($update_from == 1)
            {
                $update_to = CS50::query("UPDATE accounts SET AccountBalance = AccountBalance + ? WHERE AccountNumber = ?", floatval($_POST["amount"]), $_POST["to-account"]);

                if($update_to == 1)
                {
                    $transac = [0,0];
                    $transac[0] = CS50::query(file_get_contents("../database/queries/insert_transaction.sql"), jr_random(9), $_POST["name"], 0, "TR", -1 * floatval($_POST["amount"]), $_POST["from-account"]);
                    $transac[1] = CS50::query(file_get_contents("../database/queries/insert_transaction.sql"), jr_random(9), $_POST["name"], 0, "TR", floatval($_POST["amount"]), $_POST["to-account"]);
                    
                    if($transac[0] + $transac[1] == 2)
                    {
                        CS50::query("COMMIT");
                        header("Location: portfolio.php");
                    }
                    else
                    {
                        CS50::query("ROLLBACK");
                        header("Location: portfolio.php?error=unexpected");
                    }

                }
                elseif($update_to == -1)
                {
                    CS50::query("ROLLBACK");
                    header("Location: portfolio.php?error=balance");
                }
                else
                {
                    CS50::query("ROLLBACK");
                    header("Location: portfolio.php?error=unexpected");
                }
            }
            elseif($update_from == -1)
            {
                CS50::query("ROLLBACK");
                header("Location: portfolio.php?error=balance");
            }
            else
            {
                CS50::query("ROLLBACK");
                header("Location: portfolio.php?error=unexpected");
            }
        }


    }
    