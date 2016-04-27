-- create_accounts_table.sql

CREATE TABLE IF NOT EXISTS accounts (

    -- Primary Key
    AccountNumber INT UNSIGNED NOT NULL AUTO_INCREMENT,

    -- Attributes
    AccountBalance DECIMAL(10, 2) NOT NULL DEFAULT 0.00,

    -- Timestamps
    CreatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UpdatedAt TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    -- Primary Key
    PRIMARY KEY (AccountNumber)
    
);