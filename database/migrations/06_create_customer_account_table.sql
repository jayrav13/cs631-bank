-- create_accounts_table.sql

CREATE TABLE IF NOT EXISTS customer_account (

    -- Primary Key
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,

    -- Timestamps
    CreatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UpdatedAt TIMESTAMP DEFAULT "1970-01-01 00:00:00" ON UPDATE CURRENT_TIMESTAMP,

    -- Primary Key
    PRIMARY KEY (id),

    -- Foreign Key
    CustomerSSN INT UNSIGNED NOT NULL,
    FOREIGN KEY (CustomerSSN) REFERENCES customers(CustomerSSN),
    AccountNumber INT UNSIGNED NOT NULL,
    FOREIGN KEY (AccountNumber) REFERENCES accounts(AccountNumber)

);