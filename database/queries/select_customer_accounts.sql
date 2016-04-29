SELECT
    customers.CustomerSSN,
    customers.CustomerName,
    customers.CustomerAddr,
    customers.CreatedAt,
    customers.UpdatedAt,
    accounts.AccountNumber,
    accounts.AccountBalance,
    accounts.AccountType,
    accounts.InterestRate,
    accounts.CreatedAt,
    accounts.UpdatedAt
FROM
    customers
JOIN
    customer_account
ON
    customers.CustomerSSN = customer_account.CustomerSSN
JOIN
    accounts
ON
    customer_account.AccountNumber = accounts.AccountNumber
WHERE
    customers.CustomerSSN = ?