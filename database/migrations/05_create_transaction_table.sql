-- create_transaction_table.sql

CREATE TABLE IF NOT EXISTS transactions (

    -- Primary Key
    TransacCode INT UNSIGNED NOT NULL,

    -- Attributes
    TransacName VARCHAR(255) NOT NULL,
    TransacCharge DECIMAL(10, 2) NOT NULL DEFAULT 0.00,
    TransacType CHAR(2) NOT NULL,
    TransacAmount DECIMAL(10, 2) NOT NULL DEFAULT 0.00,
    TransacDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    -- Timestamps
    CreatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UpdatedAt TIMESTAMP DEFAULT  "1970-01-01 00:00:00" ON UPDATE CURRENT_TIMESTAMP,

    -- Primary Key
    PRIMARY KEY (TransacCode),

    -- Foreign Key
    AccountNumber INT UNSIGNED NOT NULL,
    FOREIGN KEY (AccountNumber) REFERENCES accounts(AccountNumber) ON DELETE CASCADE
);