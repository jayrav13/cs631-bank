SELECT
    transactions.*
FROM
    customers
JOIN
    customer_account
ON
    customers.CustomerSSN = customer_account.CustomerSSN
JOIN
    accounts
ON
    accounts.AccountNumber = customer_account.AccountNumber
JOIN
    transactions
ON
    accounts.AccountNumber = transactions.AccountNumber
WHERE
    customers.CustomerSSN = ?
ORDER BY
    transactions.CreatedAt DESC