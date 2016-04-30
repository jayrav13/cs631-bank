-- create_accounts_table.sql

CREATE TABLE IF NOT EXISTS accounts (

    -- Primary Key
    AccountNumber INT UNSIGNED NOT NULL AUTO_INCREMENT,

    -- Attributes
    AccountBalance DECIMAL(10, 2) NOT NULL DEFAULT 0.00,
    CHECK (AccountBalance >= 0.00), -- does not work
    AccountType TINYINT(1) DEFAULT 1, -- 1 = checking, 2 - savings, 3 - loan

    -- Overdrafts managed by negative balance value
    InterestRate Decimal (5, 2) NOT NULL DEFAULT 0.00,

    -- Timestamps
    CreatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UpdatedAt TIMESTAMP DEFAULT "1970-01-01 00:00:00" ON UPDATE CURRENT_TIMESTAMP,

    -- Primary Key
    PRIMARY KEY (AccountNumber),

    -- Foreign Key
    BranchId INT UNSIGNED NOT NULL,
    FOREIGN KEY (BranchId) REFERENCES branches(id)
    
);